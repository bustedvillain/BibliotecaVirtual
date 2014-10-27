<?php
/**
 * Autor: José Manuel Nieto Gómez
 * Fecha de Creación: 16/10/2014
 * Objetivo: Index de la administración de la biblioteca
 */
include("../sources/funciones.php");
$menu = 2;
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
                    <h1 class="page-header">Biblioteca Virtual: Administraci&oacute;n de Libros</h1>

                    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#agregar"> + Agregar</button>
                    <br><br>
                    <table class="display datatable" cellspacing="0" width="100%">
                        <thead>
                            <tr>
                                <th>Acci&oacute;n</th>
                                <th>ID</th>                                
                                <th>Imagen</th>
                                <th>Nombre</th>
                                <th>Autor</th>
                                <th>Editorial</th>
                                <th>Clase</th>
                                <th>Nivel Educativo</th>
                                <th>Tipo</th>
                            </tr>
                        </thead>
                        <tfoot>
                            <tr>
                                <th>Acci&oacute;n</th>
                                <th>ID</th>                                
                                <th>Imagen</th>
                                <th>Nombre</th>
                                <th>Autor</th>
                                <th>Editorial</th>
                                <th>Clase</th>
                                <th>Nivel Educativo</th>
                                <th>Tipo</th>
                            </tr>
                        </tfoot>

                        <tbody>
                            <?php construyeLibros(); ?>
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
                        <h4 class="modal-title" id="myModalLabel">Agregar Libro</h4>
                    </div>
                    <form role="form" method="POST" action="gdaLibro.php" enctype="multipart/form-data">
                        <div class="modal-body">
                            <div class="form-group">
                                <label for="nombreLibro">Nombre del libro</label>
                                <input type="text" name="libro/nombre_libro" class="form-control"  placeholder="Ingrese el nombre del libro">
                            </div>
                            <div class="form-group">
                                <label for="autor">Autor</label>
                                <select class="form-control" name="libro/id_autor" required>
                                    <?php optionsCatalogo("id_autor", "nombre_autor", "autor") ?>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="editorial">Editorial</label>
                                <select class="form-control" name="libro/id_editorial" required>
                                    <?php optionsCatalogo("id_editorial", "nombre_editorial", "editorial") ?>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="clase">Clase</label>
                                <select class="form-control" name="libro/id_clase" required>
                                    <?php optionsCatalogo("id_clase", "nombre_clase", "clase") ?>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="nivelEducativo">Nivel Educativo</label>
                                <select class="form-control" name="libro/id_nivel_educativo" required>
                                    <?php optionsCatalogo("id_nivel_educativo", "nombre_nivel", "nivel_educativo") ?>
                                </select>
                            </div>                            
                            <div class="form-group">
                                <label for="tipoLibro">Tipo de libro</label>
                                <select class="form-control" name="libro/tipo_libro" id="tipo-libro" required>
                                    <option value="0">Gratuito</option>
                                    <option value="1">Paga</option>
                                </select>
                            </div>
                            <div class="form-group" id="url-externa">
                                <label for="urlExterna">URL externa</label>
                                <input type="url" class="form-control"  name="libro/url_externa" placeholder="Ingrese la URL externa del libro">
                            </div>
                            <div class="form-group" id="libro-gratuito">
                                <label for="libro">Libro Digital</label>
                                <input class="form-control" type="file" accept='application/pdf' name="libro" required>
                                <p class="help-block">Libro en formato PDF.</p>
                            </div>
                            <div class="form-group">
                                <label for="libro">Car&aacute;tula del libro</label>
                                <input class="form-control" type="file" name="imagen" accept="image/*" id="input-imagen" required>
                                <p class="help-block">Car&aacute;tula del libro en imagen: .png, .jpg, .bmp, .gif.</p>
                                <div id="muestra-imagen"></div>
                                <!--<input id="imagen-base64" type="hidden"  value="">-->
                            </div>  
                            <div class="form-group">
                                <label for="descripcion">Descripci&oacute;n</label>
                                <textarea class="form-control" rows="4" name="libro/descripcion" required></textarea>
                            </div>


                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
                            <button type="submit" class="btn btn-primary" id="guardarLibro">Guardar</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <!--Modal agregar-->

        <!--Modal ver-->
        <div class="modal fade" id="ver" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                        <h4 class="modal-title" id="myModalLabel">Agregar Libro</h4>
                    </div>
                    <div class="modal-body">
                        <table class="table table-hover">
                            <tr>
                                <td rowspan="2" id="ver-imagen" style="width:50%;"></td>
                                <td><b>Nombre: </b><span id="ver-nombre"></span></td>
                            </tr>
                            <tr>
                                <td><b>Desripci&oacute;n: </b><span id="ver-descripcion"></span></td>
                            </tr>
                            <tr>
                                <td><b>Autor: </b></td>
                                <td><span id="ver-autor"></span></td>
                            </tr>
                            <tr>
                                <td><b>Editorial: </b></td>
                                <td><span id="ver-editorial"></span></td>
                            </tr>
                            <tr>
                                <td><b>Clase: </b></td>
                                <td><span id="ver-clase"></span></td>
                            </tr>
                            <tr>
                                <td><b>Nivel Educativo:</b></td>
                                <td id="ver-nivel"></td>
                            </tr>
                            <tr>
                                <td><b>Tipo de Libro:</b></td>
                                <td id="ver-tipo"></td>
                            </tr>
                            <tr>
                                <td><b>Fecha de Inclusi&oacute;n:</b></td>
                                <td id="ver-fecha"></td>
                            </tr>
                            <tr>
                                <td><b>Gestionado por:</b></td>
                                <td id="ver-admin"></td>
                            </tr>
                            <tr>
                                <td><b>Ver Libro</b></td>
                                <td></td>
                            </tr>
                        </table>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
                        <button type="submit" class="btn btn-primary">Guardar</button>
                    </div>

                </div>
            </div>
        </div>
        <!--Modal ver-->

        <!--Modal editar-->
        <div class="modal fade" id="editar" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                        <h4 class="modal-title" id="myModalLabel">Editar Libro</h4>
                    </div>
                    <form role="form" method="POST" action="gdaEditarLibro.php" enctype="multipart/form-data">
                        <div class="modal-body">
                            <div class="form-group">
                                <label for="nombreLibro">Nombre del libro</label>
                                <input type="text" name="libro/nombre_libro" class="form-control"  placeholder="Cargando..." id="edita-nombre-libro">
                            </div>
                            <div class="form-group">
                                <label for="autor">Autor</label>
                                <select class="form-control" name="libro/id_autor" required id="edita-autor">
                                    <?php optionsCatalogo("id_autor", "nombre_autor", "autor") ?>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="editorial">Editorial</label>
                                <select class="form-control" name="libro/id_editorial" required id="edita-editorial">
                                    <?php optionsCatalogo("id_editorial", "nombre_editorial", "editorial") ?>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="clase">Clase</label>
                                <select class="form-control" name="libro/id_clase" required id="edita-clase">
                                    <?php optionsCatalogo("id_clase", "nombre_clase", "clase") ?>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="nivelEducativo">Nivel Educativo</label>
                                <select class="form-control" name="libro/id_nivel_educativo" required id="edita-nivel">
                                    <?php optionsCatalogo("id_nivel_educativo", "nombre_nivel", "nivel_educativo") ?>
                                </select>
                            </div>                            
                            <div class="form-group">
                                <label for="tipoLibro">Tipo de libro</label>
                                <select class="form-control" name="libro/tipo_libro" id="edita-tipo-libro" required>
                                    <option value="0">Gratuito</option>
                                    <option value="1">Paga</option>
                                </select>
                            </div>
                            <div class="form-group" id="url-externa">
                                <label for="urlExterna">URL externa</label>
                                <input type="url" class="form-control"  name="libro/url_externa" placeholder="Cargando..." id="edita-url-externa">
                            </div>
                            <div class="form-group" id="libro-gratuito">
                                <label for="libro">Libro Digital</label>
                                <input class="form-control" type="file" accept='application/pdf' name="libro">
                                <p class="help-block">Libro en formato PDF.</p>
                            </div>
                            <div class="form-group" id="libro-gratuito">
                                <label for="libro">Car&aacute;tula del libro</label>
                                <input class="form-control" type="file" name="imagen" accept="image/*" id="input-imagen2">
                                <p class="help-block">Car&aacute;tula del libro en imagen: .png, .jpg, .bmp, .gif.</p>
                                <div id="muestra-imagen2"></div>
                                <!--<input id="imagen-base64" type="hidden"  value="">-->
                            </div>  
                            <div class="form-group">
                                <label for="descripcion">Descripci&oacute;n</label>
                                <textarea class="form-control" rows="4" name="libro/descripcion" required id="edita-descripcion"></textarea>
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
        <?php include("../template/assets.php"); ?>


    </body>
</html>
