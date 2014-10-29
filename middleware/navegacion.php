<?php
if (isset($_SESSION["usuario"])) {
    header("Location:index.php");
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
    </head>
    <body>
        <section class="ccblue top">	
            <div class="mainmenu">
                <ul>
                    <li><i class="icon-home icon-large"></i>&nbsp;<main>Destacados</main><span>los m&aacute;s buscados</span></li>
                    <li><i class="icon-archive icon-large"></i>&nbsp;<main>Gratuitos</main><span>te ofrecemos</span></li>
                    <li><i class="icon-book icon-large"></i>&nbsp;<main>Estante</main><span>tus libros</span></li>
                    <li><i class="icon-search icon-large"></i>&nbsp;<main>Busqueda</main><span>our work</span></li>
                    <li><i class="icon-comments icon-large"></i>&nbsp;<main>Blog</main><span>Just Share</span></li>
                    <li><i class="icon-tint icon-large"></i>&nbsp;<main>Contact</main><span>How to reach</span></li>
                </ul>
            </div>
        </section>
        <div id="contenedor">
            <iframe frameBorder="0" width="100%" height="90%" src="book-style.php"></iframe>
        </div>

    </body>
</html>
