<?php
require_once 'models/ProductoDAO.php';

class productoController {

    // Mostrar el listado de todos los productos
    public function index() {
        $productos = ProductoDAO::getAll();
        require_once 'views/productos/listado.php';
    }

    // Mostrar un producto específico
    public function show() {
        if (isset($_GET['id'])) {
            $producto = ProductoDAO::getById($_GET['id']);
            require_once 'views/productos/show.php';
        } else {
            header("Location: ?controller=producto&action=index");
        }
    }

    // Mostrar el formulario para crear un producto
    public function create() {
        require_once 'views/productos/create.php';
    }

    // Guardar el producto en la base de datos
    public function save() {
        if (isset($_POST['nombre'])) {
            $categoria_id = $_POST['categoria_id']; 
            $nombre = $_POST['nombre'];
            $descripcion = $_POST['descripcion'];
            $precio = $_POST['precio'];
            $imagen = $_POST['imagen'];
            $activo = 1;

            $producto = new Producto($categoria_id, $nombre, $descripcion, $precio, $imagen, $activo);
            ProductoDAO::store($producto);
        }
        header("Location: ?controller=producto&action=index");
    }

}
?>