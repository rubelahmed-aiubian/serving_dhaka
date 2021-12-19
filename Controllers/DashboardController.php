<?php

include 'Core/Controller.php';

class DashboardController extends Controller
{
    public function __construct()
    {
        if (isset($_SESSION["account"]) && $_SESSION["account"]){

        }else{
            $this->rediect(url('auth/login'));
        }
    }

    public function index()
    {
        return $this->view('account/clientdashboard');
    }
    public function profile(){
        return "this is profile";
    }
}