<?php
// app/controllers/UserController.php
require_once __DIR__ . '/../models/User.php';

class UserController {
    private $userModel;

    public function __construct() {
        $this->userModel = new User();
    }

    public function index() {
        $users = $this->userModel->getAll();
        require __DIR__ . '/../views/admin/users/index.php';
    }

    public function show($id) {
        $user = $this->userModel->getById($id);
        require __DIR__ . '/../views/admin/users/show.php';
    }

    public function create() {
        $baseDir = '/_Php/php-mvc/';
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $name = $_POST['name'];
            $email = $_POST['email'];
            $password = $_POST['password'];
            $this->userModel->create($name, $email, $password);
            header('Location: ' . $baseDir);
        }
        require __DIR__ . '/../views/admin/users/create.php';
    }

    public function edit($id) {
        $baseDir = '/_Php/php-mvc/';
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $name = $_POST['name'];
            $email = $_POST['email'];
            $this->userModel->update($id, $name, $email);
            header('Location: ' . $baseDir);
        } else {
            $user = $this->userModel->getById($id);
            require __DIR__ . '/../views/admin/users/edit.php';
        }
    }

    public function delete($id) {
        $baseDir = '/_Php/php-mvc/';
        $this->userModel->delete($id);
        header('Location: ' . $baseDir);
    }

    
}
?>
