<?php
require_once __DIR__ . '/../models/User.php';

class AuthController {

    // public function login() {
    //     require_once __DIR__ . '/../views/admin/login.php';
    // }
    public function login() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $username = $_POST['username'];
            $password = $_POST['password'];

            $userModel = new User();
            $user = $userModel->findByUsername($username);

            if ($user && password_verify($password, $user['password'])) {
                session_start();
                $_SESSION['user_id'] = $user['id'];
                $_SESSION['username'] = $user['username'];
                header('Location: /dashboard');
                exit();
            }

            $error = "Invalid username or password.";
            require_once __DIR__ . '/../views/admin/login.php';
        } else {
            require_once __DIR__ . '/../views/admin/login.php';
        }
    }

    public function dashboard() {
        session_start();
        if (!isset($_SESSION['user_id'])) {
            header('Location: /');
            exit();
        }
        require_once __DIR__ . '/../views/admin/dashboard.php';
    }

    public function logout() {
        session_start();
        session_unset();
        session_destroy();
        header('Location: /');
        exit();
    }
}