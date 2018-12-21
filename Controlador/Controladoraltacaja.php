<?php
//Incluimos las clases necesarias para generar los objetos.
include_once '../Modelo/caja.php';
include_once '../DAO/Operaciones.php';
if ($_REQUEST['Posicion']==-1 ||$_REQUEST['leja']==-1) {
    header("Location: ../Vista/Altacaja.php");
}
$codigo = $_REQUEST['codigo'];
$altura = $_REQUEST['altura'];
$anchura = $_REQUEST['anchura'];
$profundidad = $_REQUEST['profundidad'];
$contenido = $_REQUEST['contenido'];
$material = $_REQUEST['material'];
$color = $_REQUEST['color'];
$idestanteria = $_REQUEST['Posicion'];
$leja = $_REQUEST['leja'];

$caja = new caja($codigo, $altura, $anchura, $profundidad, $color, $material, $contenido, null);

$resultado = Operaciones::setCaja($idestanteria, $leja, $caja);

session_start();
if ($resultado === true) {
    $_SESSION['mensaje'] = "Caja insertada correctamente";
    header('Location: ../Vista/Resultado.php');
} else {
    $_SESSION['mensaje'] = $resultado;
    header('Location: ../Vista/Resultado.php');
}

