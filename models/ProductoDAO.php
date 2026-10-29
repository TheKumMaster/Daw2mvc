<?php
require_once 'config/dataBase.php';
require_once 'models/Producto.php';

class ProductoDAO {

    public static function getAll() {
        $con = DataBase::connect();
        $stmt = $con->query("SELECT * FROM productos ORDER BY id DESC");
        
        $productos = [];
        while ($row = $stmt->fetch_assoc()) {
            $producto = new Producto();
            $producto->setId($row['id'])
                     ->setCategoriaId($row['categoria_id'])
                     ->setNombre($row['nombre'])
                     ->setDescripcion($row['descripcion'])
                     ->setPrecio($row['precio'])
                     ->setImagen($row['imagen'])
                     ->setActivo($row['activo']);
            $productos[] = $producto;
        }
        $con->close();
        return $productos;
    }

    public static function getById($id) {
        $con = DataBase::connect();
        $stmt = $con->prepare("SELECT * FROM productos WHERE id = ?");
        $stmt->bind_param("i", $id);
        $stmt->execute();
        $result = $stmt->get_result();
        
        if ($row = $result->fetch_assoc()) {
            $producto = new Producto();
            $producto->setId($row['id'])
                     ->setCategoriaId($row['categoria_id'])
                     ->setNombre($row['nombre'])
                     ->setDescripcion($row['descripcion'])
                     ->setPrecio($row['precio'])
                     ->setImagen($row['imagen'])
                     ->setActivo($row['activo']);
            $con->close();
            return $producto;
        }
        $con->close();
        return null;
    }

    public static function store($producto) {
        $con = DataBase::connect();
        $stmt = $con->prepare("INSERT INTO productos (categoria_id, nombre, descripcion, precio, imagen, activo) VALUES (?, ?, ?, ?, ?, ?)");
        
        $cat_id = $producto->getCategoriaId();
        $nombre = $producto->getNombre();
        $desc = $producto->getDescripcion();
        $precio = $producto->getPrecio();
        $img = $producto->getImagen();
        $activo = $producto->getActivo();

        $stmt->bind_param("issdsi", $cat_id, $nombre, $desc, $precio, $img, $activo);
        $result = $stmt->execute();
        $con->close();
        return $result;
    }

    public static function update($producto) {
        $con = DataBase::connect();
        $stmt = $con->prepare("UPDATE productos SET categoria_id=?, nombre=?, descripcion=?, precio=?, imagen=?, activo=? WHERE id=?");
        
        $cat_id = $producto->getCategoriaId();
        $nombre = $producto->getNombre();
        $desc = $producto->getDescripcion();
        $precio = $producto->getPrecio();
        $img = $producto->getImagen();
        $activo = $producto->getActivo();
        $id = $producto->getId();

        $stmt->bind_param("issdsii", $cat_id, $nombre, $desc, $precio, $img, $activo, $id);
        $result = $stmt->execute();
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