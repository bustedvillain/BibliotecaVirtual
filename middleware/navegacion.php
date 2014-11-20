<?php
include("../sources/funciones.php");
if (!isset($_SESSION["usuario"])) {
    header("Location:error.php?type=8");
}
?>
<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
        <link href="http://netdna.bootstrapcdn.com/font-awesome/3.2.1/css/font-awesome.css" rel="stylesheet">
        <link href="css/navigation.css" rel="stylesheet">
        <link rel="icon" href="../img/ico.ico">
    </head>
    <body>
        <section class="ccblue top">	
            <div class="mainmenu">
                <ul>
                    <li id="destacados" class="active item" onclick="abrir('destacados.php', 0)"><i class="icon-home icon-large"></i>&nbsp;<main>Destacados</main><span>los m&aacute;s buscados</span></li>
                    <li id="gratuitos" class="item" onclick="abrir('gratuitos.php', 1)"><i class="icon-archive icon-large"></i>&nbsp;<main>Gratuitos</main><span>te ofrecemos</span></li>
                    <li id="estante" class="item" onclick="abrir('estante.php', 2)"><i class="icon-book icon-large"></i>&nbsp;<main>Estante</main><span>tus libros</span></li>
                    <li id="buscar" class="item" onclick="abrir('buscar.php', 3)"><i class="icon-search icon-large"></i>&nbsp;<main>B&uacute;squeda</main><span>encuentra</span></li>
                </ul>
            </div>
        </section>
        <div id="contenedor">
            <iframe id="frame" frameBorder="0" width="100%" height="90%" src="destacados.php"></iframe>
        </div>
        <script>
            function abrir(direccion, pos) {
                var frame = document.getElementById("frame");
                frame.src = direccion;
                try {
                    var elements = document.getElementsByClassName("item");
                    for (var i = 0; i < elements.length; i++) {
                        if (i === pos) {
                            elements[i].className = "item active";
                        } else {
                            elements[i].className = "item";
                        }
                    }
                } catch (e) {
                    console.error(e);
                }
            }
        </script>

    </body>
</html>
