<?php
require_once 'config/dataBase.php';

class CategoriaDAO {
    
    public static function getAll() {
        $con = DataBase::connect();
        $result = $con->query("SELECT * FROM categorias ORDER BY id DESC");
        return $result;
    }

    
}
