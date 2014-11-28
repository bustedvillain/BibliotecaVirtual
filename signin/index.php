<?php
include("../sources/funciones.php");

$mensaje = "";
if (isset($_GET["event"])) {
    switch ($_GET["event"]) {
        case "1":
            $mensaje = '<div class="alert alert-danger" role="alert">Se requiere inicio de sesi&oacute;n para acceder.</div>';
            break;
        case "2":
            $mensaje = '<div class="alert alert-danger" role="alert">Error interno, inténte de nuevo.</div>';
            break;
    }
}

if (isset($_SESSION["administrador"])) {
    $nombre = $_SESSION["administrador"]->nombre;
    $mensaje = '<div class="alert alert-info" role="alert">Ya cuenta con una sesi&oacute;n activa, ¿Deseas <a href="../dashboard/?notification=Bienvenido(a) ' . $nombre . '&notification_type=check">continuar</a> o <a href="../dashboard/logout.php">cerrar sesi&oacute;n</a>?. S:1</div>';
} else {
    //Verificar si tiene cookies
    if(isset($_COOKIE["administrador"])) {
        foreach (($admin = consultaUsuario($_COOKIE["administrador"])) as $a) {
            $_SESSION["administrador"] = $a;
            $mensaje = '<div class="alert alert-info" role="alert">Ya cuenta con una sesi&oacute;n activa, ¿Deseas <a href="../dashboard/?notification=Bienvenido(a) ' . $a->nombre . '&notification_type=check">continuar</a> o <a href="../dashboard/logout.php">cerrar sesi&oacute;n</a>?. S:2</div>';
        }
    }
}
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="description" content="Biblioteca Virtual">
        <meta name="author" content="">
        <link rel="icon" href="../img/ico.ico">

        <title>| Biblioteca Virtual: Inicio de Sesión |</title>

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

            <form class="form-signin" role="form" id="login">
                <h2 class="form-signin-heading"><img src="../img/jquery-logo.png" width="100%"/></h2>
                <input id="email" type="text" class="form-control" placeholder="Correo o usuario" required autofocus>
                <input id="pass" type="password" class="form-control" placeholder="Contraseña" required>
                <label class="checkbox">
                    <input type="checkbox" id="recordarme"> Recordarme
                </label>
                <button class="btn btn-lg btn-primary btn-block" type="submit">Iniciar Sesión</button>
                <div id="loading"><?php echo $mensaje; ?></div>
            </form>

        </div> <!-- /container -->


        <!-- Bootstrap core JavaScript
        ================================================== -->
        <!-- Placed at the end of the document so the pages load faster -->
        <script src="../libs/bootstrap-3.2.0-dist/js/jquery-1.11.1.min.js"></script>
        <script src="../js/biblioteca.js"></script>
    </body>
</html>
