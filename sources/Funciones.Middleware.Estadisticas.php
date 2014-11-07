<?php

/*
 * Autor: José Manuel Nieto Gómez
 * Fecha de Creación: Jueves 6 de Noviembre de 2014
 * Objetivo: Librería de funciones que realizarán consultas estadísticas
 */

function estadisticaUsuariosPorInstancia() {
    $query = new Query();
    $query->sql = <<<sql
            SELECT i.nombre_instancia as "Instancia",
                (SELECT count(*) 
                FROM usuarios u
                WHERE u.id_instancia = i.id_instancia
                ) as "Usuarios"
            FROM instancia i
            WHERE i.status = 1
sql;
    
    $data = $query->select();
    return $data;
}

function estadisticaUsuariosPorInstanciaJSON(){
    return json_encode(estadisticaUsuariosPorInstancia());
}

function estadisticaVisitasInstancia(){
    $query = new Query();
    $query->sql = <<<sql
            SELECT i.nombre_instancia as "Instancia",
                (SELECT count(*) 
                 FROM usuarios u, accesos a
                 WHERE u.id_instancia = i.id_instancia
                   and a.id_usuario = u.id_usuario
                ) as "Usuarios"
            FROM instancia i
            WHERE i.status = 1      
sql;
    
    $data = $query->select();
    return $data;
}

function estadisticaVisitasInstanciaJSON(){
    return json_encode(estadisticaVisitasInstancia());
}

function estadisticaLibrosNivelEducativo(){
    $query = new Query();
    $query->sql = <<<sql
            SELECT n.nombre_nivel as "NivelEducativo",
                (SELECT count(*) 
                 FROM libro l
                 WHERE l.id_nivel_educativo = n.id_nivel_educativo
                   and l.status = 1
                ) as "Libros"
            FROM nivel_educativo n
            WHERE n.status = 1
            ORDER BY id_nivel_educativo      
sql;
    
    $data = $query->select();
    return $data;
}

function estadisticaLibrosNivelEducativoJSON(){
    return json_encode(estadisticaLibrosNivelEducativo());
}

function estadisticaLibrosCategoria(){
    $query = new Query();
    $query->sql = <<<sql
            SELECT c.nombre_clase as "Categoria",
                (SELECT count(*) 
                 FROM libro l
                 WHERE l.id_clase = c.id_clase
                   and l.status = 1
                ) as "Libros"
            FROM clase c
            WHERE c.status = 1      
sql;
    
    $data = $query->select();
    return $data;
}

function estadisticaLibrosCategoriaJSON(){
    return json_encode(estadisticaLibrosCategoria());
}

function estadisticaMasBuscados(){
    $query = new Query();
    $query->sql = <<<sql
            SELECT l.nombre_libro as "Libros",
                (SELECT count(*) 
                 FROM busquedas b
                 WHERE b.id_libro = l.id_libro
                ) as "Busquedas"
            FROM libro l
            WHERE l.status = 1
            ORDER BY "Busquedas" desc
            LIMIT 12    
sql;
    
    $data = $query->select();
    return $data;
}

function estadisticaMasBuscadosJSON(){
    return json_encode(estadisticaMasBuscados());
}

function estadisticaMasLeidos(){
    $query = new Query();
    $query->sql = <<<sql
            SELECT l.nombre_libro as "Libros",
                (SELECT count(*) 
                 FROM lecturas le
                 WHERE le.id_libro = l.id_libro
                ) as "Lecturas"
            FROM libro l
            WHERE l.status = 1
            ORDER BY "Lecturas" desc
            LIMIT 12    
sql;
    
    $data = $query->select();
    return $data;
}

function estadisticaMasLeidosJSON(){
    return json_encode(estadisticaMasLeidos());
}

function estadisticaMasEstante(){
    $query = new Query();
    $query->sql = <<<sql
            SELECT l.nombre_libro as "Libros",
                (SELECT count(*) 
                 FROM estante e
                 WHERE e.id_libro = l.id_libro
                ) as "Estante"
            FROM libro l
            WHERE l.status = 1
            ORDER BY "Estante" desc
            LIMIT 12  
sql;
    
    $data = $query->select();
    return $data;
}

function estadisticaMasEstanteJSON(){
    return json_encode(estadisticaMasEstante());
}

function estadisticaMejorValoracion(){
    $query = new Query();
    $query->sql = <<<sql
            SELECT l.nombre_libro as "Libros",
                (SELECT count(*) 
                 FROM valoracion v
                 WHERE v.id_libro = l.id_libro
                  and v.valoracion = 1
                ) as "1Estrellas",
                (SELECT count(*) 
                 FROM valoracion v
                 WHERE v.id_libro = l.id_libro
                  and v.valoracion = 2
                ) as "2Estrellas",
                (SELECT count(*) 
                 FROM valoracion v
                 WHERE v.id_libro = l.id_libro
                  and v.valoracion = 3
                ) as "3Estrellas",
                (SELECT count(*) 
                 FROM valoracion v
                 WHERE v.id_libro = l.id_libro
                  and v.valoracion = 4
                ) as "4Estrellas",
                (SELECT count(*) 
                 FROM valoracion v
                 WHERE v.id_libro = l.id_libro
                  and v.valoracion = 5
                ) as "5Estrellas"    
            FROM libro l
            WHERE l.status = 1
            ORDER BY "5Estrellas" desc, 
                     "4Estrellas" desc, 
                     "3Estrellas" desc,
                     "2Estrellas" desc,
                     "1Estrellas" desc
            LIMIT 6              
sql;
    
    $data = $query->select();
    return $data;
}

function estadisticaMejorValoracionJSON(){
    return json_encode(estadisticaMejorValoracion());
}