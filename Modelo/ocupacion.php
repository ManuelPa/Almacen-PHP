<?php

class ocupacion {
    
    private $id_caja;
    private $id_estanteria;
    private $posicion;
    
    public function __construct($id_caja, $id_estanteria, $posicion) {
        $this->id_caja = $id_caja;
        $this->id_estanteria = $id_estanteria;
        $this->posicion = $posicion;
    }
    public function getId_caja() {
        return $this->id_caja;
    }

    public function getId_estanteria() {
        return $this->id_estanteria;
    }

    public function getPosicion() {
        return $this->posicion;
    }

    public function setId_caja($id_caja) {
        $this->id_caja = $id_caja;
    }

    public function setId_estanteria($id_estanteria) {
        $this->id_estanteria = $id_estanteria;
    }

    public function setPosicion($posicion) {
        $this->posicion = $posicion;
    }
}
