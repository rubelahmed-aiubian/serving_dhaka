<?php

include 'Core/Controller.php';

class HomeController extends Controller
{
    public function index(){
        return $this->view('homepage');
    }
    public function about(){
        return $this->view('about');
    }
    public function services(){
        return $this->view('services');
    }
    public function worker(){
        return $this->view('worker');
    }
    public function contact(){
        return $this->view('contact');
    }
//    public function notfound(){
//        return $this->view('notfound');
//    }

}