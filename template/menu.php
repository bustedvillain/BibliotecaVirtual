<div class="navbar navbar-default navbar-fixed-top" role="navigation">
    <div class="container-fluid">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" style="padding-top:0px;" href="index.php">
                <img src="../img/jquery-logo.png" height="160%"/>
            </a>
        </div>
        <div class="navbar-collapse collapse">
            <ul class="nav navbar-nav navbar-left">
                <li <?php if ($menu == 1) echo 'class="active"'; ?>><a href="index.php">Inicio</a></li>
                <li <?php if ($menu == 2) echo 'class="active"'; ?>><a href="libros.php">Libros</a></li>
                <li <?php if ($menu == 3) echo 'class="active"'; ?> class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">Cat&aacute;logos <span class="caret"></span></a>
                    <ul class="dropdown-menu" role="menu">
                        <li><a href="autores.php">Autores</a></li>
                        <li><a href="editoriales.php">Editoriales</a></li>
                        <li><a href="clases.php">Clases</a></li>
                        <li><a href="niveles.php">Niveles Educativos</a></li>
                    </ul>
                </li>
                <li <?php if ($menu == 4) echo 'class="active"'; ?> class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">Configuraci&oacute;n <span class="caret"></span></a>
                    <ul class="dropdown-menu" role="menu">
                        <li><a href="administradores.php">Administradores</a></li>
                        <li><a href="instancias.php">Instancias</a></li>
                    </ul>
                </li>
<!--                <li <?php if ($menu == 3) echo 'class="active"'; ?>><a href="autores.php">Autores</a></li>
                <li <?php if ($menu == 4) echo 'class="active"'; ?>><a href="editoriales.php">Editoriales</a></li>
                <li <?php if ($menu == 5) echo 'class="active"'; ?>><a href="clases.php">Clases</a></li>
                <li <?php if ($menu == 6) echo 'class="active"'; ?>><a href="niveles.php">Niveles Educativos</a></li>
                <li <?php if ($menu == 7) echo 'class="active"'; ?>><a href="instancias.php">Instancias</a></li>
                <li <?php if ($menu == 8) echo 'class="active"'; ?>><a href="administradores.php">Administradores</a></li>  -->
                <li <?php if ($menu == 5) echo 'class="active"'; ?>><a href="estadisticas.php">Estad&iacute;sticas</a></li>  
            </ul>
            <ul class="nav navbar-nav navbar-right">
                <li><a href="#"><b>Usuario: </b><?php echo $_SESSION["administrador"]->nombre ?></a></li>
                <!--                <li><a href="#">Ajustes</a></li>
                                <li><a href="#">Perfil</a></li>-->
                <li><a href="logout.php">Cerrar Sesi&oacute;n</a></li>            
            </ul>
            <!--            <form class="navbar-form navbar-right">
                            <input type="text" class="form-control" placeholder="Buscar...">
                        </form>-->
        </div>
    </div>
</div>