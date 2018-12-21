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
        //Comprobamos que la variable de cajas esta creada, si no enviaremos al usuario al controlador para obtenerla.
        //Comprobamos que la variable sesion esta creada, por lo tanto el usuario ha iniciado la sesion.
        //Incluimos tambien las clases de nuestros objetos.
        include_once '../Modelo/caja.php';
        session_start();
        if (!isset($_SESSION['cajas'])) {
            header('Location: ../Controlador/Listarcaja.php');
        }
        $cajas = $_SESSION['cajas'];
        if (!isset($_SESSION['sesion'])) {
            header('Location:/Login.php');
        }
        ?>
        <header>
            <div class="primary_header">
                <a href="../Index.php"><h1 class="title">Almacén Koala S.L.</h1></a> 
            </div>
        </header>
        <section class="section">
            <h2 class="titulovista">Listado de cajas:</h2>
            <br>
            <table class="table">
                <tr bgcolor=#F38000>
                    <td class="td">Caja número:</td>
                    <td class="td">Codigo:</td>
                    <td class="td">Altura:</td>
                    <td class="td">Anchura:</td>
                    <td class="td">Profundidad:</td>
                    <td class="td">Color:</td>
                    <td class="td">Material:</td>     
                    <td class="td">Contenido:</td>            
                    <td class="td">Fecha de Alta:</td>            
                </tr>
                <?php
                $i = 1;
                foreach ($cajas as $caja) {
                    ?>
                    <tr bgcolor='#F3F781'>
                        <td class="td"><?php echo $i ?></td>
                        <td class="td"><?php echo $caja->getCodigo() ?></td>
                        <td class="td"><?php echo $caja->getAltura() ?></td>
                        <td class="td"><?php echo $caja->getAnchura() ?></td>
                        <td class="td"><?php echo $caja->getProfundidad() ?></td>
                        <td class="td" style='background:<?php echo $caja->getColor() ?>'></td>
                        <td class="td"><?php echo $caja->getMaterial() ?></td> 
                        <td class="td"><?php echo $caja->getContenido() ?></td> 
                        <td class="td"><?php echo $caja->getFecha_alta() ?></td> 
                    </tr>
                    <?php
                    $i++;
                }
                ?>
            </table>
        </section>
        <footer class="secondary_header footer">
            <div class="subtitle">&copy;2017-2018 - <strong>Desarrollo de Aplicaciones en Entorno Servidor.</strong></div>
            <a href="../Index.php">Volver al Index.</a> 
        </footer>
    </body>
</html>