<?php
include("../sources/funciones.php");
/*
 * Autor: José Manuel Nieto Gomez
 * Fecha de Creación. 2 de Noviembre de 2014
 * Objetivo: Sección de Estante, para mostrar los libros relacionados al usuario
 */
if (!isset($_SESSION["usuario"])) {
    exit("<script>parent.location.reload();</script>");
}
?>
<!DOCTYPE html>
<html>
    <head>
        <title>Estante</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link href="css/estante.css" rel="stylesheet">

        <!--3D BookShelf-->
        <link rel="stylesheet" type="text/css" href="js/3DBookShelf/css/default.css" />
        <link rel="stylesheet" type="text/css" href="js/3DBookShelf/css/component.css" />
        <script src="js/3DBookShelf/js/modernizr.custom.js"></script>
        <!--3D BookShelf-->

        <!--Fancybox-->
        <link rel="stylesheet" type="text/css" href="js/fancybox/jquery.fancybox.min.css?v=2.1.5" media="screen" />
        <!--Fancybox-->
    </head>
    <body>
        <h1>Mi Estante</h1>
        <?php mostrarEstante($_SESSION["usuario"]->id_usuario); ?>

        <!--        <ul id="bk-list" class="bk-list">
                    <li>
                        <div class="bk-book book-1 bk-bookdefault">
                            <div class="bk-front">
                                <div class="bk-cover" style="background-image: url(js/3DBookShelf/images/1.png);">
                                    <h2>
                                        <span>Anthony Burghiss</span>
                                        <span>A Catwork Orange</span>
                                    </h2>
                                </div>
                                <div class="bk-cover-back"></div>
                            </div>
                            <div class="bk-right"></div>
                            <div class="bk-left" style="background-image: url(js/3DBookShelf/images/1.png); background-size: 100% 100%;">
                                <h2>
                                    <span>Anthony Burghiss</span>
                                    <span>A Catwork Orange</span>
                                </h2>
                            </div>
                            <div class="bk-top"></div>
                            <div class="bk-bottom"></div>
                        </div>
        
                    </li>
                    <li>
                        <div class="bk-book book-1 bk-bookdefault">
                            <div class="bk-front">
                                <div class="bk-cover" style="background-image: url(js/3DBookShelf/images/1.png);">
                                    <h2>
                                        <span>Anthony Burghiss</span>
                                        <span>A Catwork Orange</span>
                                    </h2>
                                </div>
                                <div class="bk-cover-back"></div>
                            </div>
                            <div class="bk-right"></div>
                            <div class="bk-left" style="background-image: url(js/3DBookShelf/images/1.png); background-size: 100% 100%;">
                                <h2>
                                    <span>Anthony Burghiss</span>
                                    <span>A Catwork Orange</span>
                                </h2>
                            </div>
                            <div class="bk-top"></div>
                            <div class="bk-bottom"></div>
                        </div>
        
                    </li>
                    <li>
                        <div class="bk-book book-1 bk-bookdefault">
                            <div class="bk-front">
                                <div class="bk-cover" style="background-image: url(js/3DBookShelf/images/1.png);">
                                    <h2>
                                        <span>Anthony Burghiss</span>
                                        <span>A Catwork Orange</span>
                                    </h2>
                                </div>
                                <div class="bk-cover-back"></div>
                            </div>
                            <div class="bk-right"></div>
                            <div class="bk-left" style="background-image: url(js/3DBookShelf/images/1.png); background-size: 100% 100%;">
                                <h2>
                                    <span>Anthony Burghiss</span>
                                    <span>A Catwork Orange</span>
                                </h2>
                            </div>
                            <div class="bk-top"></div>
                            <div class="bk-bottom"></div>
                        </div>
        
                    </li>
                
              
                <li>
                    <div class="bk-book book-1 bk-bookdefault">
                        <div class="bk-front">
                            <div class="bk-cover" style="background-image: url(js/3DBookShelf/images/1.png);">
                                <h2>
                                    <span>Anthony Burghiss</span>
                                    <span>A Catwork Orange</span>
                                </h2>
                            </div>
                            <div class="bk-cover-back"></div>
                        </div>
                        <div class="bk-right"></div>
                        <div class="bk-left" style="background-image: url(js/3DBookShelf/images/1.png); background-size: 100% 100%;">
                            <h2>
                                <span>Anthony Burghiss</span>
                                <span>A Catwork Orange</span>
                            </h2>
                        </div>
                        <div class="bk-top"></div>
                        <div class="bk-bottom"></div>
                    </div>
        
                </li>
                <li>
                    <div class="bk-book book-1 bk-bookdefault">
                        <div class="bk-front">
                            <div class="bk-cover" style="background-image: url(js/3DBookShelf/images/1.png);">
                                <h2>
                                    <span>Anthony Burghiss</span>
                                    <span>A Catwork Orange</span>
                                </h2>
                            </div>
                            <div class="bk-cover-back"></div>
                        </div>
                        <div class="bk-right"></div>
                        <div class="bk-left" style="background-image: url(js/3DBookShelf/images/1.png); background-size: 100% 100%;">
                            <h2>
                                <span>Anthony Burghiss</span>
                                <span>A Catwork Orange</span>
                            </h2>
                        </div>
                        <div class="bk-top"></div>
                        <div class="bk-bottom"></div>
                    </div>
        
                </li>
                <li>
                    <div class="bk-book book-1 bk-bookdefault">
                        <div class="bk-front">
                            <div class="bk-cover" style="background-image: url(js/3DBookShelf/images/1.png);">
                                <h2>
                                    <span>Anthony Burghiss</span>
                                    <span>A Catwork Orange</span>
                                </h2>
                            </div>
                            <div class="bk-cover-back"></div>
                        </div>
                        <div class="bk-right"></div>
                        <div class="bk-left" style="background-image: url(js/3DBookShelf/images/1.png); background-size: 100% 100%;">
                            <h2>
                                <span>Anthony Burghiss</span>
                                <span>A Catwork Orange</span>
                            </h2>
                        </div>
                        <div class="bk-top"></div>
                        <div class="bk-bottom"></div>
                    </div>
        
                </li>
                <li>
                    <div class="bk-book book-1 bk-bookdefault">
                        <div class="bk-front">
                            <div class="bk-cover" style="background-image: url(js/3DBookShelf/images/1.png);">
                                <h2>
                                    <span>Anthony Burghiss</span>
                                    <span>A Catwork Orange</span>
                                </h2>
                            </div>
                            <div class="bk-cover-back"></div>
                        </div>
                        <div class="bk-right"></div>
                        <div class="bk-left" style="background-image: url(js/3DBookShelf/images/1.png); background-size: 100% 100%;">
                            <h2>
                                <span>Anthony Burghiss</span>
                                <span>A Catwork Orange</span>
                            </h2>
                        </div>
                        <div class="bk-top"></div>
                        <div class="bk-bottom"></div>
                    </div>
        
                </li>
            </ul>
        
            <div class="shelf">       
                <div class="bookend_left"></div>   
                <div class="bookend_right"></div>
                <div class="reflection"></div>
            </div>
            <div class="shelf">       
                <div class="bookend_left"></div>   
                <div class="bookend_right"></div>
                <div class="reflection"></div>
            </div>
        
            <div class="shelf">       
                <div class="bookend_left"></div>   
                <div class="bookend_right"></div>
                <div class="reflection"></div>
            </div>
        
            <div class="shelf">       
                <div class="bookend_left"></div>   
                <div class="bookend_right"></div>
                <div class="reflection"></div>
            </div>-->





        <script src="js/jquery.min.js"></script>
        <script src="js/3DBookShelf/js/books1.js"></script>
        <!--Fancybox-->
        <script type="text/javascript" src="js/fancybox/jquery.fancybox.min.js?v=2.1.5"></script>
        <!--Fancybox-->
        <script>
            $(function () {

                Books.init();
                $('.fancybox').fancybox({
                    minHeight:"100%"                    
                });

            });
        </script>
    </body>
</html>


