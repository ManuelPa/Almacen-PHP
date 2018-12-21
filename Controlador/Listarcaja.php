<?php
//Incluimos las clases necesarias para poder utilizar metodos de operaciones.
include_once '../DAO/Operaciones.php';
//Lamamos a la funcion de setlistadoestanteria para guardar las filas de las estanterias en un array
$array = Operaciones::setListadocaja();

if ($array == null) {
    session_start();
    $_SESSION['mensaje'] = "No se han podido encontrar cajas que listar.";
    header('Location: ../Vista/Resultado.php');
} else {//Si esta lleno al menos de una fila crearemos un objeto con el array de operaciones e introduciremos un array de objetos a la variable session y haremos el listado en la vista.
    session_start();
    $_SESSION['cajas'] = $array;
    header('Location: ../Vista/Listadocaja.php');
}

