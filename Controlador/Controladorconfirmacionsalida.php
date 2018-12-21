<?php
//Incluimos las clases necesarias para generar los objetos.
include_once '../DAO/Operaciones.php';
session_start();
$caja = $_SESSION['caja'];

if (isset($_REQUEST['Si'])) {
    //Si el usuario pulsa Si, ejecutamos la funcion de salida de caja
    $codigo = $caja->getCodigo();
    $respuesta = Operaciones::salidacaja($codigo);
    if ($respuesta) {
        $_SESSION['mensaje'] = "La caja ha sido eliminada.";
        header('Location: ../Vista/Resultado.php');
    } else {
        $_SESSION['mensaje'] = "No se ha podido borrar la caja con codigo: " + $caja->getCodigo();
        header('Location: ../Vista/Resultado.php');
    }
} else if (isset($_REQUEST['No'])) {
    header('Location: ../Vista/Salidacaja.php');
}