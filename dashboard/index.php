<?php
/**
 * Autor: José Manuel Nieto Gómez
 * Fecha de Creación: 16/10/2014
 * Objetivo: Index de la administración de la biblioteca
 */
include("../sources/funciones.php");
$menu = 1;
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
                    <h1 class="page-header">Biblioteca Virtual: Panel de Administraci&oacute;n</h1>
                    <?php
                    var_dump($_COOKIE);
                    setcookie("test_cookie", "test", time() + 36000, '/');
                    if (count($_COOKIE) > 1) {
                        echo "Cookies are enabled";
                    } else {
                        echo "Cookies are disabled";
                    }
                    ?>
                    <img src="../img/biblioteca.jpg" width="100%"/>

                </div>
            </div>
        </div>

        <!-- Bootstrap core JavaScript
        ================================================== -->
        <!-- Placed at the end of the document so the pages load faster -->
<?php include("../template/assets.php"); ?>


    </body>
</html>
