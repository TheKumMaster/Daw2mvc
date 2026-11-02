<?php
require_once 'config/dataBase.php';

class CategoriaDAO {
    
    public static function getAll() {
        $con = DataBase::connect();
        $result = $con->query("SELECT * FROM categorias ORDER BY id DESC");
        return $result;
    }

    public static function save($nombre) {
        $con = DataBase::connect();
        $stmt = $con->prepare("INSERT INTO categorias (nombre) VALUES (?)");
        $stmt->bind_param("s", $nombre);
        return $stmt->execute();
    }
}
