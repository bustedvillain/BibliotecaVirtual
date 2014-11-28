<?php

include("funciones.php");
/*
 * Autor: Jose Manuel Nieto Gomez
 * Fecha de Creacion: 17 de Octubre de 2014
 * Realiza consultas retornado resultados en objetos JSON
 */
if ($_POST) {
    //Consulta que desea realizar
    switch ($_POST["consulta"]) {
        case "consultaAtributo":
            $entidad = $_POST["entidad"];
            $idAtributo = $_POST["id"];
            $nombre_atributo = $_POST["nombre_atributo"];
            $id_nombre = $_POST["id_nombre"];
            echo buscaAtributoJSON($idAtributo, $entidad, $nombre_atributo, $id_nombre);
            break;
        case "consultaInstancia":
            $id = $_POST["id"];
            echo consultaInstanciasJSON($id);
            break;
        case "consultaAdmin":
            $id = $_POST["id"];
            echo consultaUsuarioJSON($id);
            break;
        case "consultaLibro":
            $id = $_POST["id"];
            echo consultaLibrosJSON($id);
            break;
        case "consultaNivel":
            $id = $_POST["id"];
            echo consultaNivelJSON($id);
            break;
        case "registraLectura":
            registrarLectura($_POST["id_libro"], $_POST["id_usuario"]);
            break;
        //Estadisticas
        case "estadisticaInstancias":
            echo estadisticaUsuariosPorInstanciaJSON();
            break;
        case "estadisticaVisitasInstancia":
            echo estadisticaVisitasInstanciaJSON();
            break;
        case "estadisticaLibrosNivelEducativo":
            echo estadisticaLibrosNivelEducativoJSON();
            break;
        case "estadisticaLibrosCategoria":
            echo estadisticaLibrosCategoriaJSON();
            break;
        case "estadisticaMasBuscados":
            echo estadisticaMasBuscadosJSON();
            break;
        case "estadisticaMasLeidos":
            echo estadisticaMasLeidosJSON();
            break;
        case "estadisticaMasEstante":
            echo estadisticaMasEstanteJSON();
            break;
        case "estadisticaMejorValoracion":
            echo estadisticaMejorValoracionJSON();
            break;
    }
}
?>
