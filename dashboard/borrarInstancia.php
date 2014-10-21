<?php

include("../sources/funciones.php");
/*
 * Autor: José Manuel Nieto Gómez
 * Fecha de Creación: 21 de Octubre de 2014
 * Objetivo: Script que recibe petición para eliminar lógicamente una instancia
 */

if ($_GET) {
    $id = $_GET["id"];
    $nombreInstancia = $_GET["nombre"];
    $redirect = "instancias.php";

    if (borraAtributo($id, "instancia", "id_instancia")) {
        $mensaje = ucfirst("Instancia eiminada correctamente: $nombreInstancia&notification_type=check");
    } else {
        $mensaje = ucfirst("Instancia no eliminada, ocurrió un error: $nombreInstancia&notification_type=cross");
    }

    header("Location:$redirect?notification=$mensaje");
} else {
    header("Location:index.php?notification=No se recibio ningun GET :(");
}
