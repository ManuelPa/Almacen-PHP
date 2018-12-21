<!DOCTYPE html>

<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Almacen de cajas.</title>
        <link href="../css/almacen.css" rel="stylesheet" type="text/css">
    </head>
    <body>
        <?php
        //Comprobamos que la variable de caja esta creada, si no enviaremos al usuario al controlador para obtenerla.
        //Comprobamos que la variable sesion esta creada, por lo tanto el usuario ha iniciado la sesion.
        //Incluimos tambien las clases de nuestros objetos.
        include_once '../Modelo/caja.php';
        session_start();
        if (!isset($_SESSION['caja'])) {
            header('Location: ../Controlador/Controladorsalidacaja.php');
        }
        $caja = $_SESSION['caja'];
        if (!isset($_SESSION['sesion'])) {
            header('Location: Login.php');
        }
        ?>
        <header>
            <div class="primary_header">
                <a href="../Index.php"><h1 class="title">Almacén Koala S.L.</h1></a> 
            </div>
        </header>
        <section class="section">
            <h2 class="titulovista">Confirmacion Salida de caja:</h2>
            <br>
            <table class="table">
                <tr bgcolor =#F3F781>
                    <td class="td"><b>Código: </b><?php echo $caja->getCodigo() ?> </td>
                    <td class="td"><b>Altura: </b><?php echo $caja->getAltura() ?></td>
                    <td class="td"><b>Anchura: </b><?php echo $caja->getAnchura() ?></td>
                    <td class="td"><b>Profundidad: </b><?php echo $caja->getProfundidad() ?></td>
                    <td class="td" style="background:<?php echo $caja->getColor() ?>"></td>
                    <td class="td"><b>Material:</b> <?php echo $caja->getMaterial() ?></td>
                    <td class="td"><b>Contenido:</b> <?php echo $caja->getContenido() ?></td>
                    <td class="td"><b>Fecha de alta: </b><?php echo $caja->getFecha_alta() ?></td>
                </tr>
            </table>
            <p>¿Desea dar salida a esta caja?</p>
            <form action="../Controlador/Controladorconfirmacionsalida.php">
                <input type="submit" name="No" value="No" class="btns" />
                <input type="submit" name="Si" value="Si" class="btns" />
            </form>
        </section>
        <footer class="secondary_header footer">
            <div class="subtitle">&copy;2017-2018 - <strong>Desarrollo de Aplicaciones en Entorno Servidor.</strong></div>
            <a href="../Index.php">Volver al Index.</a> 
        </footer>
    </body>
</html>