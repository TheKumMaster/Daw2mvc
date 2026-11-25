<?php
require_once 'models/ProductoDAO.php';
require_once 'models/IngredienteDAO.php';

class carritoController {

    private function iniciarSesion() {
        if (session_status() === PHP_SESSION_NONE) {
            session_start();
        }
    }

    public function index() {
        $this->iniciarSesion();
        $carrito = $_SESSION['carrito'] ?? [];
        $vista = 'views/carrito/index.php';
        require_once 'views/main.php';
    }

    public function add() {
        $this->iniciarSesion();

        if (!isset($_POST['producto_id'])) {
            header("Location: " . url . "?controller=producto&action=index");
            exit();
        }

        $producto_id = (int)$_POST['producto_id'];
        $producto = ProductoDAO::getById($producto_id);

        if (!$producto) {
            header("Location: " . url . "?controller=producto&action=index");
            exit();
        }

        $precio_unitario = (float)$producto->precio;
        $modificaciones = [];

        if (isset($_POST['incluidos']) && is_array($_POST['incluidos'])) {
            foreach ($_POST['incluidos'] as $ing_id => $qty) {
                if ((int)$qty === 0) {
                    $ing = IngredienteDAO::getById((int)$ing_id);
                    if ($ing) {
                        $modificaciones[] = [
                            'id' => $ing->id,
                            'nombre' => $ing->nombre,
                            'precio_extra' => 0,
                            'accion' => 'quitar'
                        ];
                    }
                }
            }
        }

        if (isset($_POST['extras']) && is_array($_POST['extras'])) {
            foreach ($_POST['extras'] as $ing_id => $qty) {
                $qty = (int)$qty;
                if ($qty > 0) {
                    $ing = IngredienteDAO::getById((int)$ing_id);
                    if ($ing) {
                        $precio_unitario += (float)$ing->precio_extra * $qty;
                        $modificaciones[] = [
                            'id' => $ing->id,
                            'nombre' => $ing->nombre . ($qty > 1 ? " (x$qty)" : ""),
                            'precio_extra' => (float)$ing->precio_extra * $qty,
                            'accion' => 'añadir'
                        ];
                    }
                }
            }
        }

        if (!isset($_SESSION['carrito'])) {
            $_SESSION['carrito'] = [];
        }

        $_SESSION['carrito'][] = [
            'producto_id' => $producto->id,
            'nombre' => $producto->nombre,
            'imagen' => $producto->imagen,
            'precio_unitario' => $precio_unitario,
            'cantidad' => 1,
            'modificaciones' => $modificaciones
        ];

        header("Location: " . url . "?controller=carrito&action=index");
        exit();
    }

    public function up() {
        $this->iniciarSesion();
        if (isset($_GET['index']) && isset($_SESSION['carrito'][$_GET['index']])) {
            $_SESSION['carrito'][$_GET['index']]['cantidad']++;
        }
        header("Location: " . url . "?controller=carrito&action=index");
        exit();
    }

    public function down() {
        $this->iniciarSesion();
        if (isset($_GET['index']) && isset($_SESSION['carrito'][$_GET['index']])) {
            $_SESSION['carrito'][$_GET['index']]['cantidad']--;
            if ($_SESSION['carrito'][$_GET['index']]['cantidad'] <= 0) {
                unset($_SESSION['carrito'][$_GET['index']]);
                $_SESSION['carrito'] = array_values($_SESSION['carrito']);
            }
        }
        header("Location: " . url . "?controller=carrito&action=index");
        exit();
    }

    public function remove() {
        $this->iniciarSesion();
        if (isset($_GET['index']) && isset($_SESSION['carrito'][$_GET['index']])) {
            unset($_SESSION['carrito'][$_GET['index']]);
            $_SESSION['carrito'] = array_values($_SESSION['carrito']);
        }
        header("Location: " . url . "?controller=carrito&action=index");
        exit();
    }

    public function clear() {
        $this->iniciarSesion();
        unset($_SESSION['carrito']);
        header("Location: " . url . "?controller=carrito&action=index");
        exit();
    }
}
?>