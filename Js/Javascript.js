function muestraopciones(tipo) {
    if (tipo == "caja") {
        document.getElementById("crearcaja").style.display = "block";
        document.getElementById("listarcaja").style.display = "block";
        
        document.getElementById("crearestanteria").style.display = "none";
        document.getElementById("listarestanteria").style.display = "none";
        document.getElementById("salida").style.display = "none";
        document.getElementById("devolucion").style.display = "none";
        document.getElementById("listacaja").style.display = "none";
    } else if (tipo == "estanteria") {
        document.getElementById("crearestanteria").style.display = "block";
        document.getElementById("listarestanteria").style.display = "block";
        
        document.getElementById("crearcaja").style.display = "none";   
        document.getElementById("listarcaja").style.display = "none";
        document.getElementById("salida").style.display = "none";
        document.getElementById("devolucion").style.display = "none";
        document.getElementById("listacaja").style.display = "none";
    } else if (tipo == "gestion") {
        document.getElementById("salida").style.display = "block";
        document.getElementById("devolucion").style.display = "block";
        document.getElementById("listacaja").style.display = "block";
        
        document.getElementById("crearcaja").style.display = "none";   
        document.getElementById("listarcaja").style.display = "none";
        document.getElementById("crearestanteria").style.display = "none";
        document.getElementById("listarestanteria").style.display = "none";
    }
}
function muestranumero(str) {
    var xmlhttp;
    if (str == "") {
        document.getElementById("numeroest").innerHTML = "gweg";
        return;
    }
    /*Asumiendo que el select de la estación destino se llama Lista_Destino, si la cadena de Lista_Origen es vacía, también lo será Lista_Destino
     */
    if (window.XMLHttpRequest) {// code for IE7+, Firefox, Chrome, Opera, Safari
        xmlhttp = new XMLHttpRequest();
        /* Creamos el objeto request para conexiones http,
         compatible con los navegadores descritos*/
    } else {// code for IE6, IE5
        xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
        /*Como el explorer va por su cuenta, el objeto es un ActiveX */
    }
    xmlhttp.onreadystatechange = function () {
        if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
            document.getElementById("numeroest").innerHTML = xmlhttp.responseText;
            /*Seleccionamos el elemento que recibirá el flujo de datos*/
        }
    }
    xmlhttp.open("GET", "../Controlador/getlejas.php?idestanteria=" + str, true);
    /*Mandamos al PHP encargado de traer los datos, el valor de referencia */
    xmlhttp.send();
}

