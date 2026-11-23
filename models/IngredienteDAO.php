<?php
require_once 'config/dataBase.php';

class IngredienteDAO {

    public static function getIncluidosByProducto($producto_id) {
        $con = DataBase::connect();
        $stmt = $con->prepare("
            SELECT i.id, i.nombre, i.precio_extra
            FROM ingredientes i
            INNER JOIN producto_ingrediente pi ON i.id = pi.ingrediente_id
            WHERE pi.producto_id = ? AND i.activo = 1
            ORDER BY i.nombre ASC
        ");
        $stmt->bind_param("i", $producto_id);
        $stmt->execute();
        $result = $stmt->get_result();
        $con->close();
        return $result;
    }

    public static function getExtrasByProducto($producto_id) {
        $con = DataBase::connect();
        $stmt = $con->prepare("
            SELECT i.id, i.nombre, i.precio_extra
            FROM ingredientes i
            WHERE i.activo = 1
              AND i.id NOT IN (
                  SELECT ingrediente_id FROM producto_ingrediente WHERE producto_id = ?
              )
            ORDER BY i.nombre ASC
        ");
        $stmt->bind_param("i", $producto_id);
        $stmt->execute();
        $result = $stmt->get_result();
        $con->close();
        return $result;
    }

    public static function getById($id) {
        $con = DataBase::connect();
        $stmt = $con->prepare("SELECT * FROM ingredientes WHERE id = ?");
        $stmt->bind_param("i", $id);
        $stmt->execute();
        $result = $stmt->get_result()->fetch_object();
        $con->close();
        return $result;
    }
}
?>