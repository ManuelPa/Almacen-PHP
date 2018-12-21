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
        <header>
            <div class="primary_header">
                <h1 class="title">Almacén Koala S.L.</h1>
            </div>
        </header>
        <section class="section">
            <h2 class="titulovista">Inicio de Sesión:</h2>
            <br>
            <form action="../Controlador/Controladorlogin.php">
                <table class="table">
                    <tr bgcolor=#F38000>
                        <td class="td" colspan="2"><input type="text" name="usuario" style="width: 200px;" required="required" placeholder="Usuario"></td> 
                    </tr>
                    <tr bgcolor=#F38000>
                        <td class="td" colspan="2"><input type="password" name="contra" style="width: 200px;" required="required" placeholder="Contraseña"></td>
                    </tr>
                    <tr bgcolor=#F38000>
                        <td class="td"><input type="submit" name="Iusuario" value="Iniciar Usuario" class="btn" /></td>
                        <td class="td"><input type="submit" name="Rusuario" value="Registar Usuario" class="btn" /></td>
                    </tr>
                </table>
            </form>
        </section>
        <footer class="secondary_header footer">
            <div class="subtitle">&copy;2017-2018 - <strong>Desarrollo de Aplicaciones en Entorno Servidor.</strong></div>
        </footer>
    </body>
    <?php
    session_start();
    if (isset($_SESSION['mensaje'])) {
        if ($_SESSION['mensaje'] == "Noi") {
            ?>
            <script type="text/javascript">
                alert("Error en la contraseña o el usuario.");
            </script>
            <?php
        } else if ($_SESSION['mensaje'] == "Nor") {
            ?>
            <script type="text/javascript">
                alert("Ya hay registrado un usuario.");
            </script>
            <?php
        }
    }
    session_destroy();
    ?>
</html>