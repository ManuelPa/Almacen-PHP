<!doctype html>
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
        //Comprobamos que la variable de estanteria esta creada, si no enviaremos al usuario al controlador getestanteria para obtenerlas.
        //Comprobamos que la variable sesion esta creada, por lo tanto el usuario ha iniciado la sesion.
        include_once '../Modelo/estanteria.php';
        session_start();
        if (!isset($_SESSION['estanterias'])) {
            header('Location: ../Controlador/getestanteria.php');
        }
        $estanterias = $_SESSION['estanterias'];
        //Obtendremos las estanterias con lejas libres
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
            <h2 class="titulovista">Alta de cajas:</h2>
            <br>
            <form name="altaestanteria" action="../Controlador/Controladoraltacaja.php">
                <table class="table">
                    <tr>
                        <td class="td" colspan="2">Codigo: </td>
                        <td class="td" colspan="4"><input type="text" name="codigo" style="width: 200px;" required="required" placeholder="Ej: C1"></td>
                    </tr>
                    <tr>
                        <td class="td">Altura:</td>
                        <td class="td"><input type="number" name="altura" style="width: 50px;" required="required" placeholder="Cm."></td>
                        <td class="td">Anchura:</td>
                        <td class="td"><input type="number" name="anchura" style="width: 50px;" required="required" placeholder="Cm."></td>
                        <td class="td">Profundidad:</td>
                        <td class="td"><input type="number" name="profundidad" style="width: 50px;" required="required" placeholder="Cm."></td>
                    </tr>
                    <tr>
                        <td class="td" colspan="2">Color: </td>
                        <td class="td" colspan="4"><input type="color" name="color" style="width: 200px;" required="required"></td>
                    </tr>
                    <tr>
                        <td class="td" colspan="2">Contenido: </td>
                        <td class="td" colspan="4"><input type="text" name="contenido" style="width: 300px;" required="required" placeholder="Descripcion de la caja."></td>

                    </tr>
                    <tr>
                        <td class="td" colspan="3">Material: </td>
                        <td class="td" colspan="3"><input type="text" name="material" style="width: 150px;" required="required" placeholder="Material de la caja."></td>
                    </tr>
                    <tr>
                        <td class="td" colspan="2">Estantería: </td>
                        <td class="td"> 
                            <select name="Posicion" onchange="muestranumero(this.value)" style="width: 150px;">
                                <?php
                                //Muestranumero contiene la funcion ajax con el que obtenemos las estanterias con lejas disponibles.
                                ?><option value='-1' >Estanterias.</option><?php
                                //Si nuesta variable de sesion estanterias contiene algo, creamos un bucle for con el que mostraremos el pasillo y el numero de las estanterias de la base de datos, si no diremos que no se han podido mostrar las estanterias.
                                if ($estanterias != null) {
                                    foreach ($estanterias as $value) {
                                        ?>
                                        <option value=<?php echo $value->getId() ?> > <?php echo "Número: " . $value->getNumero() . " Pasillo: " . $value->getPasillo() ?></option>
                                        <?php
                                    }
                                } else {
                                    ?>
                                    <option value='null' >No se han podido mostrar las estanterias.</option>
                                    <?php
                                }
                                ?>
                            </select> 
                        </td>
                        <td class="td" colspan="2">Leja: </td>
                        <td class="td"> 
                            <select id="numeroest" name="leja" style="width: 150px;">
                                <option value='-1' >Lejas.</option>
                            </select> 
                        </td>
                    </tr>
                    <tr>
                        <td colspan="6" class="td"><input type="submit" name="CrearEstanteria" value="Crear caja" class="btn" /></td>
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