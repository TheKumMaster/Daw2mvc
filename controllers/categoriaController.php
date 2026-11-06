<?php
require_once 'models/CategoriaDAO.php';

class categoriaController {
    public function index() {
        $categorias = CategoriaDAO::getAll();
        
        $vista = 'views/categorias/listado.php';
        require_once 'views/main.php';
    }

    public function show() {
        if (isset($_GET['id'])) {
            $id = $_GET['id'];
            $categoria = CategoriaDAO::getById($id);
        }
        
        $vista = 'views/categorias/show.php';
        require_once 'views/main.php';
    }
}