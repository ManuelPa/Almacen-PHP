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
        //Comprobamos que la variable de inventario esta creada, si no enviaremos al usuario al controlador para obtenerlas.
        //Comprobamos que la variable sesion esta creada, por lo tanto el usuario ha iniciado la sesion.
        //Incluimos tambien las clases de nuestros objetos.
        include_once '../Modelo/estanteriacaja.php';
        include_once '../Modelo/cajaposicion.php';
        include_once '../Modelo/inventario.php';
        session_start();
        if (!isset($_SESSION['inventario'])) {
            header('Location: ../Controlador/Listarinventario.php');
        }
        $inventario = $_SESSION['inventario'];
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
            <h2 class="titulovista">Inventario día: <?php echo $inventario->getFecha() ?></h2>
            <br>
            <table class="table">
                <?php
                $estanterias = $inventario->getEstanteriacaja();
                //Imprimiremos la estanteria
                foreach ($estanterias as $estanteria) {
                    ?>
                    <tr bgcolor =#F38000>
                        <td class="td"><b>Código: <?php echo $estanteria->getCodigo() ?> </b></td>
                        <td class="td" colspan='2'><b>Número de lejas: <?php echo $estanteria->getNlejas() ?></b></td>
                        <td class="td" colspan='2'><b>Lejas Ocupadas: <?php echo $estanteria->getLejasocupadas() ?></b></td>
                        <td class="td" colspan="2"><b>Material: <?php echo $estanteria->getMaterial() ?></b></td>
                        <td class="td" colspan='2'><b>Pasillo-Número: <?php echo $estanteria->getPasillo() . '-' . $estanteria->getNumero() ?></b></td>
                    </tr>
                    <?php
                    //Ahora que tenemos la estanteria mostrada, seguiremos mostrando las cajas para mantener el orden del array inventario.
                    $cajas = $estanteria->getCajaposicion();
                    foreach ($cajas as $caja) {
                        ?>
                        <tr bgcolor =#F3F781>
                            <td class="td"><b>Código: </b><?php echo $caja->getCodigo() ?> </td>
                            <td class="td"><b>Ocupacion: </b><?php echo $caja->getLeja() ?></td>
                            <td class="td"><b>Altura: </b><?php echo $caja->getAltura() ?></td>
                            <td class="td"><b>Anchura: </b><?php echo $caja->getAnchura() ?></td>
                            <td class="td"><b>Profundidad: </b><?php echo $caja->getProfundidad() ?></td>
                            <td class="td" style="background:<?php echo $caja->getColor() ?>"></td>
                            <td class="td"><b>Material:</b> <?php echo $caja->getMaterial() ?></td>
                            <td class="td"><b>Contenido:</b> <?php echo $caja->getContenido() ?></td>
                            <td class="td"><b>Fecha de alta: </b><?php echo $caja->getFecha_alta() ?></td>
                        </tr>
                        <?php
                    }
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
