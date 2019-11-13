<?php

class Login_Model extends Model {
    function __construct() {
        parent::__construct();
    }

    public function run() {
        $sth = $this->db->prepare(
            "SELECT id FROM users WHERE username=:username AND password=MD5(:password)"
        );
        $sth->execute([
            'username' => $_POST['username'],
            'password' => $_POST['password'],
        ]);

        $check = $sth->rowCount();

        if ( !$check ) {
            print_r('Failed');
        } else {
            Session::set('is_logged', true);
            header('location: ../dashboard');
            exit();
        }
    }
}