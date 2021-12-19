<?php
include "Model/Admin.php";
include "Core/Controller.php";
class AdminController extends Controller
{
    protected $model = null;

    public function __construct()
    {
        if (isset($_SESSION["admin_account"]) && $_SESSION["admin_account"]===true){
            $this->rediect(url('admindashboard/dashboard'));
        }
        $this->model = new Admin();
    }

    public function login()
    {
        foreach ($this->model->get() as $admin){
            $_SESSION['admins'][]= $admin;
        }
        return $this->view('admin/login');
    }

    public function login_check()
    {
        $response = [];
        $request = [];
        $_SESSION["errors"] = [];
        $_SESSION["response"] = [];
        if (isset($_POST['email']) && $_POST['email'] !== '') {
            $request['email'] = $_POST['email'];
            $response = $this->model->check($_POST['email']);
        }
//        else {
//            $_SESSION["errors"]['email'] = 'email 1';
//        }
        if (isset($_POST['password']) && $_POST['password'] !== '') {
            $request['password'] = $_POST['password'];
        }
//        else {
//            $_SESSION["errors"]['password'] = 'pass 1';
//        }
        header('Content-Type: application/json; charset=utf-8');
        if (isset($response['password']) && isset($request['password']) && password_verify($request['password'], $response['password'])) {
            http_response_code(200);
            $_SESSION["admin_account"] = true;
            $_SESSION["response"] = [
                'id' => $response['id'],
                'name' => $response['name'],
                'email' => $response['email'],
                'image' => $response['image'],
                'mobile' => $response['mobile'],
                'role' => $response['role'],
            ];
            if($response['role']=== 'Admin'){
                return json_encode(url('admindashboard/dashboard'));
            }
            if($response['role']=== 'Modarator'){
                return json_encode(url('admindashboard/modarator_dashboard'));
            }
            if($response['role']=== 'Employee'){
                return json_encode(url('admindashboard/employee_dashboard'));
            }
        } else {
            http_response_code(500);
            $_SESSION["errors"]['password'] = 'Invalid password or email';
            return json_encode($_SESSION["errors"]);
        }
    }

    public function register(){
        return $this->view('admin/register');
    }

//----------Validation and push to database----------------

    public function register_store()
    {
        $response =[];
        $request =[];
        $_SESSION["errors"]=[];
        $_SESSION["response"]=[];
        if(isset($_POST['role'])){
            $request['role'] = $_POST['role'];
        }
        if (isset($_POST['name']) && $_POST['name'] !== '') {
            $request['name'] = $_POST['name'];
        }else{
            $_SESSION["errors"]['name'] = 'Name Not Found';
        }
        if (isset($_POST['email']) && $_POST['email'] !== '') {
            $response=$this->model->check($_POST['email']);
            if ($response['email']===$_POST['email']){
                $response=[];
                $_SESSION["errors"]['email'] = 'Duplicate Email';
            }else{
                $request['email'] = $_POST['email'];
            }
        }else{
            $_SESSION["errors"]['email'] = 'Email Not Found';
        }
        if(isset($_POST['mobile'])){
            $request['mobile'] = $_POST['mobile'];
        }
        if (isset($_POST['password']) && $_POST['password'] !== '') {
            if(7> strlen($_POST['password'])){
                $_SESSION['errors']['minimum'] ="Password must be 8 digit";
            }
            else{
                if($_POST['password']=== $_POST['confirm_password']){
                    $request['password'] = password_hash($_POST['password'], PASSWORD_DEFAULT);
                }
                else{
                    $_SESSION['errors']['notmatched'] = 'Password not matched';
                }
            }
        }
        else{
            $_SESSION["errors"]['password'] = 'Password can not be empty';
        }
        if(count($_SESSION["errors"])){
            $this->rediect(url('admin/register'));
        }else{
            $_SESSION["admin_account"]=true;
            $this->model->insert($request);
            if($request['role'] === 'Modarator'){
            $this->rediect(url('admindashboard/modarator_dashboard'));
            }
            if($request['role'] === 'Admin'){
                $this->rediect(url('admindashboard/dashboard'));
            }
            if($request['role'] === 'Employee'){
                $this->rediect(url('admindashboard/employee_dashboard'));
            }
        }
    }

//    public function update()
//    {
//        $request = [];
//        if (isset($_POST['name']) && $_POST['name'] !== '') {
//            $request['name'] = $_POST['name'];
//        } else {
////            $_SESSION["errors"]['name'] = 'Name Not Found';
//        }
//        if (isset($_POST['mobile'])) {
//            $request['mobile'] = $_POST['mobile'];
//        }
//        if (isset($_POST['password']) && $_POST['password'] !== '') {
//            if (7 > strlen($_POST['password'])) {
////                $_SESSION['errors']['minimum'] = "Password must be 8 digit";
//            } else {
////                $_SESSION["errors"]['password'] = 'Password can not be empty';
//            }
//        }
//        if(count($_SESSION["errors"])){
//            $_SESSION['errors']['err_occured'] = 'Something is wrong';
//        }else{
//            $this->model->update($request);
//            $_SESSION['errors']['no_error']= 'Profile Updated Successfully.';
//        }
//    }

    public function logout(){
        $_SESSION['admin_account']='';
        $_SESSION["errors"]=[];
        $_SESSION["response"]=[];
        $this->rediect(url('admin/login'));
    }
}