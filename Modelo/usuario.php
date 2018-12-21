<?php

class usuario {

    private $usuario;
    private $contraseña;

    public function __construct($usuario, $contraseña) {
        $this->usuario = $usuario;
        $this->contraseña = $contraseña;
    }

    public function getUsuario() {
        return $this->usuario;
    }

    public function getContraseña() {
        return $this->contraseña;
    }

    public function setUsuario($usuario) {
        $this->usuario = $usuario;
    }

    public function setContraseña($contraseña) {
        $this->contraseña = $contraseña;
    }

    public function __toString() {
        return "Usuario:" . $this->usuario . " Contraseña:" . $this->contraseña;
    }

}
