<?php

/* 
 * Autor: José Manuel Nieto Gómez
 * Fecha de Creación: 28 de Octubre de 2014
 * Objetivo: Librería de funciones para manejar la administración de la interfaz de la biblioteca.
 */

/**
 * Funcion que vaida el token de acceso y retorna e id de instancia
 * @param type $token
 * @return boolean
 */
function validarToken($token){
    $token=__($token);
    $query = new Query();
    $query->sql = "SELECT id_instancia FROM instancia WHERE token = '$token'";
    
    $token = $query->select();
    
    if($token){
        foreach($token as $t){
            return $t->id_instancia;
        }
    }else{
        return false;
    }
}

/**
 * Funcion que valida la existencia del nivel educativo
 * @param type $idNivel
 * @return boolean
 */
function validaNivelEducativo($idNivel){
    $query = new Query();
    $query->sql = "SELECT id_nivel_educativo FROM nivel_educativo WHERE id_nivel_educativo = $idNivel";
    
    $nivel = $query->select();
    
    if($nivel){
        foreach($nivel as $n){
            return $n->id_nivel_educativo;
        }
    }else{
        return false;
    }
}

function validaUsuario($idUsuario, $idInstancia, $idNivel){
    $query = new Query();
    $query->sql = <<<sql
            SELECT id_usuario 
              FROM usuarios 
             WHERE id_nivel_educativo = $idNivel
               and id_instancia = $idInstancia
               and id_usuario_instancia = $idUsuario            
sql;
    
    $usuario = $query->select();
    
    if($usuario){
        foreach($usuario as $u){
            return $u->id_usuario;
        }
    }else{
        return crearUsuario($idUsuario, $idInstancia, $idNivel);
    }
}

function crearUsuario($idUsuario, $idInstancia, $idNivel){
    $query = new Query();
    $query->insert("usuarios", "id_usuario_instancia, id_instancia, id_nivel_educativo", "$idUsuario, $idInstancia, $idNivel");
    $id = $query->ultimoID("usuarios");
    
    if(isset($id)){
        return $id;
    }else{
        return false;
    }
}
        



