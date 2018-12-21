<?php

class estanteria {

    private $id;
    private $codigo;
    private $nlejas;
    private $lejasocupadas;
    private $numero;
    private $pasillo;
    private $material;

    public function __construct($codigo, $nlejas, $lejasocupadas, $numero, $pasillo, $material) {
        $this->setCodigo($codigo);
        $this->setNlejas($nlejas);
        $this->setLejasocupadas($lejasocupadas);
        $this->setNumero($numero);
        $this->setPasillo($pasillo);
        $this->setMaterial($material);
    }

    public function getId() {
        return $this->id;
    }

    public function getCodigo() {
        return $this->codigo;
    }

    public function getNlejas() {
        return $this->nlejas;
    }

    public function getLejasocupadas() {
        return $this->lejasocupadas;
    }

    public function getNumero() {
        return $this->numero;
    }

    public function getPasillo() {
        return $this->pasillo;
    }

    public function getMaterial() {
        return $this->material;
    }

    public function setId($id) {
        $this->id = $id;
    }

    public function setCodigo($codigo) {
        $this->codigo = $codigo;
    }

    public function setNlejas($nlejas) {
        $this->nlejas = $nlejas;
    }

    public function setLejasocupadas($lejasocupadas) {
        $this->lejasocupadas = $lejasocupadas;
    }

    public function setNumero($numero) {
        $this->numero = $numero;
    }

    public function setPasillo($pasillo) {
        $this->pasillo = $pasillo;
    }

    public function setMaterial($material) {
        $this->material = $material;
    }

    public function __toString() {
        return "<br>Datos de la estanteria: Codigo " . $this->getCodigo() . ",Número de lejas " . $this->getNlejas() . ",Lejas ocupadas " . $this->getLejasocupadas() . ", Pasillo y número  " . $this->getPasillo() . $this->getNumero() . ", Material " . $this->getMaterial();
    }

}
