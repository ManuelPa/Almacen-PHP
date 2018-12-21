<?php
//Incluimos las clases necesarias para poder utilizar metodos de operaciones.
include_once '../DAO/Operaciones.php';
session_start();
//Regogemos el codigo de la caja del formulario.
$codigo = $_REQUEST['codigo'];
//Lamamos a la funcion de getcaja para guardar la fila de la caja selecionada en un array
$respuesta = Operaciones::getCaja($codigo);

if ($respuesta == null) {
    $_SESSION['mensaje'] = "No se ha podido encontrar una caja con codigo: " . $codigo;
    header('Location: ../Vista/Resultado.php');
} else {//Si esta lleno al menos de una fila crearemos un objeto con el array de operaciones e introduciremos un array de objetos a la variable session y haremos el listado en la vista.
    $_SESSION['caja'] = $respuesta;
    header('Location: ../Vista/Confirmacionsalida.php');
}
