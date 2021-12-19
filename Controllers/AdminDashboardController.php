<?php
include 'Core/Controller.php';
class AdminDashboardController extends Controller
{
    public function __construct()
    {
        if (isset($_SESSION["admin_account"]) && $_SESSION["admin_account"]){

        }else{
            $this->rediect(url('admin/login'));
        }
    }
    public function dashboard()
    {
        return $this->view('account/admindashboard');
    }
    public function modarator_dashboard(){
        return $this->view('account/moderatordashboard');
    }
    public function employee_dashboard(){
        return $this->view('account/employeedashboard');
    }

    //pages
    public function manageadmin(){
        return $this->view('admin/manageadmin');
    }
    public function manageemployee(){
        return $this->view('admin/manageemployee');
    }
    public function manageclient(){
        return $this->view('admin/manageclient');
    }
    public function updateprofile(){
        return $this->view('admin/updateprofile');
    }
}