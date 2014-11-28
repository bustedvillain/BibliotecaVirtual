<?php
include('../sources/funciones.php');
/**
 * Autor: José Manuel Nieto Gómez
 * Fecha de Creación: 28 de Octubre de 2014
 * Objetivo: Cierre de sesión
 */
unset($_COOKIE["administrador"]);
unset($_COOKIE);
setcookie('administrador', null, -1, '/');
session_unset($_SESSION);
session_destroy();
header('Location:../index.php');
?>
