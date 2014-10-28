<?php
include("../sources/funciones.php");
/* 
 * Autor: José Manuel Nieto Gómez
 * Fecha de Creación: 27 de Octubre de 2014
 * Objetivo: Script que recibe una petición para eliminar un libro del sistema
 */

if($_GET){
    $id = $_GET["id"];
    $nombreLibro = $_GET["nombre"];
    $redirect = "libros.php";
    
    if (borraAtributo($id, "libro", "id_libro")) {
        $mensaje = ucfirst("Libro eliminado correctamente: $nombreLibro&notification_type=check");
    } else {
        $mensaje = ucfirst("Libro no eliminada, ocurrió un error: $nombreLibro&notification_type=cross");
    }

    header("Location:$redirect?notification=$mensaje");
} else {
    header("Location:index.php?notification=No se recibio ningun GET :(");
}
