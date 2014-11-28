<?php
/**
 * Autor: José Manuel Nieto Gómez
 * Fecha de Creación: 16/10/2014
 * Objetivo: Index de la administración de la biblioteca
 */
include("../sources/funciones.php");
$menu = 3;
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

                <!--<div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">-->
                <div class="container theme-showcase main">
                    <div class="jumbotron">
                        <h1>Niveles Educativos</h1>
                        <p>A continuaci&oacute;n se muestran los niveles educativos que vincula la Biblioteca Virtual con MetaSpace</p>
                    </div>
                    <!--<h1 class="page-header">Biblioteca Virtual: Administraci&oacute;n de Niveles Educativos</h1>-->

                    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#agregar"> + Agregar</button>
                    <br><br>
                    <table class="display datatable" cellspacing="0" width="100%">
                        <thead>
                            <tr>
                                <th>Acci&oacute;n</th>
                                <th>ID</th>                                
                                <th>Nombre</th>
                                <th>Color 1</th>
                                <th>Color 2</th>
                            </tr>
                        </thead>
                        <tfoot>
                            <tr>
                                <th>Acci&oacute;n</th>
                                <th>ID</th>                                
                                <th>Nombre</th>
                                <th>Color 1</th>
                                <th>Color 2</th>
                            </tr>
                        </tfoot>

                        <tbody>
                            <?php tablaNivelesEducativos(); ?>
                        </tbody>
                    </table>
                    <?php include("../template/footer.php"); ?>
                </div>
            </div>
        </div>

        <!--Modal agregar-->
        <div class="modal fade" id="agregar" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                        <h4 class="modal-title" id="myModalLabel">Agregar Nivel Educativo</h4>
                    </div>
                    <form role="form" method="post" action="gdaNivel.php">
                        <div class="modal-body">
                            <div class="form-group">
                                <label for="nombreAutor">Nombre</label>
                                <input type="text" class="form-control" id="nombre_autor" name="nivel_educativo/nombre_nivel" placeholder="Ingrese el nivel educativo" required>
                            </div>    
                            <div class="form-group">
                                <label for="nombreAutor">Color 1</label>
                                <input type="color" class="form-control" id="color1" name="nivel_educativo/color1" placeholder="Ingrese el nivel educativo" required>
                            </div> 
                            <div class="form-group">
                                <label for="nombreAutor">Color 2</label>
                                <input type="color" class="form-control" id="color2" name="nivel_educativo/color2" placeholder="Ingrese el nivel educativo" required>
                            </div> 
                            <div class="alert alert-danger alert-dismissible invisible" role="alert">
                                <button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                                <strong>Error.</strong> Este nombre ya se encuentra registrado.
                            </div>
                        </div>
                        <input type="hidden" name="entidad" value="nivel_educativo"/>
                        <input type="hidden" name="nombre_atributo" value="nombre_nivel"/>
                        <input type="hidden" name="redirect" value="niveles.php"/>
                        <input type="hidden" name="id" value="id_nivel_educativo"/>

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
                        <h4 class="modal-title" id="myModalLabel">Editar Nivel Educativo</h4>
                    </div>
                    <form role="form" method="post" action="gdaEditarNivel.php">
                        <div class="modal-body">
                            <div class="form-group">
                                <label for="nombreAutor">Nombre</label>
                                <input type="text" class="form-control" id="editaNombreNivel" name="nivel_educativo/nombre_nivel" placeholder="Ingrese nombre del nivel educativo" required>
                            </div>    
                            <div class="form-group">
                                <label for="nombreAutor">Color 1</label>
                                <input type="color" class="form-control" id="editaColor1" name="nivel_educativo/color1" placeholder="Ingrese nombre del nivel educativo" required>
                            </div>  
                            <div class="form-group">
                                <label for="nombreAutor">Color 2</label>
                                <input type="color" class="form-control" id="editaColor2" name="nivel_educativo/color2" placeholder="Ingrese nombre del nivel educativo" required>
                            </div>  
                            <div class="alert alert-danger alert-dismissible invisible" role="alert">
                                <button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                                <strong>Error.</strong> Este nombre ya se encuentra registrado.
                            </div>
                        </div>
                        <input type="hidden" name="id_nivel_educativo" id="id_nivel_educativo"/>
                        
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
