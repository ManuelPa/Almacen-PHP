<?php
//Incluimos las clases necesarias para generar los objetos.
include_once '../Modelo/usuario.php';
include_once '../DAO/Operaciones.php';
//Recogemos los datos y montamos el objeto.
$usuario = $_REQUEST['usuario'];
$contra = $_REQUEST['contra'];
$user = new usuario($usuario, $contra);

session_start();
//Si el usuario pulsa inicio de sesion accederemos al primer if sin no al segundo.
if (isset($_REQUEST['Iusuario'])) {
    $resultado = Operaciones::login($user);
    if ($resultado === true) {
        $_SESSION['sesion'] = true;
        header("Location: ../Index.php");
    } else {
        $_SESSION['mensaje'] = "Noi";
        header('Location: ../Vista/Login.php');
    }
} else if (isset($_REQUEST['Rusuario'])) {
    $resultado = Operaciones::crearUsuario($user);
    if ($resultado === true) {
        $_SESSION['sesion'] = true;
        header("Location: ../Index.php");
    } else {
        $_SESSION['mensaje'] = "Nor";
        header('Location: ../Vista/Login.php');
    }
}