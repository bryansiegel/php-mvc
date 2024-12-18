<?php 


class PageController {

    public function index() {
        require __DIR__ . '/../views/pages/index.php';
    }

    public function about() {
        require __DIR__ . '/../views/pages/about.php';

    }
}


?>