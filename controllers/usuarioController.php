<?php
require_once 'models/UsuarioDAO.php';

class usuarioController {

    public function index() {
        $usuarios = UsuarioDAO::getAll();
        require_once 'views/usuarios/listado.php';
    }

    public function show() {
        session_start();
        if (isset($_SESSION['usuario_id'])) {
            $usuario = UsuarioDAO::getById($_SESSION['usuario_id']);
            require_once 'views/usuarios/show.php';
        } else {
            header("Location: ?controller=usuario&action=login");
        }
    }

    public function create() {
        require_once 'views/usuarios/create.php';
    }

    public function save() {
        if (isset($_POST['nombre'])) {
            $nombre = $_POST['nombre'];
            $email = $_POST['email'];
            $password = $_POST['password'];
            $telefono = $_POST['telefono'];
            $direccion = $_POST['direccion'];
            $fecha_nacimiento = !empty($_POST['fecha_nacimiento']) ? $_POST['fecha_nacimiento'] : null;
            $rol = 'usuario';

            $usuario = new Usuario($nombre, $email, $password, $telefono, $direccion, $fecha_nacimiento, $rol);
            UsuarioDAO::store($usuario);
        }
        header("Location: ?controller=usuario&action=login");
    }

    public function login() {
        require_once 'views/usuarios/login.php';
    }

    public function validar() {
        session_start();
        if (isset($_POST['email']) && isset($_POST['password'])) {
            $email = $_POST['email'];
            $password = $_POST['password'];

            $usuario = UsuarioDAO::getByEmail($email);

            if ($usuario && $usuario->getPassword() === $password) {
                $_SESSION['usuario_id'] = $usuario->getId();
                $_SESSION['usuario_nombre'] = $usuario->getNombre();
                $_SESSION['usuario_rol'] = $usuario->getRol();
                
                header("Location: ?controller=home&action=index");
                exit();
            } else {
                header("Location: ?controller=usuario&action=login");
                exit();
            }
        }
    }

    public function update() {
        session_start();
        if (isset($_POST['id'])) {
            $usuario = UsuarioDAO::getById($_POST['id']);
            $fecha_nacimiento = !empty($_POST['fecha_nacimiento']) ? $_POST['fecha_nacimiento'] : null;

            $usuario->setNombre($_POST['nombre'])
                    ->setEmail($_POST['email'])
                    ->setTelefono($_POST['telefono'])
                    ->setDireccion($_POST['direccion'])
                    ->setFechaNacimiento($fecha_nacimiento);

            UsuarioDAO::update($usuario);
        }
        header("Location: ?controller=usuario&action=show");
    }

    public function logout() {
        session_start();
        session_destroy();
        header("Location: ?controller=home&action=index");
    }
}
?>