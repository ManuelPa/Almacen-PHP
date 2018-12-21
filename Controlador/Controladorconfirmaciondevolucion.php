<?php
//Incluimos las clases necesarias para generar los objetos.
Include_once '../DAO/Operaciones.php';
include_once '../Modelo/cajabackup.php';
session_start();
$caja = $_SESSION['caja'];
//Si el usuario pulsa si.
if (isset($_REQUEST['Si'])) {
    $idestanteria = $_REQUEST['Posicion'];
    $leja = $_REQUEST['Leja'];
    //Si el ususario no selecciona la leja o la estanteria mostramos el mensaje.
    if ($idestanteria == -1 || $leja == -1) {
        $mensaje = "";
        if ($idestanteria == -1) {
            $mensaje .= "Debes elegir una estantería.<br>";
        } else if ($leja == -1) {
            $mensaje .= "Debes elegir una leja.<br>";
        }
        $_SESSION['mensaje'] = $mensaje;
        header('Location: ../Vista/Resultado.php');
    }else{
        //Si los datos estan bien ejecutamos la funcion de devolucion.
        $respuesta = Operaciones::devolucioncajabackup($caja, $idestanteria, $leja);
        if ($respuesta === true) {
            $_SESSION['mensaje'] = "La caja ha sido devuelta.";
            header('Location: ../Vista/Resultado.php');
        } else {
            //Si hay algun error.
            $_SESSION['mensaje'] = $respuesta;
            header('Location: ../Vista/Resultado.php');
        }
    }
} else if (isset($_REQUEST['No'])) {
    header('Location: ../Vista/Devolucioncaja.php');
}
