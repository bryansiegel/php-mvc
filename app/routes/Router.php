<?php 

// Router.php
class Router {
    private $routes = [];

    public function get($path, $callback) {
        $this->addRoute('GET', $path, $callback);
    }

    public function post($path, $callback) {
        $this->addRoute('POST', $path, $callback);
    }

    private function addRoute($method, $path, $callback) {
        $this->routes[] = compact('method', 'path', 'callback');
    }

    public function dispatch($requestUri, $requestMethod) {
        foreach ($this->routes as $route) {
            if ($route['method'] === $requestMethod && preg_match($this->convertToRegex($route['path']), $requestUri, $matches)) {
                return call_user_func_array($route['callback'], array_slice($matches, 1));
            }
        }
        http_response_code(404);
        echo "404 - Not Found";
    }

    private function convertToRegex($path) {
        return "#^" . preg_replace('/{([^}]+)}/', '([^/]+)', $path) . "$#";
    }
}



?>