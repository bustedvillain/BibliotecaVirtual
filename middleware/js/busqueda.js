/* 
 * Autor: José Manuel Nieto Gómez
 * Fecha de Creación: 4 de noviembre de 2014
 * Objetivo: Script para manipular las busquedas
 */

$(document).ready(function () {
    $("body").on("input", "#search", function (e) {
       // buscar();
    });

    $("body").on("click", ".libro", function () {
        var id_libro = $(this).attr("id");
        $.fancybox({
            minHeight: "100%",
            'type': 'iframe',
            "href": "detalleLibro.php?id_libro=" + id_libro
        });
    });

    $("form").submit(function (e) {
        e.preventDefault();
        buscar();        
    });

    function buscar() {
        if ($("#search").val() != "") {
            $("#searchbox").animate({"margin-top": "10px"}, 500);
            $("#resultados").html("<div class='loader'><span></span><span></span><span></span><br>Buscando...</div>");

            $.post("../sources/Controlador.Middleware.php", {funcion: "buscar", palabra: $("#search").val()}, function (respuesta) {
                if (respuesta) {
                    var responseJSON = $.parseJSON(respuesta);
                    if (responseJSON) {
                        console.log(responseJSON);
                        $("#resultados").html("");
                        var html = "";
                        html = '<table class="zebra">'
                                + '<thead>'
                                + '<tr>'
                                + '<th>#</th>'
                                + '<th>Portada</th>'
                                + '<th>Nombre</th>'
                                + '<th>Autor</th>'
                                + '<th>Editorial</th>'
                                + '<th>Clasificación</th>'
                                + '<th>Año</th>'
                                + '<th>Tipo de Libro</th>'
                                + '</tr>'
                                + '</thead>'
                                + '<tfoot>'
                                + '<tr>'
                                + '<th>#</th>'
                                + '<th>Portada</th>'
                                + '<th>Nombre</th>'
                                + '<th>Autor</th>'
                                + '<th>Editorial</th>'
                                + '<th>Clasificación</th>'
                                + '<th>Año</th>'
                                + '<th>Tipo de Libro</th>'
                                + '</tr>'
                                + '</tfoot>    '
                                + '<tbody>';

                        for (var i = 0; i < responseJSON.length; i++) {
                            var tipo_libro = "";
                            if (responseJSON[i].tipo_libro == "0") {
                                tipo_libro = "Gratuito";
                            } else {
                                tipo_libro = "Pago";
                            }
                            html += '<tr style="cursor:pointer;" class="libro" id="' + responseJSON[i].id_libro + '">'
                                    + '<td>' + responseJSON[i].id_libro + '</td>'
                                    + '<td><img src="' + responseJSON[i].imagen + '" class="img-rounded"></td>'
                                    + '<td>' + responseJSON[i].nombre_libro + '</td>'
                                    + '<td>' + responseJSON[i].nombre_autor + '</td>'
                                    + '<td>' + responseJSON[i].nombre_editorial + '</td>'
                                    + '<td>' + responseJSON[i].nombre_clase + '</td>'
                                    + '<td>' + responseJSON[i].anio + '</td>'
                                    + '<td>' + tipo_libro + '</td>'
                                    + '</tr>';
                        }
                        html += "</tbody></table>";
                        $("#resultados").html(html);
                    } else {
                        $("#resultados").html("<h2>No se encontraron resultados.</h2>");
                        $("#searchbox").animate({"margin-top": "100px"}, 500);
                    }
                } else {
                    $("#resultados").html("<h2>No se encontraron resultados.</h2>");
                    $("#searchbox").animate({"margin-top": "100px"}, 500);
                }
            });
        } else {
            $("#searchbox").animate({"margin-top": "100px"}, 500);
            $("#resultados").html("");
        }
    }
});


