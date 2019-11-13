<?php

class Task extends Controller {
    function __construct() {
        parent::__construct();
        $is_logged = Session::get('is_logged');
        if ($is_logged == false) {
            header('location: ' . URL . 'login');
            exit();
        }
    }

    public function index() {
        $tasks = $this->model->getAllTasks();

        $this->view->render('task/index', [
            'tasks' => $tasks,
        ]);
    }

    public function create() {
        $this->view->render('task/create');
    }

    public function edit($id) {

        if (!is_numeric($id)) {
            require 'Controllers/error.php';
            $controller = new ErrorCustom();
            $controller->index();
            return false;
        }

        $task = $this->model->getTaskByID($id);
        $this->view->render('task/edit', [
            'task' => $task,
        ]);
    }

    public function update($id) {
        $this->model->update($id);
    }

    public function show($id) {
        if (!is_numeric($id)) {
            require 'Controllers/error.php';
            $controller = new ErrorCustom();
            $controller->index();
            return false;
        }

        $task = $this->model->getTaskByID($id);
        $this->view->render('task/show', [
            'task' => $task,
        ]);
    }

    public function run() {
        $this->model->run();
    }

    public function delete($id) {
        $this->model->delete($id);

        header('location: ' . URL . 'task');
    }
}