<?php
require_once 'models/ProductoDAO.php';

class productoController {

    public function index() {
        $productos = ProductoDAO::getAll();
        require_once 'views/productos/listado.php';
    }

    

    public function show() {
        if (isset($_GET['id'])) {
            $id = $_GET['id'];
            $producto = ProductoDAO::getById($id);
            require_once 'views/productos/show.php';
        } else {
            header("Location: " . url . "?controller=producto&action=index");
        }
    }

    public function save() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $nombre       = $_POST['nombre'] ?? '';
            $descripcion  = $_POST['descripcion'] ?? '';
            $precio       = $_POST['precio'] ?? 0;
            $categoria_id = $_POST['categoria_id'] ?? 1;
            
            $nombreImagen = 'default.png';

            if (isset($_FILES['imagen']) && $_FILES['imagen']['error'] === UPLOAD_ERR_OK) {
                $fileTmpPath = $_FILES['imagen']['tmp_name'];
                $fileName    = $_FILES['imagen']['name'];
                $nombreImagen = time() . '_' . $fileName;

                $uploadFileDir = 'assets/img/';
                if (!is_dir($uploadFileDir)) {
                    mkdir($uploadFileDir, 0777, true);
                }

                move_uploaded_file($fileTmpPath, $uploadFileDir . $nombreImagen);
            }

            ProductoDAO::save($nombre, $descripcion, $precio, $categoria_id, $nombreImagen);
        }

        header("Location: " . url . "?controller=producto&action=index");
        exit;
    }

    public function delete() {
        if (isset($_GET['id'])) {
            $id = $_GET['id'];
            ProductoDAO::delete($id);
        }
        header("Location: " . url . "?controller=producto&action=index");
        exit;
    }
}