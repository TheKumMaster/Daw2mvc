<?php
require_once 'Usuario_Abstracto.php';

class Usuario extends Usuario_Abstracto {

    public function __construct($nombre = null, $email = null, $password = null, $telefono = null, $direccion = null, $fecha_nacimiento = null, $rol = 'usuario') {
        if ($nombre !== null) {
            $this->nombre = $nombre;
        }
        if ($email !== null) {
            $this->email = $email;
        }
        if ($password !== null) {
            $this->password = $password;
        }
        if ($telefono !== null) {
            $this->telefono = $telefono;
        }
        if ($direccion !== null) {
            $this->direccion = $direccion;
        }
        if ($fecha_nacimiento !== null) {
            $this->fecha_nacimiento = $fecha_nacimiento;
        }
        if ($rol !== null) {
            $this->rol = $rol;
        }
    }
}
?>