<?php

class caja {

    private $id;
    private $codigo;
    private $altura;
    private $anchura;
    private $profundidad;
    private $color;
    private $material;
    private $contenido;
    private $fecha_alta;

    public function __construct($codigo, $altura, $anchura, $profundidad, $color, $material, $contenido, $fecha_alta) {
        $this->codigo = $codigo;
        $this->altura = $altura;
        $this->anchura = $anchura;
        $this->profundidad = $profundidad;
        $this->color = $color;
        $this->material = $material;
        $this->contenido = $contenido;
        $this->fecha_alta = $fecha_alta;
    }

    public function getId() {
        return $this->id;
    }

    public function getCodigo() {
        return $this->codigo;
    }

    public function getAltura() {
        return $this->altura;
    }

    public function getAnchura() {
        return $this->anchura;
    }

    public function getProfundidad() {
        return $this->profundidad;
    }

    public function getColor() {
        return $this->color;
    }

    public function getMaterial() {
        return $this->material;
    }

    public function getContenido() {
        return $this->contenido;
    }

    public function getFecha_alta() {
        return $this->fecha_alta;
    }

    public function setId($id) {
        $this->id = $id;
    }

    public function setCodigo($codigo) {
        $this->codigo = $codigo;
    }

    public function setAltura($altura) {
        $this->altura = $altura;
    }

    public function setAnchura($anchura) {
        $this->anchura = $anchura;
    }

    public function setProfundidad($profundidad) {
        $this->profundidad = $profundidad;
    }

    public function setColor($color) {
        $this->color = $color;
    }

    public function setMaterial($material) {
        $this->material = $material;
    }

    public function setContenido($contenido) {
        $this->contenido = $contenido;
    }

    public function setFecha_alta($fecha_alta) {
        $this->fecha_alta = $fecha_alta;
    }

    public function __toString() {
        return "<br>Datos de la caja: Codigo " . $this->getCodigo() . " ,Dimensiones: " . $this->getAnchura() . $this->getAltura() . $this->getProfundidad() . " ,Color: " . $this->getColor() . " ,Material:  " . $this->getMaterial() . " ,Contenido:  " . $this->getContenido() . " ,Fecha de alta: " . $this->getFecha_alta();
    }

}
