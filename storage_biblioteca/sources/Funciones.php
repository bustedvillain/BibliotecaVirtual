<?php

include("config.php");

/**
 * Descomprime un archivo zip y despues lo borra
 * @param type $nombreArchivo
 */
function descomprimeZIP($nombreArchivo, $destino) {
    $zip = new ZipArchive();
    chmod($nombreArchivo, 0777);

    if ($zip->open($nombreArchivo)) {
//        echo "<br>Se abrio el zip";
        if ($zip->extractTo($destino)) {
//            echo "<br>Se extrajo el zip";
            if ($zip->close()) {
//                echo "<br>Se cerro correctamente";
//                echo '<br>Todo Ok.';
                //Elimina el .zip
                unlink($nombreArchivo);
            } else {
//                echo "<br>Error al cerrar";
            }
        } else {
//            echo "<br>Error al descomprimir el zip";
        }
    } else {
        echo 'Error al abrir el zip';
    }
}

/**
 * Funcion que elimina todos los contenidos dentro de una carpeta
 * @param type $destino
 * @return int
 */
function vaciarCarpeta($destino) {
    $dir = $destino;
    $ficheroseliminados = 0;
    $handle = opendir($dir);
    while ($file = readdir($handle)) {
        if (is_file($dir . $file)) {
            if (chmod($dir . $file, 0777)) {
                if (unlink($dir . $file)) {
                    $ficheroseliminados++;
                }
            }
        }
    }
    return $ficheroseliminados;
}

/**
 * Funcion que elimina un directorio
 * @param type $carpeta
 */
function eliminarDir($carpeta) {
    foreach (glob($carpeta . "/*") as $archivos_carpeta) {
//        echo $archivos_carpeta;

        if (is_dir($archivos_carpeta)) {
            eliminarDir($archivos_carpeta);
        } else {
            unlink($archivos_carpeta);
        }
    }

    rmdir($carpeta);
}

/**
 * Cambiar el nombre del arhivo por uno unico mas un titulo deseado
 * @param type $nombreArchivo
 * @param type $tituloArchivo
 * @return string
 */
function cambiarNombre() {
    return substr(md5(uniqid(rand())), 0, 10);
}

?>
