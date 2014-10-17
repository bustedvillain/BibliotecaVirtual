<?php

/* 
 * Autor: José Manuel Nieto Gómez
 * Fecha de Creación: 17/10/2014
 * Objetivo: Script que guarda catálogos genéricos
 */

include("../sources/funciones.php");

if($_POST){
    $atributo = $_POST["atributo"];
    $nombre_atributo = $_POST["nombre_atributo"];
    $entidad = $_POST["entidad"];
    $redirect = $_POST["redirect"];
    $id = $_POST["id"];
    
    if(insertaAtributo($nombre_atributo, $atributo, $entidad, $id )){
        $mensaje = ucfirst($entidad. " ingresado(a) correctamente: $atributo&notification_type=check");
    }else{
        $mensaje = ucfirst($entidad. " no ingresado(a), ya existía con anterioridad: $atributo&notification_type=cross");
    }
   
    
    header("Location:$redirect?notification=$mensaje");
}else{
    header("Location:index.php?notification=No se recibio ningun POST :(");
}

