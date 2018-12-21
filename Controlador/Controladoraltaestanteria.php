<?php
//Incluimos las clases necesarias para generar los objetos.
include_once '../Modelo/estanteria.php';
include_once '../DAO/Operaciones.php';

$codigo = $_REQUEST['codigo'];
$nlejas = $_REQUEST['nlejas'];
$numero = $_REQUEST['nestateria'];
$pasillo = $_REQUEST['lpasillo'];
$material = $_REQUEST['material'];
$lejasocupadas = 0;

//Creamos el objeto de la estanteria y lo enviamos a los metodos
//de la clase operaciones para gestionarlo.
$estanteria = new estanteria($codigo, $nlejas, $lejasocupadas, $numero, $pasillo, $material);
$resultado = Operaciones::setEstanteria($estanteria);
if ($resultado === true) {
    session_start();
    $_SESSION['mensaje'] = "Estanteria insertada correctamente";
    header('Location: ../Vista/Resultado.php');
} else {
    session_start();
    $_SESSION['mensaje'] = "Error al introducir la estanteria.";
    header('Location: ../Vista/Resultado.php');
}







