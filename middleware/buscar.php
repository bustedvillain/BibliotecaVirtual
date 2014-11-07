<?php
include("../sources/funciones.php");
/**
 * Autor: José Manuel Nieto Gómez
 * Fecha de Creación: 4 de Noviembre de 2014
 * Objetivo: Script que realiza busquedas de libros
 */
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
        <link href="css/busqueda.css" rel="stylesheet"/>
        <link href="../css/style.css" rel="stylesheet"/>

        <!--Fancybox-->
        <link rel="stylesheet" type="text/css" href="js/fancybox/jquery.fancybox.min.css?v=2.1.5" media="screen" />
        <!--Fancybox-->
    </head>
    <body>
        <h1>Busqueda</h1>
        <form id="searchbox">
            <input id="search" type="text" placeholder="¿Qué buscas?: ¿Autor, Libro, Categoría, Editorial, Año de publicación?...">
            <input id="submit" type="submit" value="Buscar">
        </form>
        <div id="resultados">
            <table class="zebra">
                <thead>
                    <tr>
                        <th>#</th>        
                        <th>Portada</th>
                        <th>Nombre</th>
                        <th>Autor</th>
                        <th>Editorial</th>
                        <th>Clasificación</th>
                        <th>Año</th>
                        <th>Tipo de Libro</th>
                    </tr>
                </thead>
                <tfoot>
                    <tr>
                        <th>#</th>        
                        <th>Portada</th>
                        <th>Nombre</th>
                        <th>Autor</th>
                        <th>Editorial</th>
                        <th>Clasificación</th>
                        <th>Año</th>
                        <th>Tipo de Libro</th>
                    </tr>
                </tfoot>    
                <tbody>

                </tbody>
            </table>
        </div>
        <script type="text/javascript" src="js/jquery.min.js"></script>
        <script type="text/javascript" src="js/busqueda.js"></script>
        <!--Fancybox-->
        <script type="text/javascript" src="js/fancybox/jquery.fancybox.min.js?v=2.1.5"></script>
        <!--Fancybox-->
    </body>
</html>
