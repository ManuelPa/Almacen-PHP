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
        //Comprobamos que la variable de estanterias esta creada, si no enviaremos al usuario al controlador para obtenerlas.
        //Comprobamos que la variable sesion esta creada, por lo tanto el usuario ha iniciado la sesion.
        //Incluimos tambien las clases de nuestros objetos.
        include_once '../Modelo/estanteria.php';
        session_start();
        if (!isset($_SESSION['estanterias'])) {
            header('Location: ../Controlador/Listarestanteria.php');
        }
        $estanterias = $_SESSION['estanterias'];
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
            <h2 class="titulovista">Listado de estanterias:</h2>
            <br>
            <table class="table">
                <tr bgcolor=#F38000>
                    <td class="td">Estanteria número:</td>
                    <td class="td">Codigo:</td>
                    <td class="td">Numero de lejas:</td>
                    <td class="td">Lejas ocupadas:</td>
                    <td class="td">Número:</td>
                    <td class="td">Pasillo:</td>
                    <td class="td">Material:</td>                                           
                </tr>
                <?php
                $i = 1;
                foreach ($estanterias as $estanteria) {
                    ?>
                    <tr bgcolor='#F3F781'>
                        <td class="td"><?php echo $i ?></td>
                        <td class="td"><?php echo $estanteria->getCodigo() ?></td>
                        <td class="td"><?php echo $estanteria->getNlejas() ?></td>
                        <td class="td"><?php echo $estanteria->getLejasocupadas() ?></td>
                        <td class="td"><?php echo $estanteria->getNumero() ?></td>
                        <td class="td"><?php echo $estanteria->getPasillo() ?></td>
                        <td class="td"><?php echo $estanteria->getMaterial() ?></td>                                           
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
