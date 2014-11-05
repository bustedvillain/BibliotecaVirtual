<?php
include("../sources/funciones.php");
/*
 * Autor: José Manuel Nieto Gómez
 * Fecha de Creación: 29 de Octubre de 2014
 * Objetivo: Script para mostrar detalle de un libro
 */
if (isset($_SESSION["usuario"])) {
    if (isset($_GET["id_libro"])) {
        $libro = consultaLibros($_GET["id_libro"]);
        $leerComprar = "";
        if ($libro->tipo_libro == 0) {
            $leerComprar = "Leer";
        } else {
            $leerComprar = "Comprar";
        }
        if ($libro) {
            foreach ($libro as $l) {
                $estante = "";
                if (($estante = consultaEstanteLibro($_SESSION["usuario"]->id_usuario, $_GET["id_libro"])) != null) {
                    $estante = "Remover de mi estante";
                } else {
                    $estante = "Agregar a mi estante";
                }
                ?>
                <!DOCTYPE html>
                <html>
                    <head>
                        <meta charset="UTF-8">
                        <title>Detalle de Libro</title>

                        <!--Notificaciones-->
                        <link href="http://fonts.googleapis.com/css?family=Raleway:400,300,700" rel="stylesheet" type="text/css">
                        <link rel="stylesheet" type="text/css" href="../libs/notification/css/normalize.css" />
                        <!--<link rel="stylesheet" type="text/css" href="../libs/notification/css/demo.css" />-->
                        <link rel="stylesheet" type="text/css" href="../libs/notification/css/ns-default.css" />
                        <link rel="stylesheet" type="text/css" href="../libs/notification/css/ns-style-other.css" />
                        <script src="../libs/notification/js/modernizr.custom.js"></script>
                        <!--[if IE]>
                        <script src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script>
                        <![endif]-->
                        <!--Notificaciones-->

                        <link href="css/detalleLibro.css" rel="stylesheet"/>
                        <link href="../css/style.css" rel="stylesheet"/>
                        
                        <?php 
                            if(isset($_GET["live_update"])){
                                if($_GET["live_update"] = "yes"){
                                    echo <<<script
                                        <script>var live_update = true;</script>
script;
                                }
                            }
                        ?>


                    </head>
                    <body>
                        <div class="notification-shape shape-progress" id="notification-shape">
                            <!--<div class="ns-box ns-other ns-effect-loadingcircle ns-type-notice ns-show"><div class="ns-box-inner"><h1>Valoración guardada correctamente</h1></div><span class="ns-close"></span></div>-->
                            <svg width="70px" height="70px"><path d="m35,2.5c17.955803,0 32.5,14.544199 32.5,32.5c0,17.955803 -14.544197,32.5 -32.5,32.5c-17.955803,0 -32.5,-14.544197 -32.5,-32.5c0,-17.955801 14.544197,-32.5 32.5,-32.5z"/></svg>
                        </div>
                        <div class="portada">
                            <img class="img-rounded" src="<?= $l->imagen; ?>"/>                            
                            <div class="seccion centrado">
                                <span class="rating">Tu valoraci&oacute;n: </span>
                                <div class="rating">
                                    <input type="radio" name="rating" value="0" checked /><span id="hide"></span>
                                    <input type="radio" id="val1" name="rating" value="1" /><span></span>
                                    <input type="radio" id="val2" name="rating" value="2" /><span></span>
                                    <input type="radio" id="val3"name="rating" value="3" /><span></span>
                                    <input type="radio" id="val4"name="rating" value="4" /><span></span>
                                    <input type="radio" id="val5" name="rating" value="5" /><span></span>
                                </div>
                                <input type="hidden" name="id_usuario" id="id_usuario" value="<?= $_SESSION["usuario"]->id_usuario; ?>"/>
                                <input type="hidden" name="id_libro" id="id_libro" value="<?= $_GET["id_libro"]; ?>"/>
                            </div>

                        </div>
                        <div class="descripcion">
                            <p class="seccion"><?= $l->descripcion; ?></p>
                            <p class="seccion"><b>Autor:</b> <?= $l->nombre_autor; ?></p>
                            <p class="seccion"><b>A&ntilde;o:</b> <?= $l->anio; ?></p>
                            <p class="seccion"><b>Editorial:</b> <?= $l->nombre_editorial; ?></p>
                            <p class="seccion"><b>Clasificaci&oacute;n:</b> <?= $l->nombre_clase; ?></p>
                            <p class="botones">
                                <button class="myButton" id="agregarEstante" id_usuario="<?= $_SESSION["usuario"]->id_usuario; ?>" id_libro="<?= $_GET["id_libro"]; ?>"><?= $estante; ?></button>
                                <a class="myButton" target="top" href="<?= $l->url_archivo; ?>"><?= $leerComprar; ?></a>
                            </p>
                        </div>                        

                        <!--Javascript-->
                        <script type="text/javascript" src="js/jquery.min.js"></script>
                        <script src="../libs/notification/js/classie.js"></script>
                        <script src="../libs/notification/js/notificationFx.js"></script>
                        <script type="text/javascript" src="js/detalleLibro.js"></script>

                    </body>
                </html>
                <?php
            }
        } else {
            echo "Error, libro no existente";
        }
    } else {
        echo "Error, no se especifico el libro";
    }
} else {
    echo "Error, no hay una sesion activa";
}
?>


