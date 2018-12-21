<?php
//Incluimos las clases necesarias para poder utilizar metodos de operaciones.

include_once '../DAO/Operaciones.php';

$idestanteria = $_REQUEST['idestanteria'];
$nlejas = Operaciones::getlejaso($idestanteria);

if ($nlejas != null) {
    $cadena = "";
    foreach ($nlejas as $valor) {
        $cadena .= " <option value='$valor'>$valor</option>";
    }
    echo $cadena;
} else {
    echo 'Error, no hay lejas disponibles.';
}


