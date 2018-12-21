<?php
//Incluimos las clases necesarias para generar los objetos.
include_once '../DAO/Operaciones.php';
include_once '../Modelo/cajabackup.php';
//Regogemos el codigo de la caja del formulario.
$codigo = $_REQUEST['codigo'];
//Lamamos a la funcion de getcaja para guardar la fila de la caja selecionada en un array
$respuesta = Operaciones::getCajabackup($codigo);

if ($respuesta === null) {
    session_start();
    $_SESSION['mensaje'] = "No esta registrada una salida de una caja con ese codigo. ";
    header('Location: ../Vista/Resultado.php');
} else {//Si esta lleno al menos de una fila introduciremos un array de objetos a la variable session y haremos el listado en la vista.   
    session_start();
    $_SESSION['caja'] = $respuesta;
    header('Location: ../Vista/Confirmaciondevolucion.php');
}

