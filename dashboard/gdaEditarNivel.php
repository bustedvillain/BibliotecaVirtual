<?php

/*
 * Autor: José Manuel Nieto Gómez
 * Fecha de Creación: 27/10/2014
 * Objetivo: Script que edita un nivel educativo, junto con la configuración de colores para la interfaz alumno
 */

include("../sources/funciones.php");
var_dump($_POST);
if ($_POST) {
    $nombre_nivel = $_POST["nivel_educativo/nombre_nivel"];
    if (editaNivel($_POST["id_nivel_educativo"], $_POST["nivel_educativo/nombre_nivel"], $_POST["nivel_educativo/color1"], $_POST["nivel_educativo/color2"])) {
        $mensaje = "Nivel educativo editado correctamente: $nombre_nivel&notification_type=check";
    } else {
        $mensaje = "Error al editar nivel educativo, existe alguno otro con el mismo nombre";
    }
    echo $mensaje;
    header("Location:niveles.php?notification=$mensaje");
} else {
    header("Location:index.php?notification=No se recibio ningun POST :(");
}

