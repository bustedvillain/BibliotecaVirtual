<?php
/**
 * Autor: José Manuel Nieto Gómez
 * Fecha de Creación: 16/10/2014
 * Objetivo: Index de la administración de la biblioteca
 */
include("../sources/funciones.php");
$menu = 8;
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
                    <h1 class="page-header">Biblioteca Virtual: Administradores de la Biblioteca</h1>

                    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#agregar"> + Agregar</button>
                    <br><br>
                    <table class="display datatable" cellspacing="0" width="100%">
                        <thead>
                            <tr>
                                <th>Acci&oacute;n</th>
                                <th>ID</th>                                
                                <th>Nombre</th>
                                <th>Nombre de usuario</th>
                                <th>Correo</th>
                            </tr>
                        </thead>
                        <tfoot>
                            <tr>
                                <th>Acci&oacute;n</th>
                                <th>ID</th>                                
                                <th>Nombre</th>
                                <th>Nombre de usuario</th>
                                <th>Correo</th>
                            </tr>
                        </tfoot>

                        <tbody>
                            <?php construyeTablaAdministradores(); ?>
                        </tbody>
                    </table>

                </div>
            </div>
        </div>

        <!--Modal agregar-->
        <div class="modal fade" id="agregar" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                        <h4 class="modal-title" id="myModalLabel">Agregar Administrador</h4>
                    </div>
                    <form role="form" method="POST" action="gdaAdministrador.php">
                        <div class="modal-body">
                            <div class="form-group">
                                <label for="nombreAdministrador">Nombre Completo</label>
                                <input type="text" class="form-control" id="editarNombreAdministrador" name="administrador/nombre" required placeholder="Ingrese el nombre completo del administrador">
                            </div>
                            <div class="form-group">
                                <label for="nombreUsuarioAdministrador">Nombre de Usuario</label>
                                <input type="text" class="form-control" id="editarNombreUsuario" name="administrador/nombre_usuario" required placeholder="Ingrese el nombre de usuario">
                            </div>
                            <div class="form-group">
                                <label for="nombreUsuarioAdministrador">Correo Electr&oacute;nico</label>
                                <input type="email" class="form-control" id="editarCorreo" name="administrador/correo" placeholder="Ingrese el correo electrónico">
                            </div>
                            <div class="form-group">
                                <label for="nombreUsuarioAdministrador">Contrase&ntilde;a</label>
                                <input type="password" class="form-control" id="password" name="administrador/contrasena" placeholder="Ingrese la contraseña" required>
                                <div class="pwstrength_viewport_progress"></div>
                            </div>
                            <div class="checkbox">
                                <label>
                                    <input type="checkbox" name="contrasenaAutomatica" id="contrasenaAutomatica"> Asignar contrase&ntilde;a autom&aacute;ticamente
                                </label>
                            </div>                                                     

                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
                            <button type="submit" class="btn btn-primary">Guardar</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <!--Modal agregar-->
        
        <!--Modal editar-->
        <div class="modal fade" id="editar" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                        <h4 class="modal-title" id="myModalLabel">Editar Administrador</h4>
                    </div>
                    <form role="form" method="POST" action="gdaEditarAdministrador.php">
                        <div class="modal-body">
                            <div class="form-group">
                                <label for="nombreAdministrador">Nombre Completo</label>
                                <input type="text" class="form-control" id="editaNombre" name="administrador/nombre" required placeholder="Cargando...">
                            </div>
                            <div class="form-group">
                                <label for="nombreUsuarioAdministrador">Nombre de Usuario</label>
                                <input type="text" class="form-control" id="editaNombreUsuario" name="administrador/nombre_usuario" required placeholder="Cargando...">
                            </div>
                            <div class="form-group">
                                <label for="nombreUsuarioAdministrador">Correo Electr&oacute;nico</label>
                                <input type="email" class="form-control" id="editaCorreo" name="administrador/correo" placeholder="Cargando...">
                            </div>
                            <div class="form-group">
                                <label for="nombreUsuarioAdministrador">Contrase&ntilde;a</label>
                                <input type="password" class="form-control" id="editaPassword" name="administrador/contrasena" placeholder="" required>
                                <div class="pwstrength_viewport_progress"></div>
                            </div>
                            <div class="checkbox">
                                <label>
                                    <input type="checkbox" name="cambiarContrasena" id="cambiarContrasena"> Cambiar Contrase&ntilde;a
                                </label>
                            </div>                             
                            <div class="checkbox" id="checkCambAutomPass" name="contrasenaAutomatica">
                                <label>
                                    <input type="checkbox" name="contrasenaAutomaticaEditar" id="contrasenaAutomaticaEditar"> Asignar contrase&ntilde;a autom&aacute;ticamente
                                </label>
                            </div>                                                     
                            <input type="hidden" name="id_administrador" id="id_administrador"/> 
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
                            <button type="submit" class="btn btn-primary">Guardar</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <!--Modal editar-->

        <!-- Bootstrap core JavaScript
        ================================================== -->
        <!-- Placed at the end of the document so the pages load faster -->
        <?php include("../template/assets.php"); ?>
        <!--Password Strength-->
        <script type="text/javascript" src="../libs/pwstrength/pwstrength.js"></script>
        
    </body>
</html>
