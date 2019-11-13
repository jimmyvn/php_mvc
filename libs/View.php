<?php

class View {
    public function __construct() {

    }

    public function render($name, $data = []) {
        require 'views/header.php';
        require 'Views/' . $name . '.php';
        require 'views/footer.php';
    }
}