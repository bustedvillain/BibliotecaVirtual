/* 
 * Autor: José Manuel Nieto Gómez
 * Fecha de Creación: 16/10/2014
 * Objetivo: Archivo de funcionalidad jQuery para la Biblioteca Virtual
 */

$(document).ready(function () {

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
            if(tipo != undefined){
                if(tipo == "check"){
                    message = '<div class="ns-thumb"><img src="../img/check.png" width="66" /></div><div class="ns-content"><p>' + mensaje + '.</p></div>';
                }else{
                    message = '<div class="ns-thumb"><img src="../img/cross.png" width="66" /></div><div class="ns-content"><p>' + mensaje + '.</p></div>';
                }
            }else{
                
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


});



