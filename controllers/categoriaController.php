<?php
require_once 'models/CategoriaDAO.php';

class categoriaController {

    public function index() {
        $categorias = CategoriaDAO::getAll();
        require_once 'views/categorias/listado.php';
    }

    public function create() {
        require_once 'views/categorias/create.php';
    }

    public function save() {
        if (isset($_POST['nombre']) && !empty(trim($_POST['nombre']))) {
            $nombre = trim($_POST['nombre']);
            CategoriaDAO::save($nombre);
        }
        header("Location: " . url . "?controller=categoria&action=index");
        exit;
    }
}