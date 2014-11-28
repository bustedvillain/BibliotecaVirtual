<?php

/*
 * Autor: José Manue Nieto Gómez
 * Fecha de Creación: 28 de Octubre de 2014
 * Script para controar las sesiones
 */

/**
 * Funcion que consulta si hay una coincidencia con usuario y contraseña
 * @param type $usuarioCorreo
 * @param type $pass
 * @return boolean
 */
function iniciarSesion($usuarioCorreo, $pass, $recordarme) {
    $query = new Query();
    $pass = nCrypt($pass);
    $query->sql = <<<sql
            SELECT id_administrador, nombre, nombre_usuario, correo 
             FROM administrador 
            WHERE (upper(nombre_usuario) = upper('$usuarioCorreo') 
               or upper(correo) = upper('$usuarioCorreo')) 
              and contrasena = '$pass'
              and status = 1
sql;
    $administrador = $query->select();

    if ($administrador) {
        foreach ($administrador as $admin) {
            $_SESSION["administrador"] = $admin;

            if ($recordarme == "true") {
                setcookie("administrador", $admin->id_administrador, time() + (86400 * 30), "/");
            }
            return $admin;
        }
    } else {
        return false;
    }
}

/**
 * Verifica si hay una sesión de administrador iniciada. Sino también verifica que se recibió un token de acceso, permitiendo
 * un Single-Sign-On desde MetaSpace.
 */
function verificaSesion() {
    if (!isset($_SESSION["administrador"])) {
        //Verifica si se envió un token de acceso
        if (isset($_GET["token"])) {
            $token = $_GET["token"];
            unset($_GET["token"]);
            //Intentar inicio de sesión con token
            if (!iniciarSesion($token, $token, true)) {
                //Si el inicio de sesión es incorrecto. Verifica el token
                if (($id = validarToken($token)) != false) {
                    $instancia = consultaInstancias($id);
                    foreach ($instancia as $i) {
                        $nombre = "Administrador " . $i->nombre_instancia;
                        $nombre_usuario = $token;
                        $correo = $token . "@metaspace.com.mx";
                        $pass = nCrypt($token);
            
                        //Crear usuario
                        verificaEliminacionUsuario($token, $token);
                        insertarDatos("administrador", "nombre, nombre_usuario, correo, status, contrasena", "'$nombre', '$nombre_usuario', '$correo', 1, '$pass'");
                        //Iniciar sesión
                        if(!iniciarSesion($token, $token, true)){
                            //Si hay error, es por que no se pudo insertar el usuario
                            exit('<META http-equiv="refresh" content="0;URL=../signin/?event=2">');
                        }
                    }
                } else {
                    //Token invalido
                    exit('<META http-equiv="refresh" content="0;URL=../signin/?event=1">');
                }
            }
        } else {
            exit('<META http-equiv="refresh" content="0;URL=../signin/?event=1">');
        }        
    }
}
