<?php
require_once 'models/ProductoDAO.php';
require_once 'models/IngredienteDAO.php';

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
            $ingredientesIncluidos = IngredienteDAO::getIncluidosByProducto($id);
            $ingredientesExtras = IngredienteDAO::getExtrasByProducto($id);
            $vista = 'views/productos/show.php';
            require_once 'views/main.php';
        } else {
            header("Location: " . url . "?controller=producto&action=index");
            exit;
        }
    }
}


    // public function api() {
    //     $metodo = $_SERVER['REQUEST_METHOD'];

    //     if($metodo == "GET"){
    //         if($_GET['funcion'] == "todos"){
    //             $productos = ProductoDAO::getAllJson();
    //         }
    //     }else if($metodo == "POST"){

    //     }
    //     //echo json_encode("Hola nigga");
    // }

?>