<?php
/**
 * Autor: José Manuel Nieto Gómez
 * Fecha de Creación: 16/10/2014
 * Objetivo: Configuración Inicial
 */

/**
 * Configuracion de base de datos
 */
//Configuracion de Base de datos
define("DB_NAME","biblioteca_virtual");
define("USER","biblioteca");
define("PASS","ems20140825");
define("HOST","200.66.87.58");
define("PORT","5432");

define ("IP_SERVER_PUBLIC",'http://200.66.87.58');

//define("BASE", "C:\Bitnami\wappstack-5.4.32-0\apache2\htdocs\\");
define("BASE_STORAGE", IP_SERVER_PUBLIC . "/" . "storage_biblioteca". "/");
define("CUENTA_CORREO", "biblioteca_vitual@metaspace.com");


define("VERSION", "v0.8.1");

$extensionesPermitidas = array ("pdf", "PDF");

?>
