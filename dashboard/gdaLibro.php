<?php

include("../sources/funciones.php");
/*
 * Autor: José Manuel Nieto Gómez
 * Fecha de Creación: 22 de Octubre del 2014
 * Objetivo: Script que recibe petición para almacenar un libro
 */

if ($_POST) {
    echo "Guardando datos...";
    if (validaInsercionAtributo($_POST["libro/nombre_libro"], "libro", "id_libro", "nombre_libro")) {
        //Si es libro gratuito se guarda archivo
        if($_POST["libro/tipo_libro"]== "0"){
//            $_POST["libro/url_archivo"] = guardaArchivo("libro", BASE_STORAGE, $_POST["libro/nombre_libro"]);
            $_POST["libro/url_archivo"] = guardaStorage($_FILES["libro"]["tmp_name"], "libros");
        }
        $_POST["libro/status"] = 1;
        //TEMPORAL MIENTRAS SE IMPLEMENTAN SESIONES
        $_POST["libro/id_administrador"] = 8;
        
        $info = destripaPost($_POST, "/", "libro");
        insertarDatos("libro", $info["campos"]["libro"].", fecha_inclusion", $info["valores"]["libro"].", now()");
        
        
        $mensaje = "Libro agregado correctamente: " . $_POST["libro/nombre_libro"] . "&notification_type=check";
    } else {
        $mensaje = "Error al ingresar libro, existe alguno otro con el mismo nombre: " . $_POST["libro/nombre_libro"]. "&notification_type=cross";
    }

    header("Location:libros.php?notification=$mensaje");
} else {
    header("Location:index.php?notification=No se recibio ningun POST :(");
}

