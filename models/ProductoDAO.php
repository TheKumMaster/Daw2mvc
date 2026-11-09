<?php
require_once 'config/dataBase.php';

class ProductoDAO {

    public static function getAll() {
        $con = DataBase::connect();
        $result = $con->query("SELECT * FROM productos ORDER BY id DESC");
        $con->close();
        return $result;
    }

    public static function getByCategoria($categoria_id) {
        $con = DataBase::connect();
        $stmt = $con->prepare("SELECT * FROM productos WHERE categoria_id = ? AND activo = 1");
        $stmt->bind_param("i", $categoria_id);
        $stmt->execute();
        $result = $stmt->get_result();
        $con->close();
        return $result;
    }

    public static function save($nombre, $descripcion, $precio, $categoria_id, $imagen = 'default.png') {
        $con = DataBase::connect();
        $stmt = $con->prepare("INSERT INTO productos (nombre, descripcion, precio, categoria_id, imagen) VALUES (?, ?, ?, ?, ?)");
        $stmt->bind_param("ssdis", $nombre, $descripcion, $precio, $categoria_id, $imagen);
        $result = $stmt->execute();
        $con->close();
        return $result;
    }

    public static function getById($id) {
        $con = DataBase::connect();
        $stmt = $con->prepare("SELECT * FROM productos WHERE id = ?");
        $stmt->bind_param("i", $id);
        $stmt->execute();
        $result = $stmt->get_result()->fetch_object();
        $con->close();
        return $result;
    }

    public static function delete($id) {
        $con = DataBase::connect();
        $stmt = $con->prepare("DELETE FROM productos WHERE id = ?");
        $stmt->bind_param("i", $id);
        $result = $stmt->execute();
        $con->close();
        return $result;
    }
}
?>