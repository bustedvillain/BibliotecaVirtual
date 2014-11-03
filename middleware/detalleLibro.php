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
        if($libro->tipo_libro == 0){
            $leerComprar = "Leer";
        }else{
            $leerComprar = "Comprar";
        }
        if ($libro) {
            foreach ($libro as $l) {
                ?>
                <!DOCTYPE html>
                <html>
                    <head>
                        <meta charset="UTF-8">
                        <title>Detalle de Libro</title>
                        <link href="css/detalleLibro.css" rel="stylesheet"/>
                    </head>
                    <body>
                        <div class="portada">
                            <img class="img img-rounded" src="<?= $l->imagen; ?>"/>
                            <div class="seccion centrado">
                                <span class="rating">Tu valoraci&oacute;n: </span>
                                <div class="rating">
                                    <input type="radio" name="rating" value="0" checked /><span id="hide"></span>
                                    <input type="radio" name="rating" value="1" /><span></span>
                                    <input type="radio" name="rating" value="2" /><span></span>
                                    <input type="radio" name="rating" value="3" /><span></span>
                                    <input type="radio" name="rating" value="4" /><span></span>
                                    <input type="radio" name="rating" value="5" /><span></span>
                                </div>
                            </div>
                        </div>
                        <div class="descripcion">
                            <p class="seccion"><?= $l->descripcion; ?></p>
                            <p class="seccion"><b>Autor:</b> <?= $l->nombre_autor; ?></p>
                            <p class="seccion"><b>A&ntilde;o:</b> <?= $l->anio; ?></p>
                            <p class="seccion"><b>Editorial:</b> <?= $l->nombre_editorial; ?></p>
                            <p class="seccion"><b>Clasificaci&oacute;n:</b> <?= $l->nombre_clase; ?></p>
                            <p class="botones">
                                <button class="myButton" id="agregarEstante" id_usuario="<?=$_SESSION["usuario"]->id_usuario;?>" id_libro="<?=$_GET["id_libro"];?>">Agregar a mi estante</button>
                                <a class="myButton" target="top" href="<?= $l->url_archivo; ?>"><?= $leerComprar; ?></a>
                            </p>
                        </div>

                        <!--Javascript-->
                        <script type="text/javascript" src="js/jquery.min.js"></script>
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


