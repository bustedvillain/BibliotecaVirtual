<?php
include("../sources/funciones.php");
/* 
 * Autor: José Manue Nieto Gómez
 * Fecha de Creación: 3 de Noviembre de 2014
 * Objetivo: Controlador que recibe peticiones JSON
 */

if($_POST){
    switch($_POST["funcion"]){
        case "valorarLibro":
            echo valoraLibroJSON($_POST["id_usuario"], $_POST["id_libro"], $_POST["valoracion"]);
            break;
        case "agregarEstante":
            echo agregarRemoverEstanteJSON($_POST["id_usuario"], $_POST["id_libro"]);
            break;
        case "consultaValoracion":
            echo consultaValoracionJSON($_POST["id_usuario"], $_POST["id_libro"]);
            break;
        case "buscar":
            echo buscarJSON($_POST["palabra"], $_SESSION["usuario"]->id_nivel_educativo);
    }
}else{
    echo "Error, no hay post";
}
    