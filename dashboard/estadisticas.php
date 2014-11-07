<?php
/**
 * Autor: José Manuel Nieto Gómez
 * Fecha de Creación: 16/10/2014
 * Objetivo: Index de la administración de la biblioteca
 */
include("../sources/funciones.php");
$menu = 9;
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <!--Cabeceras-->
        <?php include("../template/headers.php"); ?>
        <!--Cabeceras-->       

    </head>
    <body>
        <!--Barra superior-->
        <?php include("../template/menu.php"); ?>
        <!--Barra superior-->

        <div class="container-fluid">
            <div class="row">
                <!--Barra lateral-->
                <?php include("../template/sidebar.php"); ?>
                <!--Barra lateral-->

                <div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
                    <h1 class="page-header">Biblioteca Virtual: Estad&iacute;sticas</h1>

                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <h3 class="panel-title">Usuarios por instancia</h3>
                        </div>
                        <div class="panel-body">
                            <div id="estadistica1" style="width: 100%; height: 300px;" class="loader highligth">
                                <span></span>
                                <span></span>
                                <span></span>
                                <h2>Cargando estad&iacute;sticas...</h2>
                            </div>
                        </div>
                    </div>    

                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <h3 class="panel-title">Vistias por instancia</h3>
                        </div>
                        <div class="panel-body">
                            <div id="estadistica2" style="width: 100%; height: 300px;" class="loader highligth">
                                <span></span>
                                <span></span>
                                <span></span>
                                <h2>Cargando estad&iacute;sticas...</h2>
                            </div>
                        </div>
                    </div> 

                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <h3 class="panel-title">Libros por nivel educativo</h3>
                        </div>
                        <div class="panel-body">
                            <div id="estadistica3" style="width: 100%; height: 300px;" class="loader highligth">
                                <span></span>
                                <span></span>
                                <span></span>
                                <h2>Cargando estad&iacute;sticas...</h2>
                            </div>
                        </div>
                    </div> 

                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <h3 class="panel-title">Libros por categor&iacute;a</h3>
                        </div>
                        <div class="panel-body">
                            <div id="estadistica4" style="width: 100%; height: 300px;" class="loader highligth">
                                <span></span>
                                <span></span>
                                <span></span>
                                <h2>Cargando estad&iacute;sticas...</h2>
                            </div>
                        </div>
                    </div> 

                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <h3 class="panel-title">Libros m&aacute;s buscados</h3>                            
                        </div>
                        <div class="panel-body">
                            <div id="estadistica5" style="width: 100%; height: 300px;" class="loader highligth">
                                <span></span>
                                <span></span>
                                <span></span>
                                <h2>Cargando estad&iacute;sticas...</h2>
                            </div>
                        </div>
                    </div> 
                    
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <h3 class="panel-title">Libros m&aacute;s le&iacute;dos</h3>                            
                        </div>
                        <div class="panel-body">
                            <div id="estadistica6" style="width: 100%; height: 300px;" class="loader highligth">
                                <span></span>
                                <span></span>
                                <span></span>
                                <h2>Cargando estad&iacute;sticas...</h2>
                            </div>
                        </div>
                    </div> 
                    
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <h3 class="panel-title">Libros agregados m&aacute;s veces a estante</h3>                            
                        </div>
                        <div class="panel-body">
                            <div id="estadistica7" style="width: 100%; height: 300px;" class="loader highligth">
                                <span></span>
                                <span></span>
                                <span></span>
                                <h2>Cargando estad&iacute;sticas...</h2>
                            </div>
                        </div>
                    </div> 
                    
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <h3 class="panel-title">Libros mejor votados</h3>                            
                        </div>
                        <div class="panel-body">
                            <div id="estadistica8" style="width: 100%; height: 300px;" class="loader highligth">
                                <span></span>
                                <span></span>
                                <span></span>
                                <h2>Cargando estad&iacute;sticas...</h2>
                            </div>
                        </div>
                    </div> 

                </div>
            </div>
        </div>



        <!-- Bootstrap core JavaScript
        ================================================== -->
        <!-- Placed at the end of the document so the pages load faster -->
        <?php include("../template/assets.php"); ?>

        <script src="../libs/amcharts/amcharts.min.js" type="text/javascript"></script>
        <script src="../libs/amcharts/pie.min.js" type="text/javascript"></script>
        <script src="../libs/amcharts/serial.min.js" type="text/javascript"></script>

        <script src="../js/estadisticas.min.js" type="text/javascript"></script>




    </body>
</html>
