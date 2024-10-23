<?php
require_once __DIR__ . '/app/controllers/UserController.php';

$controller = new UserController();

$requestUri = explode('?', $_SERVER['REQUEST_URI'])[0];

if ($requestUri === '/') {
    $controller->index();
} elseif ($requestUri === '/create') {
    $controller->create();
} elseif (preg_match('/\/edit\/(\d+)/', $requestUri, $matches)) {
    $controller->edit($matches[1]);
} elseif (preg_match('/\/delete\/(\d+)/', $requestUri, $matches)) {
    $controller->delete($matches[1]);
} elseif (preg_match('/\/show\/(\d+)/', $requestUri, $matches)) {
    $controller->show($matches[1]);
} else {
    echo "404 Not Found";
}
?>
