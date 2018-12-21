<?php
//Incluimos las clases necesarias para generar los objetos.
include_once '../DAO/Operaciones.php';
include_once '../Modelo/estanteria.php';

//Lamamos a la funcion de setlistadoestanteria para guardar las filas de las estanterias en un array
$array = Operaciones::setListadoestanteria();

if ($array == null) {
    session_start();
    $_SESSION['mensaje'] = "No se han podido encontrar estanterias que listar.";
    header('Location: ../Vista/Resultado.php');
} else {//Si esta lleno al menos de una fila crearemos un objeto con el array de operaciones e introduciremos un array de objetos a la variable session y haremos el listado en la vista.
    session_start();
    $_SESSION['estanterias'] = $array;
    header('Location: ../Vista/Listadoestanteria.php');
}



