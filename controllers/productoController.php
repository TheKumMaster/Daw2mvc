<?php
require_once 'models/ProductoDAO.php';

class productoController {

    public function index() {
        $productos = ProductoDAO::getAll();
        $vista = 'views/productos/listado.php';
        require_once 'views/main.php';
    }

    public function show() {
        if (isset($_GET['id'])) {
            $id = $_GET['id'];
            $producto = ProductoDAO::getById($id);
            $vista = 'views/productos/show.php';
            require_once 'views/main.php';
        } else {
            header("Location: " . url . "?controller=producto&action=index");
            exit;
        }
    }
}