/* 
 * Autor: José Manuel Nieto Gómez
 * Fecha de Creación: 29 de Octubre de 2014
 * Objetivo: Funcionalidad específica para ver detalles de libro, 
 * abrir link para leer, puntuar, o agregar al estante
 */

$(document).ready(function () {
    $("input").click(function(){
        var valor = $(this).attr("value");
        alert("Valorar:"+valor);
    });
    
    $("#agregarEstante").click(function(){
       var id_usuario = $(this).attr("id_usuario");
       var id_libro = $(this).attr("id_libro");
       
       alert("id_usuario:"+ id_usuario+" id_libro:"+id_libro);
    });
});


