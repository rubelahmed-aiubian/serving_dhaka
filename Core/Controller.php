<?php

class Controller
{
    public function model($model_name){
        include 'Model/'.$model_name.'.php';
    }
    public function view($view_name){
        include  'Views/'.$view_name.'.php';
    }
    public function rediect($to){
        header("Location:".$to);
    }
}