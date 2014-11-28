<?php
include("../sources/funciones.php");
/**
 * Autor: José Manuel Nieto Gómez
 * Fecha de Creación: 2 de Noviembre de 2014
 * Objetivo: Sección gratuitos 
 */
if (!isset($_SESSION["usuario"])) {
    exit("<script>parent.location.reload();</script>");
}
?>
<!DOCTYPE html>
<html lang="en-US">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <meta charset="UTF-8">
        <title>Storyline Slider</title>
        <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
        <link href='http://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,400,600,700,300' rel='stylesheet' type='text/css'>
        <link rel="stylesheet" id="fontawesome-css" href="css/font-awesome/css/font-awesome.css" type="text/css" media="all">
        <link rel="stylesheet" id="prettyPhoto-css" href="css/prettyPhoto.css" type="text/css" media="all">
        <link rel="stylesheet" id="flexslider-css" href="css/flexslider.css" type="text/css" media="screen">
        <link rel="stylesheet" id="mainstyle-css" href="css/style.css" type="text/css" media="all">

        <!-- START AUDIO SUPPORT ( comment or delete this if you not going to use audio -->
        <!--<link rel="stylesheet" type="text/css" href="js/audioplayer/360player.css" />
            <link rel="stylesheet" type="text/css" href="js/audioplayer/360player-visualization.css" />-->
        <!-- END AUDIO SUPPORT -->

        <!--Fancybox-->
        <link rel="stylesheet" type="text/css" href="js/fancybox/jquery.fancybox.min.css?v=2.1.5" media="screen" />
        <!--Fancybox-->


    </head>
    <body>
        <!-- SLIDER BACKGROUND -->
        <div id="site-background"></div>
        <!-- START SLIDER HOLDER -->
        <div id="ss-holder" class="ss-holder">
            <div id="effects"><!-- script will add automatically the scroll effect class here -->
                <article id="articlehold">
                    <!-- START SLIDE -->
                    <?php consultaLibrosGratuitos($_SESSION["usuario"]->id_nivel_educativo, "imprime") ?>
                    <!-- END SLIDE -->                    
                </article>
                <!-- START NAVIGATION ARROWS -->
                <div class="ss-nav-arrows-next">
                    <i id="next-arrow" class="icon-angle-right "></i>
                </div>
                <div class="ss-nav-arrows-prev" style="">
                    <i id="prev-arrow" class="icon-angle-left"></i>
                </div>
                <!-- END NAVIGATION ARROWS -->
            </div>
        </div>
        <!-- END SLIDER HOLDER -->

        <!-- START LOADING BAR -->
        <div class="ss-holder">
            <div class="inifiniteLoader animated fadeOutDown">
                <div class="bar"> <span></span>
                </div>
            </div>
        </div>
        <!-- END LOADING BAR -->
        <script type="text/javascript" src="js/jquery.min.js"></script>
        <script type="text/javascript" src="js/jquery-migrate.min.js"></script>
        <script type="text/javascript" src="js/modernizr.custom.79639.min.js"></script>
        <script type="text/javascript" src="js/jquery.prettyPhoto.min.js"></script>
        <script type="text/javascript" src="js/all-functions.min.js"></script>
        <script type="text/javascript" src="js/classList.min.js"></script>
        <script type="text/javascript" src="js/bespoke.min.js"></script>
        <script type="text/javascript" src="js/jquery.flexslider.min.js"></script>
        <script type="text/javascript" src="js/books1.min.js"></script>

        <script>
            $(function () {
                Books.init();
            });
            jQuery(document).ready(function ($) {
                /* LEGEND
                 scrollinit(); - default with no additional pages.
                 
                 scrollinit('carousel', 1, 0, true, true, true, true, true); - custom settings
                 
                 1. Scroll effect: 'classic', 'cube', 'carousel', 'concave', 'coverflow', 'spiraltop', 'spiralbottom', 'classictilt'.
                 2. Number of scroll pages. '1' means no additional pages.
                 3. Select which slide to be on focus when slider is loaded. '0' means first slide.
                 4. Enable / disable keys navigation: true, false.
                 5. Enable / disable buttons navigation: true, false.
                 6. Enable / disable slide gestures navigation on touch devices: true, false.
                 7. Enable / disable click navigation: true, false.
                 8. Enable / disable mouse wheel navigation: true, false.
                 */

                scrollinit("carousel", 1, 1, true, true, true, true, true);

                $('.fancybox').fancybox({
                    minHeight: "100%"
                });

                //Modificar tamaños
                try {
                    function setSliderSize() {

                        var ratio = pWidth(100) / pHeight(100);
                        var wantedWidth = 50;
                        var wantedHeight = 10;

                        if (ratio > 1) {
                            //Horizontal
                            console.log("Horizontal");
                            height = pHeight(wantedWidth);
                            width = height * 0.75;

                        } else if (ratio < 1) {
                            //Vertical
                            console.log("Vertical");
                            width = pWidth(wantedHeight);
                            height = width * 1.25;
                        } else {
                            width = pWidth(30);
                            height = pHeight(70)
                        }

                        $(".bk-book").css({
                            width: width,
                            height: height
                        });

                        $(".bk-cover").css({
                            width: width,
                            height: height
                        });

                        $(".bk-cover-back").css({
                            width: width,
                            height: height
                        });

                        $(".bk-left").css({
                            height: height,
                        });

                        $(".bk-right").css({
                            height: height
                        });

                        $(".bk-top").css({
                            width: width
                        });

                        $(".bk-bottom").css({
                            width: width
                        });

                        $(".bk-page").css({
                            width: width,
                            height: height - 10
                        });

                        $(".bk-front").css({
                            width: width,
                            height: height
                        });

                        $(".ss-holder section").css({
                            "font-size": width * .05
                        });

                        $(".ss-holder .bk-list li").css({
                            width: width
                        });

                        $(".ss-holder section").css({
                            top: height * 1.2
                        });

//                        $("ul").css({
//                           top: pHeight(8) * ratio
//                        });
                        $(".ss-holder .bk-list").css({
                            "margin-left": ""
                        });

                        $("section").css({
                            width: width,
                            height: height
                        });
                    }
                    setSliderSize();
                    $(window).resize(function (e) {
                        setSliderSize();
                    });
                } catch (e) {
                    console.error(e);
                }

                function windowSize() {
                    var w = window.innerWidth
                            || document.documentElement.clientWidth
                            || document.body.clientWidth;

                    var h = window.innerHeight
                            || document.documentElement.clientHeight
                            || document.body.clientHeight;
                    return {
                        width: w,
                        height: h
                    }
                }

                function pWidth(porcentaje) {
                    return windowSize().width * (porcentaje / 100);
                }

                function pHeight(porcentaje) {
                    return windowSize().height * (porcentaje / 100);
                }

            });
        </script>

        <!--Fancybox-->
        <script type="text/javascript" src="js/fancybox/jquery.fancybox.min.js?v=2.1.5"></script>
        <!--Fancybox-->
    </body>
</html>