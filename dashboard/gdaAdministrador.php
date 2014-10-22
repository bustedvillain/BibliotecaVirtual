<?php

include("../sources/funciones.php");
/*
 * Autor: José Manuel Nieto Gómez
 * Fecha de Creación: 21 de Octubre de 2014
 * Objetivo: Script que recibe una petición para ingresar un nuevo administrador al sistema
 */

if ($_POST) {
    if(isset($_POST["contrasenaAutomatica"])){
        $_POST["administrador/contrasena"] = generarToken();
    }
    
    $_POST["administrador/contrasena"] = nCrypt($_POST["administrador/contrasena"]);
    $_POST["administrador/status"] = 1;
    
    $info = destripaPost($_POST, "/", "administrador");
    
    insertarDatos("administrador", $info["campos"]["administrador"], $info["valores"]["administrador"]);
    
    $nombre = $_POST["administrador/nombre"];
    
    correoNuevoUsuario($_POST["administrador/correo"], $_POST["administrador/nombre_usuario"], nDCrypt($_POST["administrador/contrasena"]));
    
    header("Location:administradores.php?notification=Administrador(a) agregado(a) correctamente: $nombre&notification_type=check");
    
} else {
    header("Location:index.php?notification=No se recibio ningun POST :(");
}
