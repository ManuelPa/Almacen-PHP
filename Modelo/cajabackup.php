<?php

include_once 'caja.php';

class cajabackup extends caja {

    private $fecha_baja;
    private $codigo_est;
    private $posicionleja;

    public function __construct($codigo, $altura, $anchura, $profundidad, $color, $material, $contenido, $fecha_alta, $fecha_baja, $codigo_est, $posicionleja) {
        parent::__construct($codigo, $altura, $anchura, $profundidad, $color, $material, $contenido, $fecha_alta);
        $this->fecha_baja = $fecha_baja;
        $this->codigo_est = $codigo_est;
        $this->posicionleja = $posicionleja;
    }

    public function getFecha_baja() {
        return $this->fecha_baja;
    }

    public function getCodigo_est() {
        return $this->codigo_est;
    }

    public function getPosicionleja() {
        return $this->posicionleja;
    }

    public function setFecha_baja($fecha_baja) {
        $this->fecha_baja = $fecha_baja;
    }

    public function setCodigo_est($codigo_est) {
        $this->codigo_est = $codigo_est;
    }

    public function setPosicionleja($posicionleja) {
        $this->posicionleja = $posicionleja;
    }

    public function __toString() {
        return "<br>Datos de la caja: Codigo " . $this->getCodigo() . " ,Dimensiones: " . $this->getAnchura() . $this->getAltura() . $this->getProfundidad() . " ,Color: " . $this->getColor() . " ,Material:  " . $this->getMaterial() . " ,Contenido:  " . $this->getContenido() . " ,Fecha de alta: " . $this->getFecha_alta();
    }

}
