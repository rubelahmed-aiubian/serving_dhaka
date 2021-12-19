<?php // Auth Controller

include "Model/Client.php";
include "Core/Controller.php";

class AuthController extends Controller
{
    protected $model = null;

    public function __construct()
    {
        if (isset($_SESSION["account"]) && $_SESSION["account"]===true){
            $this->rediect(url('dashboard'));
        }
        $this->model = new Client();
    }

    public function login()
    {
        foreach ($this->model->get() as $client){
            $_SESSION['clients'][]= $client;
        }
        return $this->view('auth/login');
    }

    public function login_check()
    {
        $response =[];
        $request =[];
        $_SESSION["errors"]=[];
        $_SESSION["response"]=[];
        if (isset($_POST['email']) && $_POST['email'] !== '') {
            $request['email'] = $_POST['email'];
            $response=$this->model->check($_POST['email']);
        }else{
            $_SESSION["errors"]['email'] = 'Email Not Found';
        }
        if (isset($_POST['password']) && $_POST['password'] !== '') {
            $request['password'] = $_POST['password'];
        }else{
            $_SESSION["errors"]['password'] = 'Password Not Found';
        }
        header('Content-Type: application/json; charset=utf-8');
        if (isset($response['password']) && isset($request['password']) && password_verify($request['password'], $response['password'])) {
            http_response_code(200);
            $_SESSION["account"]=true;
            $_SESSION["response"] = [
                'id'=>$response['id'],
                'name'=>$response['name'],
                'email'=>$response['email'],
                'image'=>$response['image'],
                'mobile'=>$response['mobile'],
                'status'=>$response['status'],
                'location'=>$response['location'],
            ];
            return json_encode(url('dashboard'));
        }else{
            http_response_code(500);
            $_SESSION["errors"]['password'] = 'Invalid password or email';
            return json_encode($_SESSION["errors"]);
        }

//
//        if (count($_SESSION['errors'])) {
//            $this->rediect(url('auth/login'));
//        }else{
//            $this->rediect(url('dashboard'));
//        }
    }

    public function forgot()
    {
        return $this->view('auth/forgot');
    }

    public function register()
    {
        return $this->view('auth/register');
    }

    public function register_store()
    {
        $response =[];
        $request =[];
        $_SESSION["errors"]=[];
        $_SESSION["response"]=[];
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
                $request['status'] = 2;
                $request['email'] = $_POST['email'];
            }
        }else{
            $_SESSION["errors"]['email'] = 'Email Not Found';
        }
        if (isset($_POST['password']) && $_POST['password'] !== '') {
            $request['password'] = password_hash($_POST['password'], PASSWORD_DEFAULT);
        }else{
            $_SESSION["errors"]['password'] = 'Password Not Found';
        }
        if(count($_SESSION["errors"])){
            $this->rediect(url('auth/register'));
        }else{
            $_SESSION["account"]=true;
            $this->model->insert($request);
            $this->rediect(url('dashboard'));
        }
    }

    public function savepassword()
    {
        return $this->view('auth/savepassword');
    }
    public function logout(){
        $_SESSION['account']='';
        $_SESSION["errors"]=[];
        $_SESSION["response"]=[];
        $this->rediect(url('auth/login'));
    }
}