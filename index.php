<?php
session_start();
include_once 'Core/Helper.php';
try {
    $url =isset($_GET['url'])? trim($_GET['url']):null;
    $controller = 'HomeController';
    $url = explode('/', $url);
    if($url[0] !== 'assets'){
        if (isset($url[0]) && $url[0] !== '' && $url[0]!=='index.php') {
            $controller = ucfirst($url[0]) . 'Controller';
        }
        $path = 'Controllers/' . $controller . '.php';
        if (is_readable($path)) {
            include $path;
            $method = 'index';
            if (isset($url[1]) && $url[0] !== '') {
                $method = $url[1];
            }
            $app = new $controller();
            if (isset($url[2]) && $url[2] !== '') {
                echo $app->$method($url[2]);
            } else {
                echo $app->$method();
            }
        } else {
//            return $url = 'home/notfound';
//            echo "No Page Found";
        }
    }
} catch (Exception $exception) {
    echo $exception->getMessage();
}