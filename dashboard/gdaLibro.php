<?php

include("../sources/funciones.php");
/*
 * Autor: José Manuel Nieto Gómez
 * Fecha de Creación: 22 de Octubre del 2014
 * Objetivo: Script que recibe petición para almacenar un libro
 */

if ($_POST) {
    echo "Guardando datos...";

    //Catalogos relacionados
    //Autor
    if (isset($_POST["autor/nombre_autor"])) {
        if (($id = insertaAtributo("nombre_autor", $_POST["autor/nombre_autor"], "autor", "id_autor")) != false) {
            $_POST["libro/id_autor"] = $id;
        } else {
            //Si existió
            if(($id = consultaAtributo("autor", "id_autor", "nombre_autor", $_POST["autor/nombre_autor"], true))!= null){
                $_POST["libro/id_autor"] = $id;
            }else{
                header("Location:libros.php?notification=Error desconocido al vincular otro autor&notification_type=cross");
            }
        }
    }
    
    //Editorial
    if (isset($_POST["editorial/nombre_editorial"])) {
        if (($id = insertaAtributo("nombre_editorial", $_POST["editorial/nombre_editorial"], "editorial", "id_editorial")) != false) {
            $_POST["libro/id_editorial"] = $id;
        } else {
            //Si existió
            if(($id = consultaAtributo("editorial", "id_editorial", "nombre_editorial", $_POST["editorial/nombre_editorial"], true))!= null){
                $_POST["libro/id_editorial"] = $id;
            }else{
                header("Location:libros.php?notification=Error desconocido al vincular otra editorial&notification_type=cross");
            }
        }
    }
    
    //Clase
    if (isset($_POST["clase/nombre_clase"])) {
        if (($id = insertaAtributo("nombre_clase", $_POST["clase/nombre_clase"], "clase", "id_clase")) != false) {
            $_POST["libro/id_clase"] = $id;
        } else {
            //Si existió
            if(($id = consultaAtributo("clase", "id_clase", "nombre_clase", $_POST["clase/nombre_clase"], true))!= null){
                $_POST["libro/id_clase"] = $id;
            }else{
                header("Location:libros.php?notification=Error desconocido al vincular otra clase&notification_type=cross");
            }
        }
    }
    
    verificaEliminacionLibro($_POST["libro/nombre_libro"]);
    if (validaInsercionAtributo($_POST["libro/nombre_libro"], "libro", "id_libro", "nombre_libro")) {
        //Si es libro gratuito se guarda archivo
        if ($_POST["libro/tipo_libro"] == "0" && isset($_FILES["libro"])) {
//            $_POST["libro/url_archivo"] = guardaArchivo("libro", BASE_STORAGE, $_POST["libro/nombre_libro"]);
            $_POST["libro/url_archivo"] = guardaStorage($_FILES["libro"]["tmp_name"], "libros");
        } else {
            $_POST["libro/url_archivo"] = $_POST["libro/url_externa"];
        }

        //Guarda Imagen
        if (isset($_FILES["imagen"])) {
            $_POST["libro/imagen"] = guardaStorage($_FILES["imagen"]["tmp_name"], "portadas");
        }
        $_POST["libro/status"] = 1;
        
        $_POST["libro/id_administrador"] = $_SESSION["administrador"]->id_administrador;

        $info = destripaPost($_POST, "/", "libro");
        insertarDatos("libro", $info["campos"]["libro"] . ", fecha_inclusion", $info["valores"]["libro"] . ", now()");


        $mensaje = "Libro agregado correctamente: " . $_POST["libro/nombre_libro"] . "&notification_type=check";
    } else {
        $mensaje = "Error al ingresar libro, existe alguno otro con el mismo nombre: " . $_POST["libro/nombre_libro"] . "&notification_type=cross";
    }

    header("Location:libros.php?notification=$mensaje");
} else {
    header("Location:index.php?notification=No se recibio ningun POST :(");
}

