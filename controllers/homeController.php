<?php

class homeController {
    public function index() {
        $vista = 'views/Home/index.php';
        
        require_once 'views/main.php';
    }
}