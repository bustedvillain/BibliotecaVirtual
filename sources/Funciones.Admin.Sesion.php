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
function iniciarSesion($usuarioCorreo, $pass, $recordarme){
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
    
    if($administrador){
        foreach($administrador as $admin){
            $_SESSION["administrador"] = $admin;
            
            if($recordarme == "true"){
                setcookie("administrador", $admin, time() + (86400 * 30), "/");
            }
            return $admin;
        }
    }else{
        return false;
    }
}

function verificaSesion(){
    if(!isset($_SESSION["administrador"])){
        exit('<META http-equiv="refresh" content="0;URL=../signin/?event=1">');
    }
}

