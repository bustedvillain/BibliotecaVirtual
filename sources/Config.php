<?php
/**
 * Autor: José Manuel Nieto Gómez
 * Fecha de Creación: 16/10/2014
 * Objetivo: Configuración Inicial
 */

/**
 * Configuracion de base de datos
 */
//Configuracion de Moodle
define("DB_NAME_MOD","softmeta");
define("USER_MOD","softmeta");
define("PASS_MOD","ems20140818");
define("HOST_MOD","192.168.100.150");
define("PORT_MOD","5432");


//Configuracion de Sistema de Gestion
define("DB_NAME_SG","softmeta_sgi");
define("USER_SG","softmeta");
define("PASS_SG","ems20140818");
define("HOST_SG","192.168.100.150");
define("PORT_SG","5432");

define ("IP_SERVER_PUBLIC",'http://192.168.100.150/');

//Confuración de la plantilla
define("UNIDADES_PATH", "/var/www/html/storage/unidades");
define("STORAGE_PATH", "/var/www/html/storage/");
define("MENSAJE_DESBLOQUEO","Tu cuenta ha sido bloqueada durante las siguientes 24 horas. Si deseas desbloquearla antes de éste lapso comunícate con el administrador al correo uncorreo@unservidor.com");
//define("UNIDADES_PATH", "C:/wamp/www/eblue/softmeta/storage/unidades");
//define("UNIDADES_PATH", "../../storage/unidades");

define("RUTA_MOODLE",IP_SERVER_PUBLIC. 'moodle/login/index.php');

define("BASE_STORAGE", IP_SERVER_PUBLIC. "storage/");

define("CUENTA_CORREO", "registro@metaspace.mx");

define("VERSION", "v0.1");

?>
