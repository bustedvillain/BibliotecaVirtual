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
        $query->sql = "SELECT id_administrador, nombre, nombre_usuario, correo FROM administrador WHERE status = 1";
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

function construyeTablaAdministradores() {
    $usuarios = consultaUsuario();

    if (isset($usuarios)) {
        foreach (consultaUsuario() as $usuario) {
            $nombreAdmin = $usuario->nombre;
            $id= $usuario->id_administrador;
            $correo = $usuario->correo;
            echo <<<linea
                <tr>
                    <td>
                        <button id="$id" class="btn btn-info btn-sm editaAdmin" data-toggle="modal" data-target="#editar"><span class="glyphicon glyphicon-edit"></span> Editar</button>
                        <a href="borrarAdmin.php?id=$id&nombre=$nombreAdmin" class="btn btn-danger btn-sm" onClick="return confirm('¿Está seguro?');"><span class="glyphicon glyphicon-remove" ></span> Borrar</a>
                    </td>
                    <td>$id</td>
                    <td>$nombreAdmin</td>
                    <td>$correo</td>
                </tr>
linea;
        }
    }
}
