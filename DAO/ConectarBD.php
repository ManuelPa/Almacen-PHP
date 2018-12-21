<?php

$conexion = new mysqli('localhost', 'root', 'root');
if (!$conexion) {
    echo "<p>No se ha podido crear la conexión con el servidor.<p>";
    exit();
}
$conexion->select_db("almacen_mpg") or die("Base de Datos no encontrada.");


