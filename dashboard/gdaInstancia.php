<?php
include("../sources/funciones.php");
/* 
 * Autor: José Manuel Nieto Gómez
 * Fecha de Creación: 19/10/2014
 * Objetivo: Script que recibe una petición para guardar una instancia
 */

if($_POST){
    $nombreInstancia = $_POST["nombre_instancia"];
    $token = $prefijo = substr(md5(uniqid(rand())),0,8);
}else{
    header("Location:index.php?notification=No se recibio ningun POST :(");
}
