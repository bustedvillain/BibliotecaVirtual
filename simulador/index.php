<?php include("../sources/funciones.php"); 

?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="description" content="Biblioteca Virtual">
        <meta name="author" content="">
        <link rel="icon" href="../../favicon.ico">

        <title>| Biblioteca Virtual: Simulador |</title>

        <!-- Bootstrap core CSS -->
        <link href="../libs/bootstrap-3.2.0-dist/css/bootstrap.min.css" rel="stylesheet">

        <!-- Custom styles for this template -->
        <link href="signin.css" rel="stylesheet">
        <link href="../css/style.css" rel="stylesheet">

        <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
        <script src="../libs/bootstrap-3.2.0-dist/js/ie10-viewport-bug-workaround.js"></script>

        <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
        <!--[if lt IE 9]>
          <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
          <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
        <![endif]-->
    </head>

    <body>

        <div class="container">

            <form class="form-signin" role="form" method="POST" action="preview/alumno/biblioteca.php">
                <h1 class="form-signin-heading" style="text-align:center;">Simulador</h1>
                <h2 class="form-signin-heading"><img src="../img/jquery-logo.png" width="100%"/></h2>
                <input name="id_usuario" type="number" class="form-control" placeholder="Id de usuario" required autofocus>
                <select class="form-control" name="id_nivel_educativo" required>
                    <?php optionsCatalogo("id_nivel_educativo", "nombre_nivel", "nivel_educativo") ?>
                </select>
                <select class="form-control" name="token" required>
                    <?php optionsCatalogo("token", "nombre_instancia", "instancia") ?>
                </select>
                <button class="btn btn-lg btn-primary btn-block" type="submit">Simular Sesi&oacute;n</button>
                
            </form>

        </div> <!-- /container -->


        <!-- Bootstrap core JavaScript
        ================================================== -->
        <!-- Placed at the end of the document so the pages load faster -->
        <script src="../libs/bootstrap-3.2.0-dist/js/jquery-1.11.1.min.js"></script>
        
    </body>
</html>
