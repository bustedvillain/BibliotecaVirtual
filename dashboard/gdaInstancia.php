<?php

include("../sources/funciones.php");
/*
 * Autor: José Manuel Nieto Gómez
 * Fecha de Creación: 19/10/2014
 * Objetivo: Script que recibe una petición para guardar una instancia
 */

if ($_POST) {
    $nombreInstancia = $_POST["nombre_instancia"];
    $redirect = "instancias.php";

    if (guardaInstancia(__($nombreInstancia))) {
        $mensaje = ucfirst("Instancia vinculada correctamente: $nombreInstancia&notification_type=check");
    } else {
        $mensaje = ucfirst("Instancia no vincuada, ya existía con anterioridad: $nombreInstancia&notification_type=cross");
    }
    

    header("Location:$redirect?notification=$mensaje");
} else {
    header("Location:index.php?notification=No se recibio ningun POST :(");
}
