<?php
class Task_Model extends Model {
    public function __construct() {
        parent::__construct();
    }

    public function validate($data = []) {
        foreach ($data as $key => $value ) {
            if ( empty($value) ) {
                return 0;
            }
        }
        return 1;
    }

    public function run() {
        $name = $_POST['name'];
        $desc = $_POST['description'];
        $status = $_POST['status'];
        $date = $_POST['date'];
        $date_arr = explode(' - ', $date);
        $start_date = $date_arr[0];
        $end_date = $date_arr[1];
        
        $validator = $this->validate([$name, $desc, $status, $date]);

        if ( ! $validator ) {
            header('location: ' . URL . 'task?status=error');
            return false;
        }

        try {
            $sth = $this->db->prepare(
                "INSERT INTO tasks (name,description,status,start_date,end_date,user_id)
                       VALUES (:name,:description,:status,:start_date,:end_date,:user_id)"
            );
            $sth->execute([
                'name' => $name,
                'description' => $desc,
                'status' => $status,
                'start_date' => $start_date,
                'end_date' => $end_date,
                'user_id' => 1,
            ]);
        } catch ( PDOException $exception ) {
            echo "PDO error :" . $exception->getMessage();
            exit();
        }
        header('location: ' . URL . 'task?status=success');
    }

    public function update($id) {
        $name = $_POST['name'];
        $desc = $_POST['description'];
        $status = $_POST['status'];
        $date = $_POST['date'];
        $date_arr = explode(' - ', $date);
        $start_date = $date_arr[0];
        $end_date = $date_arr[1];

        $validator = $this->validate([$name, $desc, $status, $date]);

        if ( ! $validator ) {
            header('location: ' . URL . 'task?status=error');
            return false;
        }

        try {
            $sth = $this->db->prepare(
                "UPDATE tasks SET name=:name, description=:description, status=:status, start_date=:start_date, end_date=:end_date, user_id=:user_id WHERE id=:id"
            );
            $sth->execute([
                'name' => $name,
                'description' => $desc,
                'status' => $status,
                'start_date' => $start_date,
                'end_date' => $end_date,
                'user_id' => 1,
                'id' => $id,
            ]);
        } catch ( PDOException $exception ) {
            echo "PDO error :" . $exception->getMessage();
            exit();
        }
        header('location: ' . URL . 'task?status=update_success');
    }

    public function getAllTasks() {
        $sth = $this->db->prepare("SELECT * FROM tasks");
        $sth->setFetchMode(PDO::FETCH_ASSOC);
        $sth->execute();
        return $sth->fetchAll();
    }

    public function getTaskByID($id) {
        $sth = $this->db->prepare("SELECT *FROM tasks WHERE id=:id");
        $sth->setFetchMode(PDO::FETCH_ASSOC);
        $sth->execute([
            'id' => $id,
        ]);
        $check = $sth->rowCount();
        if (! $check) {
            require 'Controllers/error.php';
            $controller = new ErrorCustom();
            $controller->index();
            exit();
        }
        return $sth->fetch();
    }



    public function delete($id) {
        $sth = $this->db->prepare("DELETE FROM tasks WHERE id=:id");
        $sth->execute([
            'id' => $id,
        ]);
    }
}