<?php

//Controllers
require __DIR__ . '/app/controllers/UserController.php';
require __DIR__ . '/app/controllers/PageController.php';
require __DIR__ . '/app/controllers/AuthController.php';
//Helpers
require('config/urls.php');

//users
$user = new UserController();

//pages
$page = new PageController();

//auth
$auth = new AuthController();

//main pages

//home
if($requestUri === $baseDir) {
$page->index();
} 
//about
elseif($requestUri === $baseDir . 'about/' || $requestUri === $baseDir . 'about') {
    $page->about();
}

//auth
elseif($requestUri === $baseDir . 'login/' || $requestUri === $baseDir . 'login') {
$auth->login();
}


//users
elseif ($requestUri === $baseDir . 'users/' || $requestUri === $baseDir . 'users') {
    $user->index();
} elseif ($requestUri === $baseDir . '/create' || $requestUri === $baseDir . 'create/') {
    $user->create();
} elseif (preg_match('/\/edit\/(\d+)/', $requestUri, $matches)) {
    $user->edit($matches[1]);
} elseif (preg_match('/\/delete\/(\d+)/', $requestUri, $matches)) {
    $user->delete($matches[1]);
} elseif (preg_match('/\/show\/(\d+)/', $requestUri, $matches)) {
    $user->show($matches[1]);
} else {
    echo "404 Not Found";
}



?>
