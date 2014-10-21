/* 
 * Autor: José Manuel Nieto Gómez
 * Fecha de Creación: 16/10/2014
 * Objetivo: Archivo de funcionalidad jQuery para la Biblioteca Virtual
 */

$(document).ready(function () {
    debug = true;

    //Encoder
    Encoder.EncodeType = "entity";

    //Datatables
    $('.datatable').DataTable({
        "language": {
            "sLengthMenu": "Mostrando _MENU_ registros por tabla",
            "sZeroRecords": "No se encuentran registros",
            "sInfo": "Mostrando de _START_ al _END_ de _TOTAL_ totales",
            "sInfoEmpty": "",
            "sInfoFiltered": "(filtrado de _MAX_ registros totales)",
            "sSearch": "Buscar:",
            "oPaginate": {
                "sNext": "Siguiente",
                "sPrevious": "Anterior"
            },
            "aaSorting": [[2, "desc"]]
        }
    });

    //Notificacion
    if (mensaje_notificacion != '') {
        notificacion(mensaje_notificacion, notification_type);
    }

    function notificacion(mensaje, tipo) {

        setTimeout(function () {
            var message = "";
            if (tipo !== undefined) {
                if (tipo === "check") {
                    message = '<div class="ns-thumb"><img src="../img/check.png" width="66" /></div><div class="ns-content"><p>' + mensaje + '.</p></div>';
                } else {
                    message = '<div class="ns-thumb"><img src="../img/cross.png" width="66" /></div><div class="ns-content"><p>' + mensaje + '.</p></div>';
                }
            } else {

            }
            // create the notification
            var notification = new NotificationFx({
                message: message,
                layout: 'other',
                ttl: 6000,
                effect: 'thumbslider',
                type: 'notice', // notice, warning, error or success
                onClose: function () {
                    //bttn.disabled = false;
                }
            });

            // show the notification
            notification.show();

        }, 1200);
    }

    $(".invisible").hide();

    $(".editaAtributo").click(function (event) {
        var id = $(this).attr("id");
        var nombre_atributo = $(this).attr("nombre_atributo");
        var entidad = $(this).attr("entidad");
        var id_nombre = $(this).attr("id_nombre");

        debugConsole("Getting idAtributo:" + id);
        $.post("../sources/ControladorAdmin.php", {consulta: "consultaAtributo", id: id, nombre_atributo: nombre_atributo, entidad: entidad, id_nombre: id_nombre}, function (respuesta) {
            debugConsole(respuesta);
            var atributo = jQuery.parseJSON(respuesta);
            $("#editaAtributo").val(Encoder.htmlDecode(atributo.nombre_atributo));
            $("#idAtributo").val(atributo.id_atributo);            
        });
    });

    function debugConsole(mensaje) {
        if (debug === true) {
            console.log(mensaje);
        }
    }

    //Clipboard copy
    var client = new ZeroClipboard($(".copy-clipboard"));

    client.on('ready', function (event) {
        console.log("Ready to copy!");
        client.on('aftercopy', function (event) {
            console.log('Copied text to clipboard: ' + event.data['text/plain']);
            notificacion("Token de acceso copiado al portapapeles: " + event.data['text/plain'], "check");
        });
    });

    //Instancias
    $(".editaInstancia").click(function (event) {
        debugConsole("Editar instancia");
        var id = $(this).attr("id");

        $.post("../sources/ControladorAdmin.php", {consulta: "consultaInstancia", id: id}, function (respuesta) {
            debugConsole(respuesta);
            var atributo = jQuery.parseJSON(respuesta);
            debugConsole(Encoder.htmlDecode(atributo[0].nombre_instancia));
            $("#editaAtributo").val(Encoder.htmlDecode(atributo[0].nombre_instancia));
            $("#id_instancia").val(id);
        });
    });


});



