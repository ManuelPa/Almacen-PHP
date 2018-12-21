<?php
//Incluimos las clases necesarias para generar los objetos.
include_once '../DAO/Operaciones.php';

//Lamamos a la funcion de setinventario, que sera el lugar donde vamos a recoger y montar todos los elementos de nuestra base de datos.
session_start();
$_SESSION['inventario'] = Operaciones::setInventario();
header('Location: ../Vista/Listadoinventario.php');

