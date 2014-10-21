<?php

include("../sources/funciones.php");
/*
 * Autor: José Manuel Nieto Gómez
 * Fecha de Creación: 20 de Octubre de 2014
 * Objetivo: Script que recibe una petición para editar una instancia
 */

if ($_POST) {
    $idInstancia = $_POST["id_instancia"];
    $nombreInstancia = $_POST["atributo"];
    $actualizaToken = $_POST["actualizar_token"];
    $redirect = "instancias.php";

    if (actualizaInstancia($idInstancia, $nombreInstancia, $actualizaToken)) {
        if(isset($actualizaToken)){
         $mensaje = ucfirst("Instancia actualizada correctamente: $nombreInstancia. Token de acceso renovado&notification_type=check");   
        }else{
         $mensaje = ucfirst("Instancia actualizada correctamente: $nombreInstancia&notification_type=check");   
        }        
    } else {
        $mensaje = ucfirst("Instancia no actualizada, ya existía otra con anterioridad: $nombreInstancia&notification_type=cross");
    }

    header("Location:$redirect?notification=$mensaje");
} else {
    header("Location:index.php?notification=No se recibio ningun POST :(");
}

