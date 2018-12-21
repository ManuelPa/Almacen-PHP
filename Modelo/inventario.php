<?php

include_once 'estanteriacaja.php';

class inventario{

    private $fecha;
    private $estanteriacaja = array();

    function __construct($fecha) {
        $this->fecha = $fecha;
    }

    public function setFecha($fecha) {
        $this->fecha = $fecha;
    }
    public function getFecha() {
        return $this->fecha;
    }
    public function setEstanteriacaja($obestanteria) {
        array_push($this->estanteriacaja, $obestanteria);
    }
    public function getEstanteriacaja() {
        $estanterias = array();
        foreach ($this->estanteriacaja as $estanteria) {
            array_push($estanterias, $estanteria);
        }
        return $estanterias;
    }

}
