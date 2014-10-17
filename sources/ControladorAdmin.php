<?php include("Funciones.php");
/*
 * Autor: Jose Manuel Nieto Gomez
 * Fecha de Creacion: 17 de Octubre de 2014
 * Realiza consultas retornado resultados en objetos JSON
 */
if($_POST){
    //Consulta que desea realizar
    $entidad = $_POST["entidad"];
    $idAtributo=$_POST["id"];
    $nombre_atributo =$_POST["nombre_atributo"];
    $id_nombre = $_POST["id_nombre"];
    echo buscaAtributoJSON($idAtributo, $entidad, $nombre_atributo, $id_nombre);   
    
}
?>
