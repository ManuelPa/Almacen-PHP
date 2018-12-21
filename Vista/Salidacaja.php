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
            <h2 class="titulovista">Salida de cajas:</h2>
            <br>
            <p>Deberá introducir el codigo de la caja que desea eliminar.</p>
            <form action="../Controlador/Controladorsalidacaja.php"> 
                <input type="text" name="codigo" style="width: 200px; margin-left: 30%;" required="required" placeholder="Ej: C1">
                <input type="submit" name="Borrarcaja" value="Borrar caja" class="btn" />
            </form>
        </section>
        <footer class="secondary_header footer">
            <div class="subtitle">&copy;2017-2018 - <strong>Desarrollo de Aplicaciones en Entorno Servidor.</strong></div>
            <a href="../Index.php">Volver al Index.</a> 
        </footer>
    </body>
</html>
