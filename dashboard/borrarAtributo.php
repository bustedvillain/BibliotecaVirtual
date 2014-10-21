<?php
include("../sources/funciones.php");
/* 
 * Autor: José Manuel Nieto Gómez
 * Fecha de Creación: 20/10/2014
 * Objetivo: Script que recibe una petición para eliminar lógicamente un registro de un catálogo
 */

if($_GET){
    $id = $_GET["id"];
    $tabla = $_GET["entidad"];
    $idNombre = $_GET["id_nombre"];
    $atributo = $_GET["atributo"];
    
    switch($tabla){
        case "autor":
            $redirect = "autores.php";
            break;
        case "editorial":
            $redirect = "editoriales.php";
            break;
        case "nivel_educativo":
            $redirect = "niveles.php";
            break;
        case "clase":
            $redirect = "clases.php";
            break;
    }
    
    if(borraAtributo($id, $tabla, $idNombre)){
       $mensaje = ucfirst($entidad. " eliminado(a) correctamente: $atributo&notification_type=check");
    }else{
        $mensaje = ucfirst($entidad. " no eliminado(a), ocurrió algún error: $atributo&notification_type=cross");
    }   
    
    header("Location:$redirect?notification=$mensaje");
}else{
    header("Location:index.php?notification=No se recibio ningun GET :(");
}

