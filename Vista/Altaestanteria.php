<!doctype html>
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
        //Comprobamos que la variable sesion esta creada, por lo tanto el usuario ha iniciado la sesion.
        session_start();
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
            <h2 class="titulovista">Alta de estanterias:</h2>
            <br>
            <form name="altaestanteria" action="../Controlador/Controladoraltaestanteria.php">
                <table class="table">
                    <tr>
                        <td class="td">Codigo: </td>
                        <td class="td"><input type="text" name="codigo" style="width: 50px;" required="required" placeholder="Ej: E1"></td>
                    </tr>
                    <tr>
                        <td class="td">Numero de lejas:</td>
                        <td class="td"><input type="number" name="nlejas" style="width: 50px;" required="required"></td>
                    </tr>
                    <tr>
                        <td class="td">Letra de pasillo: </td>
                        <td class="td"><input type="text" name="lpasillo" style="width: 50px;" required="required"></td>
                    </tr>
                    <tr>
                        <td class="td">Numero de estanteria: </td>
                        <td class="td"><input type="number" name="nestateria" style="width: 50px;" required="required"></td>
                    </tr>
                    <tr>
                        <td class="td">Material: </td>
                        <td class="td"><input type="text" name="material" style="width: 50px;" required="required"></td>
                    </tr>
                    <tr>
                        <td colspan="2" class="td"><input type="submit" name="CrearEstanteria" value="Crear estanteria" class="btn" /></td>
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