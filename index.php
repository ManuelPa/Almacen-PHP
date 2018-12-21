<!doctype html>
<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Almacen de cajas.</title>
        <link href="css/almacen.css" rel="stylesheet" type="text/css">
        <script type="text/javascript" src="Js/Javascript.js"></script>
    </head>
    <body>
        <?php
        session_start();
        if (!isset($_SESSION['sesion'])) {
            header('Location: Vista/Login.php');
        }
        ?>
        <header>
            <div class="primary_header">
                <h1 class="title">Almacén Koala S.L.</h1>
                <form name="controladorindex" action="Vista/Login.php">
                    <input type="submit" value="Cerrar Sesión" class="btnt"/>
                </form>
            </div>
            <nav class="secondary_header" id="menu">
                <form name="controladorindex" action="Controlador/Controladorindex.php">
                    <ul class="mostrarmenu">
                        <li onclick="muestraopciones('caja')"><strong>CAJAS</strong></li>
                        <li><input type="submit" name="crearcaja" value="CREAR CAJA" class="btni" id="crearcaja" style="display: none"/></li>
                        <li><input type="submit" name="listarcaja" value="LISTAR CAJA" class="btni" id="listarcaja" style="display: none"/></li>
                    </ul>
                    <ul class="mostrarmenu">
                        <li onclick="muestraopciones('estanteria')"><strong>ESTANTERÍA</strong></li>
                        <li><input type="submit" name="crearestanteria" value="CREAR ESTANTERÍA" class="btni" id="crearestanteria" style="display: none"/></li>
                        <li><input type="submit" name="listar" value="LISTAR ESTANTERÍA" class="btni" id="listarestanteria" style="display: none"/></li>
                    </ul>
                    <ul class="mostrarmenu">
                        <li onclick="muestraopciones('gestion')"><strong>GESTIÓN</strong></li>
                        <li><input type="submit" name="salida" value="SALIDA" class="btni" id="salida" style="display: none"/></li>
                        <li><input type="submit" name="devolucion" value="DEVOLUCIÓN" class="btni" id="devolucion" style="display: none"/></li>
                        <li><input type="submit" name="listarinventario" value="INVENTARIO" class="btni" id="listacaja" style="display: none"/></li>
                    </ul>
                </form>
            </nav>
        </header>
        <section class="section">
            <p class="subtitle">Administración de un almacén de cajas, para la asignatura de desarrollo de aplicaciones en entrono servidor. Primera Evaluación. PHP</p>
        </section>
        <footer class="secondary_header footer">
            <div class="subtitle">&copy;2017-2018 - <strong>Desarrollo de Aplicaciones en Entorno Servidor.</strong></div>
        </footer>
    </body>
</html>
