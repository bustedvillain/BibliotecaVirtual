/* 
 * Autor: José Manuel Nieto Gómez
 * Fecha de Creación: 29 de Octubre de 2014
 * Objetivo: Funcionalidad específica para ver detalles de libro, 
 * abrir link para leer, puntuar, o agregar al estante
 */

$(document).ready(function () {

    var idUsuario = $("#id_usuario").val();
    var idLibro = $("#id_libro").val();

    establecerRating(idLibro, idUsuario);

    function establecerRating(idLibro, idUsuario) {
        $.post("../sources/Controlador.Middleware.php", {funcion: "consultaValoracion", id_usuario: idUsuario, id_libro: idLibro}, function (respuesta) {
            console.log(respuesta);
            if (respuesta) {
                var responseJSON = $.parseJSON(respuesta);
                if (responseJSON) {
                    console.log(responseJSON);
                    $("#val" + responseJSON.valoracion).prop("checked", true);
                } else {
                    console.log("No hay valoracion previa");
                }
            }
        })
    }
    $("input").click(function () {
        var valor = $(this).attr("value");


        $.post("../sources/Controlador.Middleware.php", {funcion: "valorarLibro", id_usuario: idUsuario, id_libro: idLibro, valoracion: valor}, function (respuesta) {
            console.log(respuesta);
            if (respuesta) {
                var responseJSON = $.parseJSON(respuesta);
                if (responseJSON) {
                    notificacion("Valoración guardada correctamente");
                } else {
                    notificacion("Error al guardar calificacion 2");
                }
            } else {
                notificacion("Error al guardar calificacion 1");
            }
        });
    });

    $("#agregarEstante").click(function () {

        $.post("../sources/Controlador.Middleware.php", {funcion: "agregarEstante", id_usuario: idUsuario, id_libro: idLibro}, function (respuesta) {
            console.log(respuesta);
            if (respuesta) {
                var responseJSON = $.parseJSON(respuesta);
                console.log(responseJSON);
                if (responseJSON) {
                    if (responseJSON === "agregado") {
                        notificacion("Libro agregado al estante");
                        $("#agregarEstante").html("Remover de mi estante");
                    } else if (responseJSON === "removido") {
                        notificacion("Libro removido del estante");
                        if (live_update) {
                            try {
                                parent.location.reload();
                            } catch (e) {
                                console.error(e);
                            }
                        }
                        $("#agregarEstante").html("Agregar a mi estante");
                    } else {
                        notificacion("Error desconocido");
                    }
                } else {
                    notificacion("No se pudo cambiar el estatus del libro en el estante");
                }
            } else {

            }
        });
    });

//    Notificaciones
    try {
        function notificacion(mensaje) {
            // create the notification

            var svgshape = document.getElementById('notification-shape');
            var notification = new NotificationFx({
                wrapper: svgshape,
                message: '<h2 style="margin-top:0;">' + mensaje + '</h2>',
                layout: 'other',
                effect: 'loadingcircle',
                ttl: 9000,
                type: 'notice', // notice, warning or error
                onClose: function () {
//                bttn.disabled = false;
                }
            });

            // show the notification
            notification.show();

        }
    } catch (e) {
        console.error("Error en notificacion:" + e);
    }
    
    
    $("#leer").click(function(){
       $.post("../sources/ControladorAdmin.php", {consulta:"registraLectura", id_usuario: idUsuario, id_libro:idLibro}, function(){
          console.log("Lectura registrada");
       }); 
    });
});


