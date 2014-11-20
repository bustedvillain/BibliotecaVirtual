<?php verificaSesion(); ?>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta name="description" content="Biblioteca Virtual">
<meta name="author" content="EMS: Enterprise Management Service">
<link rel="icon" href="../img/ico.ico">

<title>| Biblioteca Virtual: Panel de Administracion |</title>

<!-- Bootstrap core CSS -->
<link href="../libs/bootstrap-3.2.0-dist/css/bootstrap.min.css" rel="stylesheet">

<!-- Custom styles for this template -->
<link href="dashboard.css" rel="stylesheet">

<!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
<script src="../libs/bootstrap-3.2.0-dist/js/ie10-viewport-bug-workaround.js"></script>

<!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
<!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
<![endif]-->

<!--Notificaciones-->
<link href="http://fonts.googleapis.com/css?family=Raleway:400,300,700" rel="stylesheet" type="text/css">
<link rel="stylesheet" type="text/css" href="../libs/notification/css/normalize.css" />
<link rel="stylesheet" type="text/css" href="../libs/notification/css/ns-default.css" />
<link rel="stylesheet" type="text/css" href="../libs/notification/css/ns-style-other.css" />
<script src="../libs/notification/js/modernizr.custom.js"></script>
<!--Notificaciones-->

<!--Datatables-->
<link rel="stylesheet" type="text/css" href="../libs/datatables/css/jquery.dataTables.min.css" />
<!--Datatables-->

<!--Biblioteca-->
<link rel="stylesheet" type="text/css" href="../css/style.css" />
<!--Biblioteca-->

<?php
if (isset($_GET["notification"]))
    $mensaje_notificacion = $_GET["notification"];
if (isset($_GET["notification_type"]))
    $notification_type = $_GET["notification_type"];
?>
