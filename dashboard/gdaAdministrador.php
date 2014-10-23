<?php

include("../sources/funciones.php");
/*
 * Autor: José Manuel Nieto Gómez
 * Fecha de Creación: 21 de Octubre de 2014
 * Objetivo: Script que recibe una petición para ingresar un nuevo administrador al sistema
 */

if ($_POST) {
    
    verificaEliminacionUsuario($_POST["administrador/correo"], $_POST["administrador/nombre_usuario"]);
    if (validaInsercionAtributo($_POST["administrador/nombre_usuario"], "administrador", "id_administrador", "nombre_usuario") && validaInsercionAtributo($_POST["administrador/correo"], "administrador", "id_administrador", "correo")) {
        if (isset($_POST["contrasenaAutomatica"])) {
            $_POST["administrador/contrasena"] = generarToken();
        }

        $_POST["administrador/contrasena"] = nCrypt($_POST["administrador/contrasena"]);
        $_POST["administrador/status"] = 1;

        $info = destripaPost($_POST, "/", "administrador");

        insertarDatos("administrador", $info["campos"]["administrador"], $info["valores"]["administrador"]);

        $nombre = $_POST["administrador/nombre"];

        correoNuevoUsuario($_POST["administrador/correo"], $_POST["administrador/nombre_usuario"], nDCrypt($_POST["administrador/contrasena"]));

        $mensaje = "Administrador(a) agregado correctamente: " . $_POST["administrador/nombre"] . ", " . $_POST["administrador/nombre_usuario"] . "&notification_type=check";
    } else {
        $mensaje = "Error al ingresar administrador(a), existe alguno otro con el mismo nombre de usuario o correo: " . $_POST["administrador/nombre"] . ", " . $_POST["administrador/nombre_usuario"] . "&notification_type=cross";
    }

    header("Location:administradores.php?notification=$mensaje");
} else {
    header("Location:index.php?notification=No se recibio ningun POST :(");
}
