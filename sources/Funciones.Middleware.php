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
function validarToken($token) {
    $token = __($token);
    $query = new Query();
    $query->sql = "SELECT id_instancia FROM instancia WHERE token = '$token'";

    $token = $query->select();

    if ($token) {
        foreach ($token as $t) {
            return $t->id_instancia;
        }
    } else {
        return false;
    }
}

/**
 * Funcion que valida la existencia del nivel educativo
 * @param type $idNivel
 * @return boolean
 */
function validaNivelEducativo($idNivel) {
    $query = new Query();
    $query->sql = "SELECT id_nivel_educativo FROM nivel_educativo WHERE id_nivel_educativo = $idNivel";

    $nivel = $query->select();

    if ($nivel) {
        foreach ($nivel as $n) {
            return $n->id_nivel_educativo;
        }
    } else {
        return false;
    }
}

/**
 * Funcion que valida el acceso de un ausuario y retorna sus datos relacionados
 * @param type $idUsuario
 * @param type $idInstancia
 * @param type $idNivel
 * @return type
 */
function validaUsuario($idUsuario, $idInstancia, $idNivel) {
    $query = new Query();
    $query->sql = <<<sql
            SELECT id_usuario, id_instancia, id_nivel_educativo, id_usuario_instancia 
              FROM usuarios 
             WHERE id_nivel_educativo = $idNivel
               and id_instancia = $idInstancia
               and id_usuario_instancia = $idUsuario            
sql;

    $usuario = $query->select();

    if ($usuario) {
        foreach ($usuario as $u) {
            return $u;
        }
    } else {
        return crearUsuario($idUsuario, $idInstancia, $idNivel);
    }
}

/**
 * Funcion que registra la primer entrada de un usuario
 * @param type $idUsuario
 * @param type $idInstancia
 * @param type $idNivel
 * @return boolean
 */
function crearUsuario($idUsuario, $idInstancia, $idNivel) {
    $query = new Query();
    $query->insert("usuarios", "id_usuario_instancia, id_instancia, id_nivel_educativo", "$idUsuario, $idInstancia, $idNivel");
    $id = $query->ultimoID("usuarios");

    if (isset($id)) {
        return $id;
    } else {
        return false;
    }
}

/**
 * Registra entrada de usuario al sistema
 * @param type $idUsuario
 */
function registrarVisita($idUsuario) {
    $query = new Query();
    $query->insert("accesos", "fecha, id_usuario", "now(), $idUsuario");
}

/**
 * Funcion que recibe un arreglo de libros y los imprime en html
 * @param type $libros
 */
function imprimeLibros($libros) {
    if (isset($libros)) {
        foreach ($libros as $libro) {
            echo <<<libro
                <!-- START SLIDE -->
                    <section>
                        <ul id="bk-list" class="bk-list clearfix belizehole">
                            <li>
                                <div class="bk-book book-1 bk-bookdefault bk-bookview">
                                    <div class="bk-front">
                                        <div class="bk-cover" style="background-image: url($libro->imagen); background-size: 100% 100%;">
                                            
                                        </div>
                                        <div class="bk-cover-back"></div>
                                    </div>
                                    <div class="bk-page">
                                        <div class="bk-content bk-content-current">
                                            $libro->descripcion
                                            <div class="hover-effect h-style " style="height: 30px; position: absolute; bottom: 5px; background-image: url(images/ver_mas.png); background-size: 100% 100%;">
                                                <a class="fancybox fancybox.iframe" href="detalleLibro.php?id_libro=$libro->id_libro">
                                                    <!--<img src="images/ver_mas.png" class="clean-img">-->
                                                    <div class="mask"><i class="icon-search"></i>
                                                        <span class="img-rollover"></span>
                                                    </div>
                                                </a>
                                            </div>
                                        </div>                                        
                                    </div>
                                    <div class="bk-right"></div>
                                    <div class="bk-left" style="background-image: url($libro->imagen); background-size: 100% 100%;">
                                        <h2>
                                            <span>por $libro->nombre_autor</span>              
                                        </h2>
                                    </div>
                                    <div class="bk-top"></div>
                                    <div class="bk-bottom"></div>
                                </div>
                            </li>
                        </ul>
                    </section>
                    <!-- END SLIDE -->
libro;
        }
    }
}

/**
 * Funcion que retorna libros gratuitos ordenados por fecha de más reciente a más antiguo
 * @param type $nivel
 * @return type
 */
function consultaLibrosGratuitos($nivel = NULL, $imprime = NULL, $limit = 10) {
    $extraWhere = "";
    if (isset($nivel)) {
        $extraWhere = "and l.id_nivel_educativo = $nivel";
    }
    $query = new Query();
    $query->sql = <<<sql
         SELECT l.id_libro,
                l.nombre_libro,
                l.descripcion,
                l.imagen, 
                l.url_archivo,
                l.id_nivel_educativo,
                n.nombre_nivel,
                l.id_autor,
                a.nombre_autor,
                l.id_editorial,
                e.nombre_editorial,
                l.id_clase,
                c.nombre_clase,
                fecha_inclusion,
                l.id_administrador,
                admin.nombre,
                l.anio
          FROM  libro l, 
                nivel_educativo n,
                editorial e,
                clase c,
                autor a,
                administrador admin
          WHERE l.id_nivel_educativo = n.id_nivel_educativo
            and l.id_autor = a.id_autor
            and l.id_editorial = e.id_editorial
            and l.id_clase = c.id_clase
            and l.id_administrador = admin.id_administrador
            and l.status = 1
            and l.tipo_libro = 0
                $extraWhere
       ORDER BY l.fecha_inclusion desc 
          LIMIT $limit
sql;

    $resultados = $query->select();

    if ($resultados) {
        if (isset($imprime)) {
            imprimeLibros($resultados);
        } else {
            return $resultados;
        }
        return $resultados;
    } else {
        return null;
    }
}

/**
 * Funcion que consulta los libros mas buscados mas los libros mas agregados a estantes
 * @param type $nivel
 * @param type $imprime
 * @param type $limit
 * @return type
 */
function consultaLibrosDestacados($nivel = NULL, $imprime = NULL, $limit = 10) {
    $extraWhere = "";
    if (isset($nivel)) {
        $extraWhere = "and l.id_nivel_educativo = $nivel";
    }
    $query = new Query();
    $query->sql = <<<sql
         SELECT l.id_libro,
                l.nombre_libro,
                l.descripcion,
                l.imagen, 
                l.url_archivo,
                l.id_nivel_educativo,
                n.nombre_nivel,
                l.id_autor,
                a.nombre_autor,
                l.id_editorial,
                e.nombre_editorial,
                l.id_clase,
                c.nombre_clase,
                fecha_inclusion,
                l.id_administrador,
                admin.nombre,
                l.anio
          FROM  libro l, 
                nivel_educativo n,
                editorial e,
                clase c,
                autor a,
                administrador admin
          WHERE l.id_nivel_educativo = n.id_nivel_educativo
            and l.id_autor = a.id_autor
            and l.id_editorial = e.id_editorial
            and l.id_clase = c.id_clase
            and l.id_administrador = admin.id_administrador
            and l.status = 1
            and (l.id_libro in (
                SELECT l2.id_libro
                FROM busquedas b, libro l2 
                WHERE l2.id_libro = b.id_libro 
                GROUP BY l2.id_libro 
                ORDER BY count(*) desc
            )
            or l.id_libro in(
                SELECT l3.id_libro
                from estante e, libro l3 
                where l3.id_libro = e.id_libro 
                group by l3.id_libro 
                order by count(*) desc
            )
            or l.id_libro in(
                SELECT l4.id_libro
                from libro l4 
                where l4.tipo_libro = 1
                order by l4.fecha_inclusion desc
            ))  
            $extraWhere
            LIMIT $limit
            
sql;

    $resultados = $query->select();

    if ($resultados) {
        if (isset($imprime)) {
            imprimeLibros($resultados);
        } else {
            return $resultados;
        }
        return $resultados;
    } else {
        return null;
    }
}

/**
 * Funcion que ingresa una nueva valoracion a cierto libro de usuario
 * Si ya existe una valoracion previa, actualiza la valoracion
 * @param type $idUsuario
 * @param type $idLibro
 * @param type $valoracion
 */
function valoraLibro($idUsuario, $idLibro, $valoracion) {
    if (($valoracionBD = consultaValoracion($idUsuario, $idLibro)) != null) {
        $query = new Query();
        $idValoracion = $valoracionBD->id_valoracion;
        $query->sql = "UPDATE valoracion SET valoracion = $valoracion WHERE id_valoracion = $idValoracion";
        $query->update($query->sql);
        return true;
    } else {
        $query = new Query();
        $query->insert("valoracion", "valoracion, id_libro, id_usuario", "$valoracion, $idLibro, $idUsuario");
        return true;
    }
}

/**
 * Funcion que ingresa una nueva valoracion a cierto libro de usuario
 * Si ya existe una valoracion previa, actualiza la valoracion
 * Y retorna el resultado en un objeto JSON
 * @param type $idUsuario
 * @param type $idLibro
 * @param type $valoracion
 * @return type
 */
function valoraLibroJSON($idUsuario, $idLibro, $valoracion) {
    return json_encode(valoraLibro($idUsuario, $idLibro, $valoracion));
}

/**
 * Funcion que consulta la valoracion de un usuario en un libro y retorna el registro 
 * en un objeto.
 * Si no existe retorna un nulo.
 * @param type $idUsuario
 * @param type $idLibro
 * @return type
 */
function consultaValoracion($idUsuario, $idLibro) {
    $query = new Query();
    $query->sql = "SELECT id_valoracion, valoracion FROM valoracion WHERE id_libro = $idLibro and id_usuario = $idUsuario";

    $resultado = $query->select();

    if ($resultado) {
        foreach ($resultado as $r) {
            return $r;
        }
    } else {
        return null;
    }
}

/**
 * Funcion que consulta la valoración de un usuario en un libro y retorna
 * la respueta en un objeto
 * Si no existe retorna nulo en un arreglo JSON
 * @param type $idUsuario
 * @param type $idLibro
 * @return type
 */
function consultaValoracionJSON($idUsuario, $idLibro) {
    return json_encode(consultaValoracion($idUsuario, $idLibro));
}

/**
 * Funcion que agrega o remueve un libro a un instante
 * @param type $idUsuario
 * @param type $idLibro
 * @return string
 */
function agregarRemoverEstante($idUsuario, $idLibro) {
    if (($libro = consultaEstanteLibro($idUsuario, $idLibro)) != null) {
        $query = new Query();
        $idEstante = $libro->id_estante;
        $query->delete("estante", "id_estante = $idEstante");
        return "removido";
    } else {
        $query = new Query();
        $query->insert("estante", "id_libro, id_usuario", "$idLibro, $idUsuario");
        return "agregado";
    }
}

/**
 * Funcion que agrega o remueve un libro a un estante y devuelve la respuesta
 * de lo hecho en una variable JSON
 * @param type $idUsuario
 * @param type $idLibro
 * @return type
 */
function agregarRemoverEstanteJSON($idUsuario, $idLibro) {
    return json_encode(agregarRemoverEstante($idUsuario, $idLibro));
}

/**
 * Funcion que consulta si un libro esta agregado a un estante
 * @param type $idUsuario
 * @param type $idLibro
 * @return type
 */
function consultaEstanteLibro($idUsuario, $idLibro) {
    $query = new Query();
    $query->sql = "SELECT id_estante FROM estante WHERE id_libro = $idLibro and id_usuario = $idUsuario";
    $resultado = $query->select();

    if ($resultado) {
        foreach ($resultado as $r) {
            return $r;
        }
    } else {
        return null;
    }
}

/**
 * Funcion que imprime HTML en el estante
 * @param type $idUsuario
 */
function mostrarEstante($idUsuario) {
    $cantLibros = 0;
    $estantes = 0;
    if (($libros = consultaEstante($idUsuario)) != null) {
        echo '<ul id="bk-list" class="bk-list">';
        foreach ($libros as $libro) {
            $cantLibros++;
            echo <<<li
                <li>
                <a class="fancybox fancybox.iframe" href="detalleLibro.php?id_libro=$libro->id_libro&live_update=yes">
                <div class="bk-book book-1 bk-bookdefault">
                    <div class="bk-front">
                        <div class="bk-cover" style="background-image: url($libro->imagen); background-size: 100% 100%;">
                            
                        </div>
                        <div class="bk-cover-back"></div>
                    </div>
                    <div class="bk-right"></div>
                    <div class="bk-left" style="background-image: url($libro->imagen); background-size: 100% 100%;">
                        <h2>
                            <span>por $libro->nombre_autor</span>
                        </h2>
                    </div>
                    <div class="bk-top"></div>
                    <div class="bk-bottom"></div>
                </div>
                </a>
            </li>
li;
        }

        echo "</ul>";
        $estantes = round($cantLibros / 2);
    }
    $i = 0;
    do {
        echo <<<div
                <div class="shelf">       
                    <div class="bookend_left"></div>   
                    <div class="bookend_right"></div>
                    <div class="reflection"></div>
                </div>
div;
        $i++;
    } while ($i < $estantes);
}

/**
 * Funcion que consulta todos los libros en el estante de un usuario
 * @param type $idUsuario
 * @return type
 */
function consultaEstante($idUsuario) {
    $query = new Query();
    $query->sql = <<<sql
            SELECT e.id_libro,
                   l.descripcion,
                   l.imagen,
                   l.nombre_libro,
                   a.nombre_autor
              FROM estante e,
                   libro l,
                   autor a
             WHERE id_usuario = $idUsuario
               and l.id_libro = e.id_libro
               and l.status = 1
               and l.id_autor = a.id_autor
sql;
    $resultados = $query->select();

    if ($resultados) {
        return $resultados;
    } else {
        return null;
    }
}

/**
 * Funcion que recibe un parametro de busqueda y consulta entre
 * nombre de libro, descripcion de libro, nombre de autor, nombre de clase, nombre de
 * @param type $palabraClave
 * @param type $nivelEducativo
 * @param type $limit
 * @param type $offset
 * @return type
 */
function buscar($palabraClave, $nivelEducativo = NULL, $limit = NULL, $offset = 0) {
    $palabraClave = strtolower(__($palabraClave));
    $palabraClave = str_replace(" ", "%", $palabraClave);
    $query = new Query();
    $whereNivel = "";
    if (isset($nivelEducativo)) {
        $whereNivel = "and l.id_nivel_educativo = $nivelEducativo";
    }
    $whereLimit = "";
    if (isset($limit)) {
        $limit = " LIMIT $limit";
    }
    $query->sql = <<<sql
            SELECT l.id_libro,
                   l.nombre_libro,
                   l.tipo_libro,
                   l.imagen,
                   l.anio,
                   a.nombre_autor,
                   c.nombre_clase,
                   e.nombre_editorial               
              FROM libro l, 
                   autor a,
                   clase c,
                   editorial e,
                   nivel_educativo ne
            WHERE (lower(l.nombre_libro) like '%$palabraClave%'
                or lower(l.descripcion) like '%$palabraClave%'
                or lower(to_char(l.anio, '9999')) like '%$palabraClave%'
                or lower(a.nombre_autor) like '%$palabraClave%'
                or lower(c.nombre_clase) like '%$palabraClave%'
                or lower(e.nombre_editorial) like '%$palabraClave%')
            and l.status = 1
            and a.status = 1
            and e.status = 1
            and c.status = 1
            and ne.status = 1
            and l.id_autor = a.id_autor
            and l.id_clase = c.id_clase
            and l.id_editorial = e.id_editorial
            and l.id_nivel_educativo = ne.id_nivel_educativo
            $whereNivel
            $whereLimit
            OFFSET $offset
           
sql;

    $resultados = $query->select();
    registraBusquedas($resultados);

    return $resultados;
}

/**
 * Funcion que recibe un parametro de busqueda y consulta entre
 * nombre de libro, descripcion de libro, nombre de autor, nombre de clase, nombre de editorial
 * Retorna lo consultado en un objeto JSON
 * @param type $palabraClave
 * @param type $nivelEducativo
 * @param type $limit
 * @param type $offset
 * @return type
 */
function buscarJSON($palabraClave, $nivelEducativo = NULL, $limit = NULL, $offset = 0) {
    return json_encode(buscar($palabraClave, $nivelEducativo, $limit, $offset));
}

/**
 * Funcion que registra los resultados de una busqueda
 * @param type $resultados
 */
function registraBusquedas($resultados) {
    if ($resultados) {
        $query = new Query();            
        foreach ($resultados as $res) {
            $query->insert("busquedas", "id_libro, id_usuario, fecha", $res->id_libro . ", " . $_SESSION["usuario"]->id_usuario . ", now()");
        }
    }
}

/**
 * Funcion que registra las lecturas de un libro gratuito
 * @param type $idLibro
 * @param type $idUsuario
 */
function registrarLectura($idLibro, $idUsuario){
    $query = new Query();
        $query->insert("lecturas", "id_libro, id_usuario", "$idLibro, $idUsuario");
}
