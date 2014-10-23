<?php

include("../sources/funciones.php");
/*
 * Autor: José Manuel Nieto Gómez
 * Fecha de Creación: 22 de Octubre de 2014
 * Objetivo: Script que recibe una petición para eliminar lógicamente un administrador
 */

if ($_GET) {
    $id = $_GET["id"];
    $nombre = $_GET["nombre"];
    
    borraAtributo($id, "administrador", "id_administrador");
    
    header("Location:administradores.php?notification=Administrador(a) eliminado correctamente: $nombre&notification_type=check");
} else {
    header("Location:index.php?notification=No se recibio ningun GET :(");
}


    