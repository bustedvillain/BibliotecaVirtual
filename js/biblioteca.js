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
//    var client = new ZeroClipboard($(".copy-clipboard"));
//
//    client.on('ready', function (event) {
//        console.log("Ready to copy!");
//        client.on('aftercopy', function (event) {
//            console.log('Copied text to clipboard: ' + event.data['text/plain']);
//            notificacion("Token de acceso copiado al portapapeles: " + event.data['text/plain'], "check");
//        });
//    });

    // Specify where the Flash movie can be found if not in root folder for web site
    ZeroClipboard.config({moviePath: '../libs/zeroclipboard/ZeroClipboard.swf'});

    var client = new ZeroClipboard($(".copy-clipboard"));

    client.on('load', function (client) {
        console.log("ZeroClipboard loaded");
        client.on('datarequested', function (client) {
            var text = "Texto copiado!";
            client.setText(text);
        });

        // callback triggered on successful copying
        client.on('complete', function (client, args) {
            console.log("Text copied to clipboard: \n" + args.text);
            notificacion("Token de acceso copiado al portapapeles: " + args.text, "check");
        });
    });

// In case of error - such as Flash not being available
    client.on('wrongflash noflash', function () {
        ZeroClipboard.destroy();
        notificacion("Token de acceso no copiado al portapapeles: " + args.text, "cross");
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

    var contrasenaAutomatica = true;
    $("#contrasenaAutomatica").click(function (event) {
        contrasenaAutomatica = !contrasenaAutomatica;
        validaMostrarCamposContrasena();
    });

    validaMostrarCamposContrasena();
    function validaMostrarCamposContrasena() {
        if (contrasenaAutomatica) {
            $("#password").removeAttr("disabled");
        } else {
            $("#password").attr("disabled", "enabled");
        }
    }

    "use strict";
    var options = {};
    options.ui = {
        container: "#pwd-container",
        showVerdictsInsideProgressBar: true,
        viewports: {
            progress: ".pwstrength_viewport_progress"
        }
    };
    options.common = {
        debug: true,
        onLoad: function () {
            $('#messages').text('Empiece a introducir la contraseña');
        }
    };
    try {
        $(':password').pwstrength(options);
    } catch (e) {
        console.error("No se cargo la librería pwstrenght:" + e);
    }

    var cambiarContrasena = false; //No se quiere cambiar
    $("#cambiarContrasena").change(function () {
        cambiarContrasena = !cambiarContrasena;
        validaMostrarCamposContrasenaEditar();
        debugConsole("cambiarContrasena:" + cambiarContrasena);
    });

    validaMostrarCamposContrasenaEditar();
    function validaMostrarCamposContrasenaEditar() {
        if (cambiarContrasena) {
            $("#editaPassword").removeAttr("disabled");
            $("#checkCambAutomPass").show("fast");
        } else {
            $("#editaPassword").attr("disabled", "enabled");
            $("#checkCambAutomPass").hide("fast");
        }
    }

    var contrasenaAutomaticaEditar = true;
    $("#contrasenaAutomaticaEditar").change(function (event) {
        contrasenaAutomaticaEditar = !contrasenaAutomaticaEditar;
        validaMostrarCamposContrasenaAutomEdit();
        debugConsole("contrasenaAutomaticaEditar:" + contrasenaAutomaticaEditar);
    });

    $("#checkCambAutomPass").hide();

    function validaMostrarCamposContrasenaAutomEdit() {
        if (contrasenaAutomaticaEditar) {
            $("#editaPassword").removeAttr("disabled");
        } else {
            $("#editaPassword").attr("disabled", "enabled");
        }
    }

    $(".editaAdmin").click(function () {
        debugConsole("Editar Admin");
        var id = $(this).attr("id");
        $.post("../sources/ControladorAdmin.php", {consulta: "consultaAdmin", id: id}, function (respuesta) {
            var atributo = jQuery.parseJSON(respuesta);
            debugConsole(atributo);
            $("#editaNombre").val(Encoder.htmlDecode(atributo[0].nombre));
            $("#editaNombreUsuario").val(Encoder.htmlDecode(atributo[0].nombre_usuario));
            $("#editaCorreo").val(Encoder.htmlDecode(atributo[0].correo));
            $("#id_administrador").val(id);
        });
    });

    $("#tipo-libro").change(function () {
        if ($(this).val() === "0") {
            $("#url-externa").hide("fast");
            $("#libro-gratuito").show("fast");
        } else {
            $("#url-externa").show("fast");
            $("#libro-gratuito").hide("fast");
        }
    });
    $("#tipo-libro").change();

    /**
     * Función que convierte el input de una imagen en base64
     * @param {type} files
     * @param {type} callback
     * @returns {undefined}
     */
    function imageToBase64URL(files, callback) {
        var filesSelected = files
        if (filesSelected.length > 0) {
            var fileToLoad = filesSelected[0];
            var fileReader = new FileReader();
            fileReader.onload = function (fileLoadedEvent) {
                codigoImagen = fileLoadedEvent.target.result; // <--- data: base64
                callback(codigoImagen);
            }
            fileReader.readAsDataURL(fileToLoad);
        }
    }

    $("#input-imagen").change(function () {
        imageToBase64URL($(this)["context"].files, function (imgBase64) {
            $("#muestra-imagen").html("<center><img class='img-rounded' src='"+imgBase64+"' width='50%'/></center>");
            $("#imagen-base64").val(imgBase64);
        });
    });

});



