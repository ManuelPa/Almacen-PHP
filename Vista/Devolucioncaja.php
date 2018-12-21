<!DOCTYPE html>

<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Almacen de cajas.</title>
        <link href="../css/almacen.css" rel="stylesheet" type="text/css">
    </head>
     <?php
     //Comprobamos que la variable de caja esta creada, si no enviaremos al usuario al controlador devolucioncaja para obtenerla.
        session_start();
        if (!isset($_SESSION['sesion'])) {
            header('Location: Login.php');
        }
        ?>
    <body>
        <header>
            <div class="primary_header">
                <a href="../Index.php"><h1 class="title">Almacén Koala S.L.</h1></a> 
            </div>
        </header>
        <section class="section">
            <h2 class="titulovista">Devolucion de cajas:</h2>
            <br>
            <p>Deberá introducir el codigo de la caja que desea devolver.</p>
            <form action="../Controlador/Controladordevolucioncaja.php">
                <input type="text" name="codigo" style="width: 200px; margin-left: 30%;" required="required" placeholder="Ej: C1">
                <input type="submit" name="Devolver caja" value="Devolver caja" class="btn" />
            </form>
        </section>
        <footer class="secondary_header footer">
            <div class="subtitle">&copy;2017-2018 - <strong>Desarrollo de Aplicaciones en Entorno Servidor.</strong></div>
            <a href="../Index.php">Volver al Index.</a> 
        </footer>
    </body>
</html>
