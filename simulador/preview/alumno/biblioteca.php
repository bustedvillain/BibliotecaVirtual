<?php 
//var_dump($_POST);
if(isset($_POST["id_usuario"]) && isset($_POST["id_nivel_educativo"]) && isset($_POST["token"])){
    $idUsuario = $_POST["id_usuario"];
    $nivel = $_POST["id_nivel_educativo"];
    $token= $_POST["token"];
}else{
    //header("Location:../../index.php");
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <title>Biblioteca | META Space</title>
        <meta name="lang" content="es" />
        <meta name="description" content="" />
        <meta name="keywords" content="" />
        <link rel="shortcut icon" href="/favicon.ico" />

        <link href="../style/reset.css" type="text/css" rel="stylesheet"  media="all" />
        <link href="../style/general.css" type="text/css" rel="stylesheet"  media="all" />
        <link href="../style/alumno.css" type="text/css" rel="stylesheet"  media="all" />
        <link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css'/>
        <link href='http://fonts.googleapis.com/css?family=Dosis:400,300,500' rel='stylesheet' type='text/css'/>
        <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />
    </head>
    <body>
        <div id="container">
            <div id="header">
                <div id="nombre">
                    <h3><span>Alumno:</span> Juan Diego Salinas Campos</h3>
                </div>
                <div id="logo"><a href="index.html"><img src="../img/logo_meta.gif" width="347" height="72" alt="Ir a inicio de Meta Space" border="0" /></a></div>
                <div id="botones">
                    <div id="buscador">
                        <form id="" name=""  action="" enctype="multipart/form-data" method="post">
                            <div id="buscador_alu"><input name="buscador" size="35" maxlength="35" type="text" id="Buscador" placeholder="Buscar..."></div>
                            <div id="lupa"><input name="submit" class="btn_envio" id="btn_envio" value="" type="submit"></div>
                        </form>

                    </div>

                    <div class="separador"></div>
                    <div class="btn_perfil"><a href="perfil.html"><img src="../img/alumno/icono_perfil.png" width="55" height="30" border="0" />mi perfil</a></div>
                    <div class="separador"></div>
                    <div class="btn_perfil"><a href="como_navegar.html"><img src="../img/alumno/icono_navegar.png" width="55" height="30" border="0" />como navegar</a></div>
                    <div class="separador"></div>
                    <div class="btn_perfil"><a href="amigos.html"><img src="../img/alumno/icono_amigos.png" width="55" height="30" border="0" />amigos</a></div>
                    <div id="foto_perfil"><span></span><img src="../img/alumno/nino.jpg" width="60" height="60" /></div>
                </div>
            </div>

            <div id="buscador2">
                <form id="" name=""  action="" enctype="multipart/form-data" method="post">
                    <div id="buscador_alu"><input name="buscador" size="35" maxlength="35" type="text" id="Buscador" placeholder="Buscar..."></div>
                    <div id="lupa"><input name="submit" class="btn_envio" id="btn_envio" value="" type="submit"></div>
                </form>

            </div>

            <div id="central">

                <ul id="lateral_nav">
                    <li id="lateral_nav_aprender"><a title="" href="index.html">Aprender</a></li>
                    <li id="lateral_nav_baul"><a title="" href="baul.html">Baúl</a></li>
                    <li id="lateral_nav_locker"><a title="" href="mi_locker.html">Locker</a></li>
                    <li id="lateral_nav_biblioteca"><span>Biblioteca</span></li>          		               
                </ul>
                <div id="biblioteca">
                    <iframe id="frame" frameBorder="0" width="100%" height="550px" scrolling="no" src="/BibliotecaVirtual/middleware/?token=<?=$token?>&id_usuario=<?=$idUsuario?>&nivel_educativo=<?=$nivel?>">El navegador no soporta IFrames</iframe>
                </div>       


            </div>
            <div id="footer">	  
                <ul>
                    <li><a href="">Derechos en trámite</a></li>
                    <li><a href="">Aviso de privacidad</a></li>
                    <li><div id="social_fb"><a href=""></a></div></li>
                    <li><div id="social_tw"><a href=""></a></div></li>
                </ul>

            </div>
        </div>





    </body>
</html>
