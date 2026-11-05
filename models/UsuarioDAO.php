<?php
require_once 'config/dataBase.php';
require_once 'models/Usuario.php';

class UsuarioDAO {

    public static function getAll() {
        $con = DataBase::connect();
        $stmt = $con->query("SELECT * FROM usuarios");
        
        $usuarios = [];
        while ($row = $stmt->fetch_assoc()) {
            $usuario = new Usuario();
            $usuario->setId($row['id'])
                    ->setNombre($row['nombre'])
                    ->setEmail($row['email'])
                    ->setPassword($row['password'])
                    ->setTelefono($row['telefono'])
                    ->setDireccion($row['direccion'])
                    ->setFechaNacimiento($row['fecha_nacimiento'])
                    ->setRol($row['rol'])
                    ->setFechaRegistro($row['fecha_registro']);
            $usuarios[] = $usuario;
        }
        $con->close();
        return $usuarios;
    }

    public static function getById($id) {
        $con = DataBase::connect();
        $stmt = $con->prepare("SELECT * FROM usuarios WHERE id = ?");
        $stmt->bind_param("i", $id);
        $stmt->execute();
        $result = $stmt->get_result();
        
        if ($row = $result->fetch_assoc()) {
            $usuario = new Usuario();
            $usuario->setId($row['id'])
                    ->setNombre($row['nombre'])
                    ->setEmail($row['email'])
                    ->setPassword($row['password'])
                    ->setTelefono($row['telefono'])
                    ->setDireccion($row['direccion'])
                    ->setFechaNacimiento($row['fecha_nacimiento'])
                    ->setRol($row['rol'])
                    ->setFechaRegistro($row['fecha_registro']);
            $con->close();
            return $usuario;
        }
        $con->close();
        return null;
    }

    public static function getByEmail($email) {
        $con = DataBase::connect();
        $stmt = $con->prepare("SELECT * FROM usuarios WHERE email = ?");
        $stmt->bind_param("s", $email);
        $stmt->execute();
        $result = $stmt->get_result();
        
        if ($row = $result->fetch_assoc()) {
            $usuario = new Usuario();
            $usuario->setId($row['id'])
                    ->setNombre($row['nombre'])
                    ->setEmail($row['email'])
                    ->setPassword($row['password'])
                    ->setTelefono($row['telefono'])
                    ->setDireccion($row['direccion'])
                    ->setFechaNacimiento($row['fecha_nacimiento'])
                    ->setRol($row['rol'])
                    ->setFechaRegistro($row['fecha_registro']);
            $con->close();
            return $usuario;
        }
        $con->close();
        return null;
    }

    public static function store($usuario) {
        $con = DataBase::connect();
        $stmt = $con->prepare("INSERT INTO usuarios (nombre, email, password, telefono, direccion, fecha_nacimiento, rol) VALUES (?, ?, ?, ?, ?, ?, ?)");
        
        $nombre = $usuario->getNombre();
        $email = $usuario->getEmail();
        $pass = $usuario->getPassword();
        $tel = $usuario->getTelefono();
        $dir = $usuario->getDireccion();
        $fecha = $usuario->getFechaNacimiento();
        $rol = $usuario->getRol();

        $stmt->bind_param("sssssss", $nombre, $email, $pass, $tel, $dir, $fecha, $rol);
        $result = $stmt->execute();
        $con->close();
        return $result;
    }

    public static function update($usuario) {
        $con = DataBase::connect();
        $stmt = $con->prepare("UPDATE usuarios SET nombre=?, email=?, telefono=?, direccion=?, fecha_nacimiento=? WHERE id=?");
        
        $nombre = $usuario->getNombre();
        $email = $usuario->getEmail();
        $tel = $usuario->getTelefono();
        $dir = $usuario->getDireccion();
        $fecha = $usuario->getFechaNacimiento();
        $id = $usuario->getId();

        $stmt->bind_param("sssssi", $nombre, $email, $tel, $dir, $fecha, $id);
        $result = $stmt->execute();
        $con->close();
        return $result;
    }

    public static function delete($id) {
        $con = DataBase::connect();
        $stmt = $con->prepare("DELETE FROM usuarios WHERE id = ?");
        $stmt->bind_param("i", $id);
        $result = $stmt->execute();
        $con->close();
        return $result;
    }
}
?>