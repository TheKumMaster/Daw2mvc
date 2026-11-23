<?php
require_once 'models/UsuarioDAO.php';

class usuarioController {

    private function iniciarSesion() {
        if (session_status() === PHP_SESSION_NONE) {
            session_start();
        }
    }

    public function index() {
        $usuarios = UsuarioDAO::getAll();$vista = 'views/usuarios/listado.php';
        require_once 'views/main.php';
    }

    public function show() {
        $this->iniciarSesion();
        if (isset($_SESSION['usuario_id'])) {$usuario = UsuarioDAO::getById($_SESSION['usuario_id']);$vista = 'views/usuarios/show.php';
            require_once 'views/main.php';
        } else {
            header("Location: ?controller=usuario&action=login");
            exit();
        }
    }

    public function create() {
        $vista = 'views/usuarios/create.php';
        require_once 'views/main.php';
    }

    public function save() {
        if (isset($_POST['nombre'])) {$nombre = $_POST['nombre'];$email = $_POST['email'];$password = $_POST['password'];$telefono = $_POST['telefono'];$direccion = $_POST['direccion'];$fecha_nacimiento = !empty($_POST['fecha_nacimiento']) ?$_POST['fecha_nacimiento'] : null;
            $rol = 'usuario';

            $usuario = new Usuario($nombre, $email,$password, $telefono,$direccion, $fecha_nacimiento,$rol);
            UsuarioDAO::store($usuario);
        }
        header("Location: ?controller=usuario&action=login");
        exit();
    }

    public function login() {
        $vista = 'views/usuarios/login.php';
        require_once 'views/main.php';
    }

    public function validar() {
        $this->iniciarSesion();
        if (isset($_POST['email']) && isset($_POST['password'])) {
            $email =$_POST['email'];
            $password =$_POST['password'];

            $usuario = UsuarioDAO::getByEmail($email);

            if ($usuario && $usuario->getPassword() ===$password) {
                $_SESSION['usuario_id'] =$usuario->getId();
                $_SESSION['usuario_nombre'] =$usuario->getNombre();
                $_SESSION['usuario_rol'] =$usuario->getRol();
                
                header("Location: ?controller=home&action=index");
                exit();
            } else {
                header("Location: ?controller=usuario&action=login");
                exit();
            }
        }
    }

    public function update() {
        $this->iniciarSesion();
        if (isset($_SESSION['usuario_id']) && isset($_POST['nombre'])) {$usuario = UsuarioDAO::getById($_SESSION['usuario_id']);$fecha_nacimiento = !empty($_POST['fecha_nacimiento']) ?$_POST['fecha_nacimiento'] : null;

            $usuario->setNombre($_POST['nombre'])
                    ->setEmail($_POST['email'])
                    ->setTelefono($_POST['telefono'])
                    ->setDireccion($_POST['direccion'])
                    ->setFechaNacimiento($fecha_nacimiento);

            UsuarioDAO::update($usuario);
            $_SESSION['usuario_nombre'] =$usuario->getNombre();
        }
        header("Location: ?controller=usuario&action=show");
        exit();
    }

    public function logout() {
        $this->iniciarSesion();
        session_destroy();
        header("Location: ?controller=home&action=index");
        exit();
    }
}
?>