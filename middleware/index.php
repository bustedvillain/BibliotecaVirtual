<?php

include("../sources/funciones.php");
/*
 * Autor: José Manuel Nieto Gómez
 * Fecha de Creación: 28 de Octubre de 2014
 * Objetivo: Middeware que conecta a MetaSpace con la Bibioteca Virtual
 */
unset($_SESSION["usuario"]);
if ($_GET) {
    if (isset($_GET["token"])) {
        if (isset($_GET["id_usuario"])) {
            if (isset($_GET["nivel_educativo"])) {
                $token = $_GET["token"];
                $id_usuario = $_GET["id_usuario"];
                $nivel = $_GET["nivel_educativo"];
                //Validar Instancia
                if(($id_instancia = validarToken($token)) !== false){
                    //Validar Nivel educativo
                    if(($id_nivel = validaNivelEducativo($nivel)) !== false){
                        //Validar Usuario
                        if(($id_usuario_biblioteca = validaUsuario($id_usuario, $id_instancia, $id_nivel)) !== false){
                            //Todo OK
                            $_SESSION["usuario"]=$id_usuario_biblioteca;
                            header("Location:navegacion.php");
                        }else{
                            header("Location:error.php?type=7");
                        }
                    }else{
                        header("Location:error.php?type=6");
                    }
                }else{
                    header("Location:error.php?type=5");
                }                
            } else {
                header("Location:error.php?type=4");
            }
        } else {
            header("Location:error.php?type=3");
        }
    } else {
        header("Location:error.php?type=2");
    }
} else {
    header("Location:error.php?type=1");
}

