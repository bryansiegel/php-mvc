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
        require __DIR__ . '/../views/users/index.php';
    }

    public function show($id) {
        $user = $this->userModel->getById($id);
        require __DIR__ . '/../views/users/show.php';
    }

    public function create() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $name = $_POST['name'];
            $email = $_POST['email'];
            $this->userModel->create($name, $email);
            header('Location: /');
        }
        require __DIR__ . '/../views/users/create.php';
    }

    public function edit($id) {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $name = $_POST['name'];
            $email = $_POST['email'];
            $this->userModel->update($id, $name, $email);
            header('Location: /');
        } else {
            $user = $this->userModel->getById($id);
            require __DIR__ . '/../views/users/edit.php';
        }
    }

    public function delete($id) {
        $this->userModel->delete($id);
        header('Location: /');
    }
}
?>
