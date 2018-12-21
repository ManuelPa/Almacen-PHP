<?php

include_once 'caja.php';

class cajaposicion extends caja {

    private $leja;

    public function __construct($codigo, $altura, $anchura, $profundidad, $color, $material, $contenido, $fecha_alta) {
        parent::__construct($codigo, $altura, $anchura, $profundidad, $color, $material, $contenido, $fecha_alta);
    }

    public function setleja($leja) {
        $this->leja = $leja;
    }
    public function getleja() {
        return $this->leja;
    }
    
    public function __toString() {
        $cadena = parent::__toString();
        $cadena .= $this->getleja() . "<br>";
        return $cadena;
    }
    
}
