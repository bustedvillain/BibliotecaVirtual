<?php

/* 
 * Autor: José Manuel Nieto Gómez
 * Fecha de Creación: 22 de Octubre de 2014
 * Objetivo: Librería de funciones para manipulación de libros
 */

/**
 * Funcion que consulta 1 o muchos libros
 * @param type $id
 * @return type
 */
function consultaLibros($id = NULL){
    $query = new Query();
    $opcional = "";
    if(isset($id)){
        $opcional = " and l.id_libro = $id";
    }
    $query->sql = <<<sql
            SELECT l.id_libro, 
                   l.nombre_libro,
                   l.tipo_libro,
                   l.descripcion,
                   l.imagen,
                   l.url_archivo,
                   l.anio,
                   n.nombre_nivel,
                   n.id_nivel_educativo,
                   a.nombre_autor,
                   a.id_autor,
                   e.nombre_editorial,
                   e.id_editorial,
                   c.nombre_clase,
                   c.id_clase,
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
              $opcional
              ORDER BY l.id_libro
sql;
    
    $libros = $query->select();
    
    if($libros){
        return $libros;
    }else{
        return null;
    }       
    
    
   }
   
   /**
    * Funcion que consulta 1 o muchos libros y lo retorna en una arreglo JSON
    * @param type $id
    * @return type
    */
   function consultaLibrosJSON($id = NULL){
       return json_encode(consultaLibros($id));
   }
   
   /**
    * Funcion que construye la tabla de libros
    */
   function construyeLibros(){
       $libros = consultaLibros();
       
       if($libros){
        foreach($libros as $libro){
            if($libro->tipo_libro == "0"){
                //Gratuito
                $tipo_libro = "Gratuito";
            }else if($libro->tipo_libro == "1"){
                //Paga
                $tipo_libro = "Paga";
            }
            echo  <<<fila
                <tr>
                    <td>
                        <button title="Ver Detalles" id="$libro->id_libro" class="btn btn-info btn-sm verLibro" data-toggle="modal" data-target="#ver"><span class="glyphicon glyphicon-search"></span> </button>
                        <button title="Editar Libro" id="$libro->id_libro" class="btn btn-info btn-sm editarLibro" data-toggle="modal" data-target="#editar"><span class="glyphicon glyphicon-edit"></span> </button>
                        <a title="Eliminar Libro" href="borrarLibro.php?id=$libro->id_libro&nombre=$libro->nombre_libro" class="btn btn-danger btn-sm" onClick="return confirm('¿Está seguro?');"><span class="glyphicon glyphicon-remove" ></span> </a>
                        <a title="Ver Libro" href="$libro->url_archivo" target="top" class="btn btn-danger btn-sm"><span class="glyphicon glyphicon-book" ></span> </a>
                    </th>
                    <td>$libro->id_libro</th>                                
                    <td><img class='img-rounded' height="60" src="$libro->imagen"></th>
                    <td>$libro->nombre_libro</th>  
                    <td>$libro->nombre_autor</th>
                    <td>$libro->nombre_editorial</th>
                    <td>$libro->nombre_clase</th>
                    <td>$libro->nombre_nivel</th>
                    <td>$tipo_libro</th>
                </tr>
fila;
           
        }
    }
   }
   
   /**
    * Verifica si es necesario eliminar un libro definitivamente
    * @param type $nombre
    */   
   function verificaEliminacionLibro($nombre){
       if(($id = consultaExistenciaParametro("nombre_libro", $nombre, false, "id_libro", "libro"))!= null){
           $query = new Query();
           $query->delete("libro", "id_libro = $id");
       }
   }




