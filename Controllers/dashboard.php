<?php
class Dashboard extends Controller {
    public function __construct() {
        parent::__construct();
        Session::init();
        $is_logged = Session::get('is_logged');
        if ($is_logged == false) {
            Session::destroy();
            header('location: ' . URL . 'login');
            exit();
        }
    }

    public function index() {
        $this->view->render('dashboard/index');
    }

    public function logout() {
        Session::destroy();
        header('location: ' . URL . 'login');
        exit();
    }
}