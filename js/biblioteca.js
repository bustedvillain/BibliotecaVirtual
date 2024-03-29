/* 
 * Autor: José Manuel Nieto Gómez
 * Fecha de Creación: 16/10/2014
 * Objetivo: Archivo de funcionalidad jQuery para la Biblioteca Virtual
 */

$(document).ready(function () {
    debug = true;

    //Encoder
    try {
        Encoder.EncodeType = "entity";
    } catch (e) {
        console.log("Libreria Encoder no habilitada");
    }

    //Datatables
    try {
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
    } catch (e) {
        console.log("Datatables no habilitado");
    }

    //Notificacion
    try {
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
    } catch (e) {
        console.log("Notificaciones deshabilitadas");
    }

    $(".invisible").hide();
    
    $("body").on("click", ".editaAtributo", function(event){
        loading();
        var id = $(this).attr("id");
        var nombre_atributo = $(this).attr("nombre_atributo");
        var entidad = $(this).attr("entidad");
        var id_nombre = $(this).attr("id_nombre");

        debugConsole("Getting idAtributo:" + id);
        $.post("../sources/ControladorAdmin.php", {consulta: "consultaAtributo", id: id, nombre_atributo: nombre_atributo, entidad: entidad, id_nombre: id_nombre}, function (respuesta) {
            restoreLoading();
            debugConsole(respuesta);
            var atributo = jQuery.parseJSON(respuesta);
            $("#editaAtributo").val(Encoder.htmlDecode(atributo.nombre_atributo));
            $("#idAtributo").val(atributo.id_atributo);
        });
    });
    
    $("body").on("click", ".editaNivel", function(event){
        loading();
        var id = $(this).attr("id");
        
        debugConsole("Getting idAtributo:" + id);
        $.post("../sources/ControladorAdmin.php", {consulta: "consultaNivel", id: id}, function (respuesta) {
            restoreLoading();
            debugConsole(respuesta);
            var atributo = jQuery.parseJSON(respuesta);
            $("#editaNombreNivel").val(Encoder.htmlDecode(atributo.nombre_nivel));
            $("#editaColor1").val(atributo.color1);
            $("#editaColor2").val(atributo.color2);
            $("#id_nivel_educativo").val(id);
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

    try {
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
    } catch (e) {
        console.log("ZeroClipboard no habiitado");
    }

    //Instancias
    $("body").on("click", ".editaInstancia", function(event){
        loading();
        debugConsole("Editar instancia");
        var id = $(this).attr("id");

        $.post("../sources/ControladorAdmin.php", {consulta: "consultaInstancia", id: id}, function (respuesta) {
            restoreLoading();
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
        console.log("No se cargo la librería pwstrenght:" + e);
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
    
    $("body").on("click", ".editaAdmin", function(event){
        loading();
        debugConsole("Editar Admin");
        var id = $(this).attr("id");
        $.post("../sources/ControladorAdmin.php", {consulta: "consultaAdmin", id: id}, function (respuesta) {
            restoreLoading();
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

    $("#edita-tipo-libro").change(function () {
        if ($(this).val() === "0") {
            $("#url-externa2").hide("fast");
            $("#libro-gratuito2").show("fast");
        } else {
            $("#url-externa2").show("fast");
            $("#libro-gratuito2").hide("fast");
        }
    });


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
            $("#muestra-imagen").html("<center><img class='img-rounded' src='" + imgBase64 + "' width='50%'/></center>");
//            $("#imagen-base64").val(imgBase64);
        });
    });

    $("#input-imagen2").change(function () {
        imageToBase64URL($(this)["context"].files, function (imgBase64) {
            $("#muestra-imagen2").html("<center><img class='img-rounded' src='" + imgBase64 + "' width='50%'/></center>");
//            $("#imagen-base64").val(imgBase64);
        });
    });

    $("body").on("click", ".verLibro", function(event){
        console.log("VER LIBROO");
        loading();
        debugConsole("Ver detalles libro:" + $(this).attr("id"));
        var id = $(this).attr("id");
        $.post("../sources/ControladorAdmin.php", {consulta: "consultaLibro", id: id}, function (respuesta) {
            restoreLoading();
            debugConsole(respuesta);
            var atributo = jQuery.parseJSON(respuesta);
            debugConsole(atributo);
            $("#ver-imagen").html("<img width='100%' style='width:100%;' class='img-rounded' src='" + atributo[0].imagen + "'/>");
            $("#ver-nombre").html(Encoder.htmlDecode(atributo[0].nombre_libro));
            $("#ver-descripcion").html(Encoder.htmlDecode(atributo[0].descripcion));
            $("#ver-anio").html(atributo[0].anio);
            $("#ver-autor").html(Encoder.htmlDecode(atributo[0].nombre_autor));
            $("#ver-editorial").html(Encoder.htmlDecode(atributo[0].nombre_editorial));
            $("#ver-clase").html(Encoder.htmlDecode(atributo[0].nombre_clase));
            $("#ver-nivel").html(Encoder.htmlDecode(atributo[0].nombre_nivel));

            if (atributo[0].tipo_libro == "0") {
                //Gratuito
                $("#ver-tipo").html("Gratuito");
            } else if (atributo[0].tipo_libro == "1") {
                //Paga
                $("#ver-tipo").html("Paga");
            }

            $("#ver-fecha").html(atributo[0].fecha_inclusion);
            $("#ver-admin").html(Encoder.htmlDecode(atributo[0].nombre));
            $("#ver-libro").html('<a title="Ver Libro" href="' + atributo[0].url_archivo + '" target="top">Ver Libro </a>');
        });
    });

    $("body").on("click", ".editarLibro", function(event){
        loading();
        debugConsole("Editar libro:" + $(this).attr("id"));
        var id = $(this).attr("id");
        $.post("../sources/ControladorAdmin.php", {consulta: "consultaLibro", id: id}, function (respuesta) {
            restoreLoading();
            debugConsole(respuesta);
            var atributo = jQuery.parseJSON(respuesta);
            debugConsole(atributo);
            $("#edita-nombre-libro").val(Encoder.htmlDecode(atributo[0].nombre_libro));
            $("#edita-descripcion").val(Encoder.htmlDecode(atributo[0].descripcion));
            $("#edita-anio").val(atributo[0].anio);
            $("#edita-autor option[value=" + atributo[0].id_autor + "]").attr("selected", true);
            $("#edita-editorial option[value=" + atributo[0].id_editorial + "]").attr("selected", true);
            $("#edita-clase option[value=" + atributo[0].id_clase + "]").attr("selected", true);
            $("#edita-nivel option[value=" + atributo[0].id_nivel_educativo + "]").attr("selected", true);
            $("#edita-tipo-libro option[value=" + atributo[0].tipo_libro + "]").attr("selected", true);
            $("#edita-tipo-libro").change();
            $("#edita-url-externa").val(atributo[0].url_archivo);
            $("#id_libro").val(id);

        });
    });

    $("form").submit(function () {
        $("button[type=submit]").html("Enviando...");
        $("button").attr("disabled", "disabled");

    });

    $("#guardarLibro").click(function () {
        if ($("#tipo-libro").val() == "1") {
            $("#libro-gratuito").remove();
        }
        if ($("#selecciona-autor").val() != "0") {
            $("#otro-autor").remove();
        }
        if ($("#selecciona-editorial").val() != "0") {
            $("#otra-editorial").remove();
        }
        if ($("#selecciona-clase").val() != "0") {
            $("#otra-clase").remove();
        }
    });

    $("#guardaEdicionLibro").click(function () {
        if ($("#tipo-libro2").val() == "1") {
            $("#libro-gratuito2").remove();
        }
        if ($("#edita-autor").val() != "0") {
            $("#otro-autor2").remove();
        }
        if ($("#edita-editorial").val() != "0") {
            $("#otra-editorial2").remove();
        }
        if ($("#edita-clase").val() != "0") {
            $("#otra-clase2").remove();
        }
    });

    function loading() {
        modalTitle = $(".modal-title").html();
        var loading = '<div class="loader"><span></span><span></span><span></span><br>Cargando datos...</div>';
        $(".modal-title").append(loading);
    }

    function restoreLoading() {
        $(".loader").fadeOut("slow");
    }

    var modalTitle = "";

    $("#otro-autor").hide();
    $("#otra-editorial").hide();
    $("#otra-clase").hide();
    $("#otro-autor2").hide();
    $("#otra-editorial2").hide();
    $("#otra-clase2").hide();

    $("#selecciona-autor").change(function () {
        if ($(this).val() == "0") {
            $("#otro-autor").show("fast");
        } else {
            $("#otro-autor").hide("fast");
        }
    });

    $("#selecciona-editorial").change(function () {
        if ($(this).val() == "0") {
            $("#otra-editorial").show("fast");
        } else {
            $("#otra-editorial").hide("fast");
        }
    });

    $("#selecciona-clase").change(function () {
        if ($(this).val() == "0") {
            $("#otra-clase").show("fast");
        } else {
            $("#otra-clase").hide("fast");
        }
    });

    $("#edita-autor").change(function () {
        if ($(this).val() == "0") {
            $("#otro-autor2").show("fast");
        } else {
            $("#otro-autor2").hide("fast");
        }
    });

    $("#edita-editorial").change(function () {
        if ($(this).val() == "0") {
            $("#otra-editorial2").show("fast");
        } else {
            $("#otra-editorial2").hide("fast");
        }
    });

    $("#edita-clase").change(function () {
        if ($(this).val() == "0") {
            $("#otra-clase2").show("fast");
        } else {
            $("#otra-clase2").hide("fast");
        }
    });

    /**
     * Login
     */
    $("#login").submit(function (event) {
        $("#loading").html('<div class="loader"><span></span><span></span><span></span><br>Iniciando Sesi&oacute;n...</div>');

        var correo = $("#email").val();
        var pass = $("#pass").val();
        var recordarme = $("#recordarme").prop("checked");

        $.post("verificaLogin.php", {correo: correo, pass: pass, recordarme: recordarme}, function (respuesta) {
            respuesta = $.parseJSON(respuesta);
            console.log(respuesta);
            if (respuesta !== false) {
                $("#loading").html('<div class="alert alert-success" role="alert">Bienvenido: ' + respuesta.nombre + ', redireccionando...</div>');
                setTimeout(function () {
                    window.location = "../dashboard/?notification=Bienvenido(a) " + respuesta.nombre + "&notification_type=check";
                }, 1500);
            } else {
                $("#loading").html('<div class="alert alert-danger" role="alert">Credenciales de acceso incorrectas</div>');
                $("#loading").html('<div class="alert alert-danger" role="alert">Credenciales de acceso incorrectas</div>');
                $("button[type=submit]").html("Iniciar Sesi&oacute;n");
                $("button").removeAttr("disabled");
            }
        });

        event.preventDefault();
    });

    /**
     * Login
     */
    
});





