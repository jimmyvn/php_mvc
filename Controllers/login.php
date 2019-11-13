<?php
class Login extends Controller {
    function __construct() {
        parent::__construct();
    }

    public function index() {
        $this->view->render('login/login');
    }

    public function run() {
        $this->model->run();
    }
}