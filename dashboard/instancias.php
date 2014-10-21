<?php
/**
 * Autor: José Manuel Nieto Gómez
 * Fecha de Creación: 16/10/2014
 * Objetivo: Index de la administración de la biblioteca
 */
include("../sources/funciones.php");
$menu = 7;
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
                    <h1 class="page-header">Biblioteca Virtual: Administraci&oacute;n de Instancias</h1>

                    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#agregar"> + Agregar</button>
                    <br><br>
                    <table class="display datatable" cellspacing="0" width="100%">
                        <thead>
                            <tr>
                                <th>Acci&oacute;n</th>
                                <th>ID</th>                                
                                <th>Nombre</th>
                                <th>Token de Acceso</th>
                            </tr>
                        </thead>
                        <tfoot>
                            <tr>
                                <th>Acci&oacute;n</th>
                                <th>ID</th>                                
                                <th>Nombre</th>
                                <th>Token de Acceso</th>
                            </tr>
                        </tfoot>

                        <tbody>
                            <?php construyeTablaInstancias(); ?>
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
                        <h4 class="modal-title" id="myModalLabel">Agregar Instancia</h4>
                    </div>
                    <form role="form" action="gdaInstancia.php" method="POST">
                        <div class="modal-body">
                            <div class="form-group">
                                <label for="nombreInstancia">Nombre de la Instancia</label>
                                <input type="text" class="form-control" name="nombre_instancia" placeholder="Nombre de la Instancia">
                            </div>                          
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
                            <button type="button" class="btn btn-primary">Guardar</button>
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
                        <h4 class="modal-title" id="myModalLabel">Editar Instancia</h4>
                    </div>
                    <form role="form" method="post" action="gdaEditarInstancia.php">
                        <div class="modal-body">
                            <div class="form-group">
                                <label for="nombreAutor">Nombre</label>
                                <input type="text" class="form-control" id="editaAtributo" name="atributo" placeholder="Cargando..." required>
                            </div>    
                            <div class="checkbox">
                                <label>
                                    <input type="checkbox" name="actualizar_token"> Renovar Token de Acceso
                                </label>
                            </div> 
                            <input type="hidden" id="id_instancia" name="id_instancia">
                            <div class="alert alert-danger alert-dismissible invisible" role="alert">
                                <button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                                <strong>Error.</strong> Este nombre ya se encuentra registrado.
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
        <!--Modal editar-->

        <!-- Bootstrap core JavaScript
        ================================================== -->
        <!-- Placed at the end of the document so the pages load faster -->
        <!--Copy to clipboard-->
        <script type="text/javascript" src="../libs/zeroclipboard/ZeroClipboard.min.js"></script>
        <?php include("../template/assets.php"); ?>



    </body>
</html>
