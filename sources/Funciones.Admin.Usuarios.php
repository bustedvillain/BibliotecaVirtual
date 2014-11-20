<?php

/*
 * Autor: José Manuel Nieto Gómez
 * Fecha de Creación: 21 de Octubre de 2014
 * Objetivo: Librería de funciones relacionado a usuarios administrador
 */

/**
 * Enviar correo de bienvenida con claves de acceso a nuevo usuario
 * @param type $correo
 * @param type $nombreUsuario
 * @param type $password
 */
function correoNuevoUsuario($correo, $nombreUsuario, $password) {
    $destinatario = $correo;
    $cuerpo = <<<correo
    <html>
    <head>
    <title>Bienvenido a la Biblioteca Virtual</title>
    </head>
    <body>   
    <h1>Bienvenido a la Biblioteca Virtual</h1>
    <p>Ha sido creada tu nueva cuenta de usuario, tus claves de acceso son las siguientes:</p>
    <ul>
        <li><b>Correo:</b> $correo</li>
        <li><b>Nombre de Usuario:</b> $nombreUsuario</li>
        <li><b>Contrase&ntilde;a:</b> $password</li>
    </ul>
            
    <p>Recuerda que para acceder puedes usar tu correo o nombre de usuario</p>
    
    
    Atentamente <br/>
    <b>Biblioteca Virtual.</b>
    </body>
    </html>
correo;
    $headers = "";
    $headers .= "MIME-Version: 1.0\r\n";
    $headers .= "Content-type: text/html; charset=utf-8\r\n";
    $headers .= "X-Priority: 3\r\n";
    $headers .= "X-Mailer: PHP" . phpversion() . "\r\n";
    $headers .= "Reply-To: " . CUENTA_CORREO . "\r\n";
    $headers .= "From: MetaSpace";

    //Con copia para que no se vea la cadena de correos
//    $headers .="Cc: " . getCorreos() . "\r\n";
//    $correo = new Correo($destinatario,"Bienvenido a MetaSpace", $cuerpo);
//    $correo->enviar();
    if (@!mail($destinatario, "Bienvenido a MetaSpace", $cuerpo, $headers)) {
        echo "No se pudo enviar correo. En este momento";
    }
}

/**
 * Funcion que consulta 1 o varios usuarios administradores
 * @param type $idUsuario
 * @return type
 */
function consultaUsuario($idUsuario = NULL) {
    $query = new Query();
    if (isset($idUsuario)) {
        $query->sql = "SELECT id_administrador, nombre, nombre_usuario, correo FROM administrador WHERE status = 1 and id_administrador = $idUsuario";
    } else {
        $query->sql = "SELECT id_administrador, nombre, nombre_usuario, correo FROM administrador WHERE status = 1 ORDER BY id_administrador";
    }

    $resultados = $query->select();

    if ($resultados) {
        return $resultados;
    } else {
        return NULL;
    }
}

/**
 * Funcion que consulta 1 o varios usuarios y lo retorna en un objeto JSON
 * @param type $idUsuario
 * @return type
 */
function consultaUsuarioJSON($idUsuario = NULL) {
    return json_encode(consultaUsuario($idUsuario));
}

/**
 * Funcion que contruye los registros de consulta de usuari para tabla html
 */
function construyeTablaAdministradores() {
    $usuarios = consultaUsuario();

    if (isset($usuarios)) {
        foreach (consultaUsuario() as $usuario) {
            $nombreAdmin = $usuario->nombre;
            $id = $usuario->id_administrador;
            echo <<<linea
                <tr>
                    <td>
                        <button id="$id" class="btn btn-info btn-sm editaAdmin" data-toggle="modal" data-target="#editar"><span class="glyphicon glyphicon-edit"></span> Editar</button>
                        <a href="borrarAdmin.php?id=$id&nombre=$nombreAdmin" class="btn btn-danger btn-sm" onClick="return confirm('¿Está seguro?');"><span class="glyphicon glyphicon-remove" ></span> Borrar</a>
                    </td>
                    <td>$id</td>
                    <td>$nombreAdmin</td>
                    <td>$usuario->nombre_usuario</td>
                    <td>$usuario->correo</td>
                </tr>
linea;
        }
    }
}

/**
 * Funcion que consulta la existencia de un atributo, ya sea que esté activo o no
 * @param type $parametro
 * @param type $valorParametro
 * @param type $activo
 * @param type $nombreId
 * @param type $tabla
 * @return type
 */
function consultaExistenciaParametro($parametro, $valorParametro, $activo = true, $nombreId = NULL, $tabla = NULL) {
    $query = new Query();

    if (isset($parametro) && isset($valorParametro) && isset($nombreId) && isset($tabla)) {
        if ($activo) {
            $query->sql = "SELECT $nombreId FROM $tabla WHERE upper($parametro) = upper('$valorParametro') and status = 1";
        } else {
            $query->sql = "SELECT $nombreId FROM $tabla WHERE upper($parametro) = upper('$valorParametro') and status = 0";
        }
    } else {
        if ($activo) {
            $query->sql = "SELECT id_administrador FROM administrador WHERE upper($parametro) = upper('$valorParametro') and status = 1";
        } else {
            $query->sql = "SELECT id_administrador FROM administrador WHERE upper($parametro) = upper('$valorParametro') and status = 0";
        }
    }


    $resultados = $query->select();

    if ($resultados) {
        foreach ($resultados as $res) {
            if(isset($nombreId)){
                return $res->id_libro;
            }else{
                return $res->id_administrador;
            }
            
        }
    } else {
        return NULL;
    }
}

/**
 * Funcion que verifica si hay un administrador existente pero eliminado logicamente.
 * Si lo hay lo borra definitivamente.
 * @param type $correo
 * @param type $usuario
 */
function verificaEliminacionUsuario($correo, $usuario) {
    if (($id = consultaExistenciaParametro("nombre_usuario", $usuario, false)) != NULL) {
        $query = new Query();
//        $query->delete("administrador", "id_administrador = $id");
        $query->update("UPDATE administrador set nombre_usuario = nombre_usuario || ' (Perfil desactivado)', correo = correo || ' (Perfil desactivado), nombre = nombre || ' (Perfil desactivado)''  where id_administrador = $id");
    }

    if (($id = consultaExistenciaParametro("correo", $correo, false)) != NULL) {
        $query = new Query();
        $query->delete("administrador", "id_administrador = $id");
    }
}
