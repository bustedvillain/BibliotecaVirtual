<?php

/* 
 * Autor: José Manuel Nieto Gómez
 * Fecha de Creación: 27 de Noviembre de 2014
 * Objetivo: Archivo de funciones para gestión de niveles educativos
 */

/**
 * Funcion que inserta un nuevo nivel educativo. Valida si ya existe con 
 * status inactivo y lo reactiva actualizando sus colores.
 * @param type $nombre_nivel
 * @param type $color1
 * @param type $color2
 * @return boolean
 */
function guardaNivel($nombre_nivel, $color1, $color2){
    $nombre_nivel = __($nombre_nivel);
    if(!reactivarAtributo($nombre_nivel, "nivel_educativo", "id_nivel_educativo", "nombre_nivel")){
        if(validaInsercionAtributo($nombre_nivel, "nivel_educativo", "id_nivel_educativo", "nombre_nivel")){
            $query2 = new Query();
            $query2->insert("nivel_educativo", "nombre_nivel, color1, color2, status", "'$nombre_nivel', '$color1', '$color2', 1");
            return true;
        }else{
            return false;
        }
    }else{
        $query3 = new Query();
        $query3->sql = "UPDATE nivel_educativo set color1 = '$color1', color2 = '$color2' where nombre_nivel = '$nombre_nivel'";
        $query3->update($query3->sql);
        return true;
    }
}

function tablaNivelesEducativos(){
    $query = new Query();
    $query->sql = <<<sql
            SELECT id_nivel_educativo, nombre_nivel, color1, color2 
              FROM nivel_educativo 
             WHERE status = 1
             ORDER BY id_nivel_educativo
sql;
    
   $niveles = $query->select();
   
   if($niveles){
       foreach($niveles as $nivel){
           $id = $nivel->id_nivel_educativo;
           $nombre = $nivel->nombre_nivel;
           echo <<<HTML
                <tr>                    
                    <td>
                        <button id="$id" class="btn btn-info btn-sm editaNivel" data-toggle="modal" data-target="#editar"><span class="glyphicon glyphicon-edit"></span> Editar</button>
                        <a href="borrarAtributo.php?id=$id&entidad=nivel_educativo&id_nombre=id_nivel_educativo&atributo=$nombre" class="btn btn-danger btn-sm" onClick="return confirm('¿Está seguro?');"><span class="glyphicon glyphicon-remove" ></span> Borrar</a>
                    </td>
                    <td>$id</td>
                    <td>$nombre</td>
                   <td>$nivel->color1:<div style='width:15px; height: 15px; background-color: $nivel->color1'></div></td>
                   <td>$nivel->color2:<div style='width:15px; height: 15px; background-color: $nivel->color2'></div></td>
                </tr>
HTML;
       }
   }
}

/**
 * Función que consuta un nivel y retorna su objeto
 * @param type $id_nivel
 * @return boolean
 */
function consultaNivel($id_nivel){
    $query = new Query();
    $query->sql = <<<sql
         SELECT nombre_nivel, color1, color2
          FROM nivel_educativo
          WHERE id_nivel_educativo = $id_nivel
sql;
    
    $nivel = $query->select();
    
    if($nivel){
        foreach($nivel as $n){
            return $n;
        }
    }else{
        return false;
    }
}

/**
 * Función que consulta un nivel educativo y lo retorna en un
 * objeto JSON
 * @param type $id_nivel
 * @return type
 */
function consultaNivelJSON($id_nivel){
    return json_encode(consultaNivel($id_nivel));
}

/**
 * Función que actualiza los valores de un nivel educativo.
 * Valida si no hay otro nivel educativo con el nombre deseado
 * @param type $id_nivel
 * @param type $nombre_nivel
 * @param type $color1
 * @param type $color2
 * @return boolean
 */
function editaNivel($id_nivel, $nombre_nivel, $color1, $color2){
    $nombre_nivel = __($nombre_nivel);
    
    if(validaInsercionAtributo($nombre_nivel, "nivel_educativo", "id_nivel_educativo", "nombre_nivel", $id_nivel)){
        $query = new Query();
        $query->sql = <<<sql
             UPDATE nivel_educativo set nombre_nivel = '$nombre_nivel', color1 = '$color1', color2 = '$color2' WHERE id_nivel_educativo = $id_nivel
sql;
        $query->update($query->sql);
        return true;
    }else{
        return false;
    }
}

