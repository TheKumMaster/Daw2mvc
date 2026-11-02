<?php
require_once 'config/dataBase.php';

class ProductoDAO {

    public static function getAll() {
        $con = DataBase::connect();
        return $con->query("SELECT * FROM productos ORDER BY id DESC");
    }

    public static function save($nombre, $descripcion, $precio, $categoria_id, $imagen = 'default.png') {
        $con = DataBase::connect();
        
        $stmt = $con->prepare("INSERT INTO productos (nombre, descripcion, precio, categoria_id, imagen) VALUES (?, ?, ?, ?, ?)");
        // 'ssdis' -> s (string), s (string), d (double/float), i (integer), s (string)
        $stmt->bind_param("ssdis", $nombre, $descripcion, $precio, $categoria_id, $imagen);
        
        return $stmt->execute();
    }

    public static function getById($id) {
        $con = DataBase::connect();
        $stmt = $con->prepare("SELECT * FROM productos WHERE id = ?");
        $stmt->bind_param("i", $id);
        $stmt->execute();
        return $stmt->get_result()->fetch_object();
    }
    public static function delete($id) {
    $con = DataBase::connect();
    $stmt = $con->prepare("DELETE FROM productos WHERE id = ?");
    $stmt->bind_param("i", $id);
    return $stmt->execute();
    }
}