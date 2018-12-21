<?php

//Incluimos las clases necesarias para poder utilizar metodos de operaciones.
include_once '../DAO/Operaciones.php';
//Llamo a la funcion getestanteria de operaciones para asi tener un array de estanterias y lo añadimos a session  para trabajar en la vista.
session_start();
$resultado = Operaciones::setListadoestanterialibres();
if ($resultado == null) {
    $_SESSION['mensaje'] = "No hay estanterias regitradas para introducir cajas.";
    header('Location: ../Vista/Resultado.php');
} else {
    $_SESSION['estanterias'] = $resultado;
    header('Location: ../Vista/Altacaja.php');
}

