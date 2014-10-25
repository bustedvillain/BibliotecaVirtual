<?php

/* 
 * Autor: José Manuel Nieto Gómez
 * Fecha de Creación: 22 de Octubre de 2014
 * Objetivo: Librería de funciones para manipulación de libros
 */

function consultaLibros(){
    $query = new Query();
    $query->sql = <<<sql
            SELECT l.id_libro, 
                   l.nombre_libro,
                   l.tipo_libro,
                   l.descripcion,
                   l.imagen,
                   l.url_archivo,
                   n.nombre_nivel,
                   a.nombre_autor,
                   e.nombre_editorial,
                   c.nombre_clase,
                   l.fecha_inclusion,
                   admin.nombre
            FROM   libro l, nivel_educativo n, autor a, editorial e, clase c, administrador admin
            WHERE l.id_nivel_educativo = n.id_nivel_educativo
              and l.id_autor = a.id_autor
              and l.id_editorial = e.id_editorial
              and l.id_clase = c.id_clase
              and l.id_administrador = admin.id_administrador
              and l.status = 1
              and a.status = 1
              and e.status = 1
              and c.status = 1  
              ORDER BY l.id_libro
              
sql;
    
    $libros = $query->select();
    
    if($libros){
        foreach($libros as $libro){
            echo  <<<fila
                <tr>
                    <td>
                    
                    </th>
                    <td>$libro->id_libro</th>                                
                    <td><img class='img-rounded' height="60" src="$libro->imagen"></th>
                    <td>$libro->nombre_libro</th>  
                    <td>$libro->nombre_autor</th>
                    <td>$libro->nombre_editorial</th>
                    <td>$libro->nombre_clase</th>
                    <td>$libro->nombre_nivel</th>
                </tr>
fila;
           
        }
    }
   }




