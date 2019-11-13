<?php

class Controller {
    protected $view;
    public function __construct() {
        $this->view = new View();
    }

    public function load_model($model_name) {
        $path = 'Models/' . $model_name . '_model.php';
        if (file_exists($path)) {
            require $path;

            $modelName = $model_name . '_Model';
            $this->model = new $modelName();
        }
    }
}