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

    public static function getById($id) {
        $con = DataBase::connect();
        $stmt = $con->prepare("SELECT * FROM productos WHERE id = ?");
        $stmt->bind_param("i", $id);
        $stmt->execute();
        $result = $stmt->get_result()->fetch_object();
        $con->close();
        return $result;
    }
}
?>