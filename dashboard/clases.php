<?php
/**
 * Autor: José Manuel Nieto Gómez
 * Fecha de Creación: 16/10/2014
 * Objetivo: Index de la administración de la biblioteca
 */
include("../sources/funciones.php");
$menu = 5;
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
                    <h1 class="page-header">Biblioteca Virtual: Administraci&oacute;n de Clases</h1>

                    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#agregar"> + Agregar</button>
                    <br><br>
                    <table class="display datatable" cellspacing="0" width="100%">
                        <thead>
                            <tr>
                                <th>Acci&oacute;n</th>
                                <th>ID</th>                                
                                <th>Nombre</th>
                            </tr>
                        </thead>
                        <tfoot>
                            <tr>
                                <th>Acci&oacute;n</th>
                                <th>ID</th>                                
                                <th>Nombre</th>
                            </tr>
                        </tfoot>

                        <tbody>
                            <?php consultaAtributos("clase", "id_clase", "nombre_clase"); ?>
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
                        <h4 class="modal-title" id="myModalLabel">Agregar Clase</h4>
                    </div>
                    <form role="form" method="post" action="gdaCatalogo.php">
                        <div class="modal-body">
                            <div class="form-group">
                                <label for="nombreClase">Nombre</label>
                                <input type="text" class="form-control" id="nombre_autor" name="atributo" placeholder="Ingrese nombre de la clase" required>
                            </div>    
                            <div class="alert alert-danger alert-dismissible invisible" role="alert">
                                <button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                                <strong>Error.</strong> Este nombre ya se encuentra registrado.
                            </div>
                        </div>
                        <input type="hidden" name="entidad" value="clase"/>
                        <input type="hidden" name="nombre_atributo" value="nombre_clase"/>
                        <input type="hidden" name="redirect" value="clases.php"/>
                        <input type="hidden" name="id" value="id_clase"/>
                        
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
                        <h4 class="modal-title" id="myModalLabel">Editar Clase</h4>
                    </div>
                    <form role="form" method="post" action="gdaEditarCatalogo.php">
                        <div class="modal-body">
                            <div class="form-group">
                                <label for="nombreAutor">Nombre</label>
                                <input type="text" class="form-control" id="editaAtributo" name="atributo" placeholder="Cargando..." required>
                            </div>    
                            <div class="alert alert-danger alert-dismissible invisible" role="alert">
                                <button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                                <strong>Error.</strong> Este nombre ya se encuentra registrado.
                            </div>
                        </div>
                        <input type="hidden" name="entidad" value="clase"/>
                        <input type="hidden" name="nombre_atributo" value="nombre_clase"/>
                        <input type="hidden" name="redirect" value="clases.php"/>
                        <input type="hidden" name="id" value="id_clase"/>
                        <input type="hidden" name="id_val" id="idAtributo"/>

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


    </body>
</html>
