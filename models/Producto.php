<?php
require_once 'Producto_Abstracto.php';

class Producto extends Producto_Abstracto {
    
    public function __construct($categoria_id = null, $nombre = null, $descripcion = null, $precio = null, $imagen = null, $activo = 1) {
        if ($categoria_id !== null) $this->categoria_id = $categoria_id;
        if ($nombre !== null) $this->nombre = $nombre;
        if ($descripcion !== null) $this->descripcion = $descripcion;
        if ($precio !== null) $this->precio = $precio;
        if ($imagen !== null) $this->imagen = $imagen;
        if ($activo !== null) $this->activo = $activo;
    }
}
?>