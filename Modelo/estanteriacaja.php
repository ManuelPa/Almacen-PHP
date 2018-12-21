<?php

include_once 'estanteria.php';

class estanteriacaja extends estanteria {

    private $arraycajasposicion = array();

    public function __construct($codigo, $nlejas, $lejasocupadas, $numero, $pasillo, $material) {
        parent::__construct($codigo, $nlejas, $lejasocupadas, $numero, $pasillo, $material);
    }

    public function setCajaposicion($objcajaposicion) {
        array_push($this->arraycajasposicion, $objcajaposicion);
    }

    public function getCajaposicion() {
        $cajas = array();
        foreach ($this->arraycajasposicion as $cajaposicion) {
            array_push($cajas, $cajaposicion);
        }
        return $cajas;
    }

    public function __toString() {
        $cadena = parent::__toString();
        foreach ($this->arraycajasposicion as $cajaposicion) {
            $cadena .= $cajaposicion . "<br>";
        }
        return $cadena;
    }

}
