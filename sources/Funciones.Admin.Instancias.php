<?php

/*
 * Autor: José Manuel Nieto Gómez
 * Fecha de Creación: 20 de Octubre de 2014
 * Objetivo: Librería de funciones para gestión de instancias conectadas a la biblioteca central
 */

/**
 * Funcion que genera un token de acceso irrepetible
 * @return type
 */
function generarToken() {
    return substr(md5(uniqid(rand())), 0, 16);
}

/**
 * Función que ingresa una nueva instancia a la base de datos
 * @param type $nombre
 * @return boolean
 */
function guardaInstancia($nombre) {
    $token = generarToken();

    if (!reactivarAtributo($nombre, "instancia", "id_instancia", "nombre_instancia")) {
        if (validaInsercionAtributo($nombre, "instancia", "id_instancia", "nombre_instancia")) {
            $query2 = new Query();
            $query2->insert("instancia", "nombre_instancia, token, status", "'$nombre', '$token', 1");
            return true;
        } else {
            return false;
        }
    } else {
        return true;
    }
}

/**
 * Funcion que consulta 1 o varias instancias y retorna los registros obtenidos
 * @param type $id
 * @return type
 */
function consultaInstancias($id = NULL) {
    if (isset($id)) {
        $query = new Query();
        $query->sql = "SELECT id_instancia, nombre_instancia, token FROM instancia WHERE id_instancia = $id and status = 1";
        return $query->select();
    } else {
        $query = new Query();
        $query->sql = "SELECT id_instancia, nombre_instancia, token FROM instancia WHERE status = 1 ORDER BY id_instancia";
        return $query->select();
    }
}

/**
 * Funcion que consuta 1 o varias instancias y retorna el resultado de la consulta en un arreglo JSON
 * @param type $id
 * @return type
 */
function consultaInstanciasJSON($id = NULL) {
    return json_encode(consultaInstancias($id));
}

/**
 * Función que construye tabla html para presentar consulta de instancia
 */
function construyeTablaInstancias() {
    $instancias = consultaInstancias();

    if ($instancias) {
        foreach ($instancias as $instancia) {
            $nombreInstancia = $instancia->nombre_instancia;
            $id = $instancia->id_instancia;
            echo <<<linea
                <tr>
                    <td>
                        <button id="$id" class="btn btn-info btn-sm editaInstancia" data-toggle="modal" data-target="#editar"><span class="glyphicon glyphicon-edit"></span> Editar</button>
                        <a href="borrarInstancia.php?id=$id&nombre=$nombreInstancia" class="btn btn-danger btn-sm" onClick="return confirm('¿Está seguro?');"><span class="glyphicon glyphicon-remove" ></span> Borrar</a>
                    </td>
                    <td>$id</td>
                    <td>$nombreInstancia</td>
                    <td>$instancia->token <button class="btn btn-info btn-sm copy-clipboard" data-clipboard-text="$instancia->token" title="Copiar al portapapeles">Copiar</button></td>
                </tr>
linea;
        }
    }
}

/**
 * Función que actualiza el valor de una instancia.
 * @param type $idInstancia
 * @param type $nombreInstancia
 * @param type $actualizaToken
 * @return boolean
 */
function actualizaInstancia($idInstancia, $nombreInstancia, $actualizaToken) {
    $nombreInstancia = __($nombreInstancia);

    if (validaInsercionAtributo($nombreInstancia, "instancia", "id_instancia", "nombre_instancia", $idInstancia)) {
        echo "Se editara atributo | ";
        if (isset($actualizaToken)) {
            $token = generarToken();
            $query = new Query();
            $query->sql = "UPDATE instancia set nombre_instancia = '$nombreInstancia', token = '$token' where id_instancia = $idInstancia";
            $query->update($query->sql);
            return true;
        } else {
            actualiza($idInstancia, $nombreInstancia, "instancia", "nombre_instancia", "id_instancia");
            return true;
        }
    } else {
        return false;
    }
}
