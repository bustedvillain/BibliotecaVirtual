<?php

include("../sources/funciones.php");
/*
 * Autor: José Manuel Nieto Gómez
 * Fecha de Creación: 19/10/2014
 * Objetivo: Script que recibe una petición para editar valores de un catálogo
 */

if ($_POST) {
    $entidad = $_POST["entidad"];
    $nombreAtributo = $_POST["nombre_atributo"];
    $redirect = $_POST["redirect"];
    $idNombre = $_POST["id"];
    $id_val = $_POST["id_val"];
    $atributo = $_POST["atributo"];

    if (actualizaAtributo($id_val, $atributo, $entidad, $nombreAtributo, $idNombre)) {
        $mensaje = ucfirst($entidad . " editado(a) correctamente: $atributo&notification_type=check");
    } else {
        $mensaje = ucfirst($entidad . " no editado(a), ya existe algún otro registro con el mismo atributo: $atributo&notification_type=cross");
    }
    
    header("Location:$redirect?notification=$mensaje");
} else {
    header("Location:index.php?notification=No se recibio ningun POST :(");
}
