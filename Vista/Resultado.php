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
        <header>
            <div class="primary_header">
                <a href="../Index.php"><h1 class="title">Almacén Koala S.L.</h1></a> 
            </div>
        </header>
        <section class="section">
            <?php
            //Hacemos session_start() para recibir el mensaje de respuesta y mostrarlo.
            session_start();
            ?>
            <p class="subtitle"> <?php echo $_SESSION['mensaje'] ?></p>
        </section>
        <footer class="secondary_header footer">
            <div class="subtitle">&copy;2017-2018 - <strong>Desarrollo de Aplicaciones en Entorno Servidor.</strong></div>
            <a href="../Index.php">Volver al Index.</a> 
        </footer>
    </body>
</html>
