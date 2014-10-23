<?php

include("../sources/funciones.php");
/*
 * Autor: José Manuel Nieto Gómez
 * Fecha de Creación: 22 de Octubre de 2014
 * Objetivo: Script que recibe una petición para editar a un administrador
 */

if ($_POST) {
    if (isset($_POST["cambiarContrasena"])) {
        if (isset($_POST["contrasenaAutomatica"])) {
            $_POST["administrador/contrasena"] = nCrypt(generarToken());
        } else {
            $_POST["administrador/contrasena"] = nCrypt($_POST["administrador/contrasena"]);
        }
    }

    $idAdmin = $_POST["id_administrador"];
    $info = destripaPostEdicion($_POST, "/", "administrador");
    var_dump($info);

    if (validaInsercionAtributo($_POST["administrador/nombre_usuario"], "administrador", "id_administrador", "nombre_usuario", $idAdmin) && validaInsercionAtributo($_POST["administrador/correo"], "administrador", "id_administrador", "correo", $idAdmin)) {
        editaDatos("administrador", $info["administrador"], "id_administrador = $idAdmin");

        $mensaje = "Administrador(a) editado correctamente: " . $_POST["administrador/nombre"] . ", " . $_POST["administrador/nombre_usuario"] . "&notification_type=check";
    } else {
        $mensaje = "Error al editar administrador(a), existe alguno otro con el mismo nombre de usuario o correo: " . $_POST["administrador/nombre"] . ", " . $_POST["administrador/nombre_usuario"] . "&notification_type=cross";
    }

    header("Location:administradores.php?notification=$mensaje");
} else {
    header("Location:index.php?notification=No se recibio ningun POST :(");
}

