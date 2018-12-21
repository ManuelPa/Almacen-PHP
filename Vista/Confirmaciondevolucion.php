<!DOCTYPE html>

<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Almacen de cajas.</title>
        <link href="../css/almacen.css" rel="stylesheet" type="text/css">
        <script type="text/javascript" src="../Js/Javascript.js"></script>
    </head>
    <body>
        <?php
        //Comprobamos que la variable de caja esta creada, si no enviaremos al usuario al controlador devolucioncaja para obtenerla.
        //Comprobamos que la variable de estanterias esta creada, si no enviaremos al usuario al controlador getestanteriad para obtenerlas.
        //Comprobamos que la variable sesion esta creada, por lo tanto el usuario ha iniciado la sesion.
        //Incluimos tambien las clases de nuestros objetos.
        include_once '../Modelo/cajabackup.php';
        include_once '../Modelo/estanteria.php';
        session_start();
        if (!isset($_SESSION['caja'])) {
            header('Location: ../Controlador/Devolucioncaja.php');
        }
        $caja = $_SESSION['caja'];
        if (!isset($_SESSION['estanterias'])) {
            header('Location: ../Controlador/getestanteriad.php');
        }
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
            <h2 class="titulovista">Confirmacion Devolucion de caja:</h2>
            <br>
            <table class="table">
                <tr bgcolor =#F3F781>
                    <td class="td" rowspan="3"><b>Código: </b><?php echo $caja->getCodigo() ?> </td>
                    <td class="td" rowspan="3"><b>Altura: </b><?php echo $caja->getAltura() ?></td>
                    <td class="td" rowspan="3"><b>Anchura: </b><?php echo $caja->getAnchura() ?></td>
                    <td class="td" rowspan="3"><b>Profundidad: </b><?php echo $caja->getProfundidad() ?></td>
                    <td class="td" rowspan="3" style="background:<?php echo $caja->getColor() ?>"></td>
                    <td class="td" rowspan="3"><b>Material:</b> <?php echo $caja->getMaterial() ?></td>
                    <td class="td" rowspan="3"><b>Contenido:</b> <?php echo $caja->getContenido() ?></td>
                    <td class="td" rowspan="3"><b>Fecha de alta: </b><?php echo $caja->getFecha_alta() ?></td>
                    <td class="td"><b>Fecha de baja: </b><?php echo $caja->getFecha_baja() ?></td>
                </tr>
                <tr bgcolor =#F3F781>
                    <td class="td"><b>Codigo de la estanteria: </b><?php echo $caja->getCodigo_est() ?></td>
                </tr>
                <tr bgcolor =#F3F781>
                    <td class="td"><b>Número de la leja: </b><?php echo $caja->getPosicionleja() ?></td>
                </tr>
            </table>
            <p>¿Desea devolver esta caja?</p>
            <form action="../Controlador/Controladorconfirmaciondevolucion.php">
                <input type="submit" name="No" value="No" class="btns" />
                <input type="submit" name="Si" value="Si" class="btns" />
                <table class="table">
                    <tr>
                        <td class="td">Estantería: </td>
                        <td class="td"> 
                            <select name="Posicion" onchange="muestranumero(this.value)" style="width: 150px;">
                                <?php
                                //Muestranumero contiene la funcion ajax con el que obtenemos las estanterias con lejas disponibles.
                                $estanterias = $_SESSION['estanterias'];
                                //Obtendremos las estanterias con lejas libres
                                //Si nuesta variable de sesion estanterias contiene algo, creamos un bucle for con el que mostraremos el pasillo y el numero de las estanterias de la base de datos, si no diremos que no se han podido mostrar las estanterias. 
                                ?><option value='-1' >Estanterias.</option><?php
                                if ($estanterias != null) {
                                    foreach ($estanterias as $value) {
                                        ?>
                                        <option value="<?php echo $value->getId() ?>" > <?php echo "Número: " . $value->getNumero() . " Pasillo: " . $value->getPasillo() ?></option>
                                        <?php
                                    }
                                } else {
                                    ?>
                                    <option value='-1' >No se han podido mostrar las estanterias.</option>
                                    <?php
                                }
                                ?>
                            </select> 
                        </td>
                        <td class="td">Leja: </td>
                        <td class="td"> 
                            <select name="Leja" id="numeroest"  style="width: 150px;">
                                <option value='-1' >Lejas.</option>
                            </select> 
                        </td>
                    </tr>
                </table>
            </form>
        </section>
        <footer class="secondary_header footer">
            <div class="subtitle">&copy;2017-2018 - <strong>Desarrollo de Aplicaciones en Entorno Servidor.</strong></div>
            <a href="../Index.php">Volver al Index.</a> 
        </footer>
    </body>
</html>