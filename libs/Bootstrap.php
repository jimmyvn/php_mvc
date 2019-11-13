<?php

class Bootstrap {
    function __construct() {
        Session::init();
        session_start();
        if (isset($_GET['controller'])) {
            $url = $_GET['controller'];
        } else {
            $url = null;
        }
        $url = rtrim($url, '/');
        $url = explode('/', $url);
        if ( empty( $url[0] ) ) {
            require 'Controllers/index.php';
            $controller = new Index();
            $controller->index();
            return false;
        }

        $file = 'Controllers/' . $url[0] . '.php';

        if (file_exists($file)) {
            require $file;
        } else {
            require 'Controllers/error.php';
            $controller = new ErrorCustom();
            $controller->index();
            return false;
        }

        $controller = new $url[0];
        $controller->load_model($url[0]);

        if (isset($url[2])) {
            $controller->{$url[1]}($url[2]);
            return false;
        } else {
            if (isset($url[1])) {
                $controller->{$url[1]}();
                return false;
            }
        }
        $controller->index();
    }
}