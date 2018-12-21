<?php

if (isset($_REQUEST['crearcaja'])) {
    header('Location: ../Vista/Altacaja.php');
} else if (isset($_REQUEST['listarcaja'])) {
    header('Location: Listarcaja.php');
}else if (isset($_REQUEST['crearestanteria'])) {
    header('Location: ../Vista/Altaestanteria.php');
} else if (isset($_REQUEST['listar'])) {
    header('Location: Listarestanteria.php');
}else if (isset($_REQUEST['salida'])) {
    header('Location: ../Vista/Salidacaja.php');
} else if (isset($_REQUEST['devolucion'])) {
    header('Location: ../Vista/Devolucioncaja.php');
}else if (isset($_REQUEST['listarinventario'])) {
    header('Location: Listarinventario.php');
}            
    


