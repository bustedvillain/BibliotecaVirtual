<?php

/**
 * Autor: José Manuel Nieto Gómez
 * Fecha de Creación: Viernes 24 de Octubre de 2014
 * Objetivo: Script que recibe una petición para almacenar un archivo siendo enviado desde CURL
 */
include("sources/Funciones.php");
if ($_POST && $_FILES) {
//    var_dump($_POST);
//    echo "<br>";
//    var_dump($_FILES);

    $destino = $_POST["destino"];
    
    
    //Verifica que exista el directorio donde se quiere guardar
    if (!file_exists($destino)) {
        if (mkdir($destino, 0777)) {
//        echo "<br>Directorio Creado";
            //Modifica permisos
            if (chmod($destino, 0777)) {
//        echo "<br>Destino modificado";
            } else {
                echo "<br>Error al modificar directorio";
            }
        } else {
            echo "<br>Error al crear directorio para el destino";
        }
    }
    
    //Copia archivo
    
    $destinoArchivo = $destino . "/" . cambiarNombre();
//    echo "<br>Destino:$destino";
    if (move_uploaded_file($_FILES["archivo"]["tmp_name"], $destinoArchivo)) {
//        echo "<br>Archivo copiado correctamente";
        //Descomprime Zip
        //descomprimeZIP(realpath($destinoArchivo), $destino);
    } else {
        echo "<br>Error al copiar archivo";
    }



    echo $destinoArchivo;
} else {
    exit("Error, no hay post & files");
}
?>