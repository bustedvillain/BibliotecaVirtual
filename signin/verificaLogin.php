<?php
include("../sources/funciones.php");
/* 
 * Autor: José Manuel Nieto Gómez
 * Fecha de Creación: 28 de Octubre de 2014
 * Objetivo: Recibe petición para realizar login
 */

if($_POST){
    $correo = __($_POST["correo"]);
    $pass = __($_POST["pass"]);
    $recordarme = $_POST["recordarme"];
    echo json_encode(iniciarSesion($correo, $pass, $recordarme));
}

