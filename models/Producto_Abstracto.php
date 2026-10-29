<?php

abstract class Producto_Abstracto {
    protected $id;
    protected $categoria_id;
    protected $nombre;
    protected $descripcion;
    protected $precio;
    protected $imagen;
    protected $activo;

    public function getId() { return $this->id; }
    public function setId($id) { $this->id = $id; return $this; }

    public function getCategoriaId() { return $this->categoria_id; }
    public function setCategoriaId($categoria_id) { $this->categoria_id = $categoria_id; return $this; }

    public function getNombre() { return $this->nombre; }
    public function setNombre($nombre) { $this->nombre = $nombre; return $this; }

    public function getDescripcion() { return $this->descripcion; }
    public function setDescripcion($descripcion) { $this->descripcion = $descripcion; return $this; }

    public function getPrecio() { return $this->precio; }
    public function setPrecio($precio) { $this->precio = $precio; return $this; }

    public function getImagen() { return $this->imagen; }
    public function setImagen($imagen) { $this->imagen = $imagen; return $this; }

    public function getActivo() { return $this->activo; }
    public function setActivo($activo) { $this->activo = $activo; return $this; }
}
?>