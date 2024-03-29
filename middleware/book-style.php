<?php include("../sources/funciones.php")?>
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
                    <section>
                        <ul id="bk-list" class="bk-list clearfix belizehole">
                            <li>
                                <div class="bk-book book-1 bk-bookdefault bk-bookview">
                                    <div class="bk-front">
                                        <div class="bk-cover" style="background-image: url(images/proto/1.jpg); background-size: 100% 100%;">
                                            <h2>
                                                <span>La Biblia</span>
                                                <span>Dios</span>
                                            </h2>
                                        </div>
                                        <div class="bk-cover-back"></div>
                                    </div>
                                    <div class="bk-page">
                                        <div class="bk-content bk-content-current">
                                            El universo elegante es un libro de divulgación científica, publicado en 1999 y escrito por el Dr. Brian Greene, en el cual el autor describe los últimos avances en la investigación sobre la teoría de cuerdas.
                                            <!--<a class="fancybox fancybox.iframe" href="iframe.html">Iframe</a>-->
                                            <div class="hover-effect h-style " style="height: 30px; position: absolute; bottom: 5px; background-image: url(images/ver_mas.png); background-size: 100% 100%;">
                                                <a class="fancybox fancybox.iframe" href="detalleLibro.php?id_libro=16">
                                                    <!--<img src="images/ver_mas.png" class="clean-img">-->
                                                    <div class="mask"><i class="icon-search"></i>
                                                        <span class="img-rollover"></span>
                                                    </div>
                                                </a>
                                            </div>
                                        </div>                                        
                                    </div>
                                    <div class="bk-right"></div>
                                    <div class="bk-left" style="background-image: url(images/proto/1.jpg); background-size: 100% 100%;">
                                        <h2>
                                            <span>por Robert Kiyosaki</span>              
                                        </h2>
                                    </div>
                                    <div class="bk-top"></div>
                                    <div class="bk-bottom"></div>
                                </div>
                            </li>
                        </ul>
                    </section>
                    <!-- END SLIDE -->
                    <!-- START SLIDE -->
                    <section>
                        <ul id="bk-list" class="bk-list clearfix belizehole">
                            <li>
                                <div class="bk-book book-2 bk-bookdefault bk-bookview">
                                    <div class="bk-front">
                                        <div class="bk-cover">
                                            <h2>
                                                <span>Lorem Ipsum</span>
                                                <span>Duis aute irure</span>
                                            </h2>
                                        </div>
                                        <div class="bk-cover-back"></div>
                                    </div>
                                    <div class="bk-page">
                                        <div class="bk-content bk-content-current">
                                            <div class="hover-effect h-style">
                                                <a href="images/preview/img01.jpg" rel="prettyPhotoImages[45]">
                                                    <img src="images/preview/img01.jpg" class="clean-img">
                                                    <div class="mask"><i class="icon-search"></i>
                                                        <span class="img-rollover"></span>
                                                    </div>
                                                </a>
                                            </div><br>
                                            CHAPTER 1: LOREM IPSUM
                                            <br>by Lorem Ipsum
                                            <br>
                                            <p> Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate </p>
                                        </div>
                                        <div class="bk-content">CHAPTER 2: LOREM IPSUM
                                            <br>by Lorem Ipsum
                                            <br>
                                            <br>
                                            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
                                        </div>
                                        <div class="bk-content">
                                            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
                                        </div>
                                    </div>
                                    <div class="bk-right"></div>
                                    <div class="bk-left">
                                        <h2>
                                            <span>by LOREM IPSUM</span>              
                                        </h2>
                                    </div>
                                    <div class="bk-top"></div>
                                    <div class="bk-bottom"></div>
                                </div>
                            </li>
                        </ul>
                    </section>
                    <!-- END SLIDE -->
                    <!-- START SLIDE -->
                    <section>
                        <ul id="bk-list" class="bk-list clearfix belizehole">
                            <li>
                                <div class="bk-book book-3 bk-bookdefault bk-bookview">
                                    <div class="bk-front">
                                        <div class="bk-cover">
                                            <h2>
                                                <span>Lorem Ipsum</span>
                                                <span>Duis aute irure</span>
                                            </h2>
                                        </div>
                                        <div class="bk-cover-back"></div>
                                    </div>
                                    <div class="bk-page">
                                        <div class="bk-content bk-content-current">
                                            CHAPTER 1: LOREM IPSUM
                                            <br>by Lorem Ipsum
                                            <br>
                                            <p> Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum. </p>
                                        </div>
                                    </div>
                                    <div class="bk-right"></div>
                                    <div class="bk-left">
                                        <h2>
                                            <span>by LOREM IPSUM</span>              
                                        </h2>
                                    </div>
                                    <div class="bk-top"></div>
                                    <div class="bk-bottom"></div>
                                </div>
                            </li>
                        </ul>
                    </section>
                    <!-- END SLIDE -->
                    <!-- START SLIDE -->
                    <section>
                        <ul id="bk-list" class="bk-list clearfix belizehole">
                            <li>
                                <div class="bk-book book-1 bk-bookdefault bk-bookview">
                                    <div class="bk-front">
                                        <div class="bk-cover" style="background-image: url(images/proto/1.jpg); background-size: 100% 100%;">
                                            <h2>
                                                <span>La Biblia</span>
                                                <span>Dios</span>
                                            </h2>
                                        </div>
                                        <div class="bk-cover-back"></div>
                                    </div>
                                    <div class="bk-page">
                                        <div class="bk-content bk-content-current">
                                            <div class="hover-effect h-style">
                                                <a href="images/proto/1.jpg" rel="prettyPhotoImages[45]">
                                                    <img src="images/proto/1.jpg" class="clean-img">
                                                    <div class="mask"><i class="icon-search"></i>
                                                        <span class="img-rollover"></span>
                                                    </div>
                                                </a>
                                            </div><br>
                                            CHAPTER 1: LOREM IPSUM
                                            <br>by Lorem Ipsum
                                            <br>
                                            <p> Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate </p>
                                        </div>
                                        <div class="bk-content">CHAPTER 2: LOREM IPSUM
                                            <br>by Lorem Ipsum
                                            <br>
                                            <br>
                                            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
                                        </div>
                                        <div class="bk-content">
                                            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
                                        </div>
                                    </div>
                                    <div class="bk-right"></div>
                                    <div class="bk-left" style="background-image: url(images/proto/1.jpg); background-size: 100% 100%;">
                                        <h2>
                                            <span>por Robert Kiyosaki</span>              
                                        </h2>
                                    </div>
                                    <div class="bk-top"></div>
                                    <div class="bk-bottom"></div>
                                </div>
                            </li>
                        </ul>
                    </section>
                    <!-- END SLIDE -->
                    <!-- START SLIDE -->
                    <section>
                        <ul id="bk-list" class="bk-list clearfix belizehole">
                            <li>
                                <div class="bk-book book-2 bk-bookdefault bk-bookview">
                                    <div class="bk-front">
                                        <div class="bk-cover">
                                            <h2>
                                                <span>Lorem Ipsum</span>
                                                <span>Duis aute irure</span>
                                            </h2>
                                        </div>
                                        <div class="bk-cover-back"></div>
                                    </div>
                                    <div class="bk-page">
                                        <div class="bk-content bk-content-current">
                                            <div class="hover-effect h-style">
                                                <a href="images/preview/img01.jpg" rel="prettyPhotoImages[45]">
                                                    <img src="images/preview/img01.jpg" class="clean-img">
                                                    <div class="mask"><i class="icon-search"></i>
                                                        <span class="img-rollover"></span>
                                                    </div>
                                                </a>
                                            </div><br>
                                            CHAPTER 1: LOREM IPSUM
                                            <br>by Lorem Ipsum
                                            <br>
                                            <p> Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate </p>
                                        </div>
                                        <div class="bk-content">CHAPTER 2: LOREM IPSUM
                                            <br>by Lorem Ipsum
                                            <br>
                                            <br>
                                            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
                                        </div>
                                        <div class="bk-content">
                                            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
                                        </div>
                                    </div>
                                    <div class="bk-right"></div>
                                    <div class="bk-left">
                                        <h2>
                                            <span>by LOREM IPSUM</span>              
                                        </h2>
                                    </div>
                                    <div class="bk-top"></div>
                                    <div class="bk-bottom"></div>
                                </div>
                            </li>
                        </ul>
                    </section>
                    <!-- END SLIDE -->
                    <!-- START SLIDE -->
                    <section>
                        <ul id="bk-list" class="bk-list clearfix belizehole">
                            <li>
                                <div class="bk-book book-3 bk-bookdefault bk-bookview">
                                    <div class="bk-front">
                                        <div class="bk-cover">
                                            <h2>
                                                <span>Lorem Ipsum</span>
                                                <span>Duis aute irure</span>
                                            </h2>
                                        </div>
                                        <div class="bk-cover-back"></div>
                                    </div>
                                    <div class="bk-page">
                                        <div class="bk-content bk-content-current">
                                            CHAPTER 1: LOREM IPSUM
                                            <br>by Lorem Ipsum
                                            <br>
                                            <p> Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum. </p>
                                        </div>
                                    </div>
                                    <div class="bk-right"></div>
                                    <div class="bk-left">
                                        <h2>
                                            <span>by LOREM IPSUM</span>              
                                        </h2>
                                    </div>
                                    <div class="bk-top"></div>
                                    <div class="bk-bottom"></div>
                                </div>
                            </li>
                        </ul>
                    </section>
                    <!-- END SLIDE -->
                    <!-- START SLIDE -->
                    <section>
                        <ul id="bk-list" class="bk-list clearfix belizehole">
                            <li>
                                <div class="bk-book book-1 bk-bookdefault bk-bookview">
                                    <div class="bk-front">
                                        <div class="bk-cover" style="background-image: url(images/proto/1.jpg); background-size: 100% 100%;">
                                            <h2>
                                                <span>La Biblia</span>
                                                <span>Dios</span>
                                            </h2>
                                        </div>
                                        <div class="bk-cover-back"></div>
                                    </div>
                                    <div class="bk-page">
                                        <div class="bk-content bk-content-current">
                                            <div class="hover-effect h-style">
                                                <a href="images/proto/1.jpg" rel="prettyPhotoImages[45]">
                                                    <img src="images/proto/1.jpg" class="clean-img">
                                                    <div class="mask"><i class="icon-search"></i>
                                                        <span class="img-rollover"></span>
                                                    </div>
                                                </a>
                                            </div><br>
                                            CHAPTER 1: LOREM IPSUM
                                            <br>by Lorem Ipsum
                                            <br>
                                            <p> Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate </p>
                                        </div>
                                        <div class="bk-content">CHAPTER 2: LOREM IPSUM
                                            <br>by Lorem Ipsum
                                            <br>
                                            <br>
                                            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
                                        </div>
                                        <div class="bk-content">
                                            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
                                        </div>
                                    </div>
                                    <div class="bk-right"></div>
                                    <div class="bk-left" style="background-image: url(images/proto/1.jpg); background-size: 100% 100%;">
                                        <h2>
                                            <span>por Robert Kiyosaki</span>              
                                        </h2>
                                    </div>
                                    <div class="bk-top"></div>
                                    <div class="bk-bottom"></div>
                                </div>
                            </li>
                        </ul>
                    </section>
                    <!-- END SLIDE -->
                    <!-- START SLIDE -->
                    <section>
                        <ul id="bk-list" class="bk-list clearfix belizehole">
                            <li>
                                <div class="bk-book book-2 bk-bookdefault bk-bookview">
                                    <div class="bk-front">
                                        <div class="bk-cover">
                                            <h2>
                                                <span>Lorem Ipsum</span>
                                                <span>Duis aute irure</span>
                                            </h2>
                                        </div>
                                        <div class="bk-cover-back"></div>
                                    </div>
                                    <div class="bk-page">
                                        <div class="bk-content bk-content-current">
                                            <div class="hover-effect h-style">
                                                <a href="images/preview/img01.jpg" rel="prettyPhotoImages[45]">
                                                    <img src="images/preview/img01.jpg" class="clean-img">
                                                    <div class="mask"><i class="icon-search"></i>
                                                        <span class="img-rollover"></span>
                                                    </div>
                                                </a>
                                            </div><br>
                                            CHAPTER 1: LOREM IPSUM
                                            <br>by Lorem Ipsum
                                            <br>
                                            <p> Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate </p>
                                        </div>
                                        <div class="bk-content">CHAPTER 2: LOREM IPSUM
                                            <br>by Lorem Ipsum
                                            <br>
                                            <br>
                                            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
                                        </div>
                                        <div class="bk-content">
                                            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
                                        </div>
                                    </div>
                                    <div class="bk-right"></div>
                                    <div class="bk-left">
                                        <h2>
                                            <span>by LOREM IPSUM</span>              
                                        </h2>
                                    </div>
                                    <div class="bk-top"></div>
                                    <div class="bk-bottom"></div>
                                </div>
                            </li>
                        </ul>
                    </section>
                    <!-- END SLIDE -->
                    <!-- START SLIDE -->
                    <section>
                        <ul id="bk-list" class="bk-list clearfix belizehole">
                            <li>
                                <div class="bk-book book-3 bk-bookdefault bk-bookview">
                                    <div class="bk-front">
                                        <div class="bk-cover">
                                            <h2>
                                                <span>Lorem Ipsum</span>
                                                <span>Duis aute irure</span>
                                            </h2>
                                        </div>
                                        <div class="bk-cover-back"></div>
                                    </div>
                                    <div class="bk-page">
                                        <div class="bk-content bk-content-current">
                                            CHAPTER 1: LOREM IPSUM
                                            <br>by Lorem Ipsum
                                            <br>
                                            <p> Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum. </p>
                                        </div>
                                    </div>
                                    <div class="bk-right"></div>
                                    <div class="bk-left">
                                        <h2>
                                            <span>by LOREM IPSUM</span>              
                                        </h2>
                                    </div>
                                    <div class="bk-top"></div>
                                    <div class="bk-bottom"></div>
                                </div>
                            </li>
                        </ul>
                    </section>
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
                    minHeight:"100%"                    
                });
            });
        </script>

        <!--Fancybox-->
        <script type="text/javascript" src="js/fancybox/jquery.fancybox.min.js?v=2.1.5"></script>
        <!--Fancybox-->
    </body>
</html>