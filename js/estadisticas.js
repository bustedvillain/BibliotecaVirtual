/* 
 * Autor: José Manuel Nieto Gómez
 * Fecha de creación: Jueves 6 de noviembre de 2014
 * Objetivo: Funciones para la generación de estadísticas
 */

$(document).ready(function () {
    //Estadisticas
    $.post("../sources/ControladorAdmin.php", {consulta: "estadisticaInstancias"}, function (respuesta) {
        console.log(respuesta);
        if (respuesta) {
            var responseJSON = $.parseJSON(respuesta);
            console.log(responseJSON);

            //Limpiar caracteres
            for (var i = 0; i < responseJSON.length; i++) {
                responseJSON[i].Instancia = Encoder.htmlDecode(responseJSON[i].Instancia);
            }

            var chart;
            var legend;

            var chartData = responseJSON;

            console.log("Antes del ready");
//            AmCharts.ready(function () {
            console.log("AmCharts is ready");
            // PIE CHART
            chart = new AmCharts.AmPieChart();
            chart.dataProvider = chartData;
            chart.titleField = "Instancia";
            chart.valueField = "Usuarios";
            chart.outlineColor = "#FFFFFF";
            chart.outlineAlpha = 0.8;
            chart.outlineThickness = 2;

            // WRITE
            $("#estadistica1").html("");
            chart.write("estadistica1");
//            });
        } else {
            console.error("No hay estadisticas por instancia");
        }
    });

    $.post("../sources/ControladorAdmin.php", {consulta: "estadisticaVisitasInstancia"}, function (respuesta) {
        console.log(respuesta);
        if (respuesta) {
            var responseJSON = $.parseJSON(respuesta);
            console.log(responseJSON);

            //Limpiar caracteres
            for (var i = 0; i < responseJSON.length; i++) {
                responseJSON[i].Instancia = Encoder.htmlDecode(responseJSON[i].Instancia);
            }

            var chart;
            var legend;

            var chartData = responseJSON;

            console.log("Antes del ready");
//            AmCharts.ready(function () {
            console.log("AmCharts is ready");
            // PIE CHART
            chart = new AmCharts.AmPieChart();
            chart.dataProvider = chartData;
            chart.titleField = "Instancia";
            chart.valueField = "Usuarios";
            chart.outlineColor = "#FFFFFF";
            chart.outlineAlpha = 0.8;
            chart.outlineThickness = 2;

            // WRITE
            $("#estadistica2").html("");
            chart.write("estadistica2");
//            });
        } else {
            console.error("No hay estadisticas por instancia");
        }
    });

    $.post("../sources/ControladorAdmin.php", {consulta: "estadisticaLibrosNivelEducativo"}, function (respuesta) {
        console.log(respuesta);
        if (respuesta) {
            var responseJSON = $.parseJSON(respuesta);
            console.log(responseJSON);

            //Limpiar caracteres
            for (var i = 0; i < responseJSON.length; i++) {
                responseJSON[i].NivelEducativo = Encoder.htmlDecode(responseJSON[i].NivelEducativo);
            }

            var chart;
            var legend;

            var chartData = responseJSON;

            console.log("Antes del ready");
//            AmCharts.ready(function () {
            console.log("AmCharts is ready");
            // PIE CHART
            chart = new AmCharts.AmPieChart();
            chart.dataProvider = chartData;
            chart.titleField = "NivelEducativo";
            chart.valueField = "Libros";
            chart.outlineColor = "#FFFFFF";
            chart.outlineAlpha = 0.8;
            chart.outlineThickness = 2;

            // WRITE
            $("#estadistica3").html("");
            chart.write("estadistica3");
//            });
        } else {
            console.error("No hay estadisticas por instancia");
        }
    });

    $.post("../sources/ControladorAdmin.php", {consulta: "estadisticaLibrosCategoria"}, function (respuesta) {
        console.log(respuesta);
        if (respuesta) {
            var responseJSON = $.parseJSON(respuesta);
            console.log(responseJSON);

            //Limpiar caracteres
            for (var i = 0; i < responseJSON.length; i++) {
                responseJSON[i].Categoria = Encoder.htmlDecode(responseJSON[i].Categoria);
            }

            var chart;
            var legend;

            var chartData = responseJSON;

            console.log("Antes del ready");
//            AmCharts.ready(function () {
            console.log("AmCharts is ready");
            // PIE CHART
            chart = new AmCharts.AmPieChart();
            chart.dataProvider = chartData;
            chart.titleField = "Categoria";
            chart.valueField = "Libros";
            chart.outlineColor = "#FFFFFF";
            chart.outlineAlpha = 0.8;
            chart.outlineThickness = 2;

            // WRITE
            $("#estadistica4").html("");
            chart.write("estadistica4");
//            });
        } else {
            console.error("No hay estadisticas por instancia");
        }
    });

    $.post("../sources/ControladorAdmin.php", {consulta: "estadisticaMasBuscados"}, function (respuesta) {
        console.log(respuesta);
        if (respuesta) {
            var responseJSON = $.parseJSON(respuesta);
            console.log(responseJSON);

            //Limpiar caracteres
            for (var i = 0; i < responseJSON.length; i++) {
                responseJSON[i].Libros = Encoder.htmlDecode(responseJSON[i].Libros);
                var color = getColor();
                responseJSON[i].color = color;
            }
            console.log("tratamiento");
            console.log(responseJSON);

            var chart;
            var legend;

            var chartData = responseJSON;

            console.log("Antes del ready");
//            AmCharts.ready(function () {
            console.log("AmCharts is ready");
            // SERIAL CHART
            chart = new AmCharts.AmSerialChart();
            chart.dataProvider = chartData;
            chart.categoryField = "Libros";
            chart.startDuration = 1;
            chart.depth3D = 50;
            chart.angle = 30;
            chart.marginRight = -45;

            // AXES
            // category
            var categoryAxis = chart.categoryAxis;
            categoryAxis.gridAlpha = 0;
            categoryAxis.axisAlpha = 0;
            categoryAxis.gridPosition = "start";

            // value
            var valueAxis = new AmCharts.ValueAxis();
            valueAxis.axisAlpha = 0;
            valueAxis.gridAlpha = 0;
            chart.addValueAxis(valueAxis);

            // GRAPH
            var graph = new AmCharts.AmGraph();
            graph.valueField = "Busquedas";
            graph.colorField = "color";
            graph.balloonText = "<b>[[category]]: [[value]]</b>";
            graph.type = "column";
            graph.lineAlpha = 0.5;
            graph.lineColor = "#FFFFFF";
            graph.topRadius = 1;
            graph.fillAlphas = 0.9;
            chart.addGraph(graph);

            // CURSOR
            var chartCursor = new AmCharts.ChartCursor();
            chartCursor.cursorAlpha = 0;
            chartCursor.zoomable = false;
            chartCursor.categoryBalloonEnabled = false;
            chartCursor.valueLineEnabled = true;
            chartCursor.valueLineBalloonEnabled = true;
            chartCursor.valueLineAlpha = 1;
            chart.addChartCursor(chartCursor);

            chart.creditsPosition = "top-right";

            // WRITE
            $("#estadistica5").html("");
            chart.write("estadistica5");
//            });
        } else {
            console.error("No hay estadisticas por instancia");
        }
    });

    $.post("../sources/ControladorAdmin.php", {consulta: "estadisticaMasLeidos"}, function (respuesta) {
        console.log(respuesta);
        if (respuesta) {
            var responseJSON = $.parseJSON(respuesta);
            console.log(responseJSON);

            //Limpiar caracteres
            for (var i = 0; i < responseJSON.length; i++) {
                responseJSON[i].Libros = Encoder.htmlDecode(responseJSON[i].Libros);
                var color = getColor();
                responseJSON[i].color = color;
            }
            console.log("tratamiento");
            console.log(responseJSON);

            var chart;
            var legend;

            var chartData = responseJSON;

            console.log("Antes del ready");
//            AmCharts.ready(function () {
            console.log("AmCharts is ready");
            // SERIAL CHART
            chart = new AmCharts.AmSerialChart();
            chart.dataProvider = chartData;
            chart.categoryField = "Libros";
            chart.startDuration = 1;
            chart.depth3D = 50;
            chart.angle = 30;
            chart.marginRight = -45;

            // AXES
            // category
            var categoryAxis = chart.categoryAxis;
            categoryAxis.gridAlpha = 0;
            categoryAxis.axisAlpha = 0;
            categoryAxis.gridPosition = "start";

            // value
            var valueAxis = new AmCharts.ValueAxis();
            valueAxis.axisAlpha = 0;
            valueAxis.gridAlpha = 0;
            chart.addValueAxis(valueAxis);

            // GRAPH
            var graph = new AmCharts.AmGraph();
            graph.valueField = "Lecturas";
            graph.colorField = "color";
            graph.balloonText = "<b>[[category]]: [[value]]</b>";
            graph.type = "column";
            graph.lineAlpha = 0.5;
            graph.lineColor = "#FFFFFF";
            graph.topRadius = 1;
            graph.fillAlphas = 0.9;
            chart.addGraph(graph);

            // CURSOR
            var chartCursor = new AmCharts.ChartCursor();
            chartCursor.cursorAlpha = 0;
            chartCursor.zoomable = false;
            chartCursor.categoryBalloonEnabled = false;
            chartCursor.valueLineEnabled = true;
            chartCursor.valueLineBalloonEnabled = true;
            chartCursor.valueLineAlpha = 1;
            chart.addChartCursor(chartCursor);

            chart.creditsPosition = "top-right";

            // WRITE
            $("#estadistica6").html("");
            chart.write("estadistica6");
//            });
        } else {
            console.error("No hay estadisticas por instancia");
        }
    });

    $.post("../sources/ControladorAdmin.php", {consulta: "estadisticaMasEstante"}, function (respuesta) {
        console.log(respuesta);
        if (respuesta) {
            var responseJSON = $.parseJSON(respuesta);
            console.log(responseJSON);

            //Limpiar caracteres
            for (var i = 0; i < responseJSON.length; i++) {
                responseJSON[i].Libros = Encoder.htmlDecode(responseJSON[i].Libros);
                var color = getColor();
                responseJSON[i].color = color;
            }
            console.log("tratamiento");
            console.log(responseJSON);

            var chart;
            var legend;

            var chartData = responseJSON;

            console.log("Antes del ready");
//            AmCharts.ready(function () {
            console.log("AmCharts is ready");
            // SERIAL CHART
            chart = new AmCharts.AmSerialChart();
            chart.dataProvider = chartData;
            chart.categoryField = "Libros";
            chart.startDuration = 1;
            chart.depth3D = 50;
            chart.angle = 30;
            chart.marginRight = -45;

            // AXES
            // category
            var categoryAxis = chart.categoryAxis;
            categoryAxis.gridAlpha = 0;
            categoryAxis.axisAlpha = 0;
            categoryAxis.gridPosition = "start";

            // value
            var valueAxis = new AmCharts.ValueAxis();
            valueAxis.axisAlpha = 0;
            valueAxis.gridAlpha = 0;
            chart.addValueAxis(valueAxis);

            // GRAPH
            var graph = new AmCharts.AmGraph();
            graph.valueField = "Estante";
            graph.colorField = "color";
            graph.balloonText = "<b>[[category]]: [[value]]</b>";
            graph.type = "column";
            graph.lineAlpha = 0.5;
            graph.lineColor = "#FFFFFF";
            graph.topRadius = 1;
            graph.fillAlphas = 0.9;
            chart.addGraph(graph);

            // CURSOR
            var chartCursor = new AmCharts.ChartCursor();
            chartCursor.cursorAlpha = 0;
            chartCursor.zoomable = false;
            chartCursor.categoryBalloonEnabled = false;
            chartCursor.valueLineEnabled = true;
            chartCursor.valueLineBalloonEnabled = true;
            chartCursor.valueLineAlpha = 1;
            chart.addChartCursor(chartCursor);

            chart.creditsPosition = "top-right";

            // WRITE
            $("#estadistica7").html("");
            chart.write("estadistica7");
//            });
        } else {
            console.error("No hay estadisticas por instancia");
        }
    });

    $.post("../sources/ControladorAdmin.php", {consulta: "estadisticaMejorValoracion"}, function (respuesta) {
        console.log(respuesta);
        if (respuesta) {
            var responseJSON = $.parseJSON(respuesta);
            console.log(responseJSON);

            //Limpiar caracteres
            for (var i = 0; i < responseJSON.length; i++) {
                responseJSON[i].Libros = Encoder.htmlDecode(responseJSON[i].Libros);
            }
            console.log("tratamiento");
            console.log(responseJSON);

            var chart;
            var legend;

            var chartData = responseJSON;

            console.log("Antes del ready");
//            AmCharts.ready(function () {
            console.log("AmCharts is ready");
            // SERIAL CHART
            chart = new AmCharts.AmSerialChart();
            chart.dataProvider = chartData;
            chart.categoryField = "Libros";
            chart.plotAreaBorderAlpha = 0.2;

            // AXES
            // category
            var categoryAxis = chart.categoryAxis;
            categoryAxis.gridAlpha = 0.1;
            categoryAxis.axisAlpha = 0;
            categoryAxis.gridPosition = "start";

            // value
            var valueAxis = new AmCharts.ValueAxis();
            valueAxis.stackType = "regular";
            valueAxis.gridAlpha = 0.1;
            valueAxis.axisAlpha = 0;
            chart.addValueAxis(valueAxis);

            // GRAPHS
            // first graph    
            var graph = new AmCharts.AmGraph();
            graph.title = "1Estrellas";
            graph.labelText = "[[value]]";
            graph.valueField = "1Estrellas";
            graph.type = "column";
            graph.lineAlpha = 0;
            graph.fillAlphas = 1;
            graph.lineColor = "#C72C95";
            graph.balloonText = "<span style='color:#555555;'>[[category]]</span><br><span style='font-size:14px'>[[title]]:<b>[[value]]</b></span>";
            chart.addGraph(graph);

            // second graph              
            graph = new AmCharts.AmGraph();
            graph.title = "2Estrellas";
            graph.labelText = "[[value]]";
            graph.valueField = "2Estrellas";
            graph.type = "column";
            graph.lineAlpha = 0;
            graph.fillAlphas = 1;
            graph.lineColor = "#D8E0BD";
            graph.balloonText = "<span style='color:#555555;'>[[category]]</span><br><span style='font-size:14px'>[[title]]:<b>[[value]]</b></span>";
            chart.addGraph(graph);

            // third graph                              
            graph = new AmCharts.AmGraph();
            graph.title = "3Estrellas";
            graph.labelText = "[[value]]";
            graph.valueField = "3Estrellas";
            graph.type = "column";
            graph.lineAlpha = 0;
            graph.fillAlphas = 1;
            graph.lineColor = "#B3DBD4";
            graph.balloonText = "<span style='color:#555555;'>[[category]]</span><br><span style='font-size:14px'>[[title]]:<b>[[value]]</b></span>";
            chart.addGraph(graph);

            // fourth graph  
            graph = new AmCharts.AmGraph();
            graph.title = "4Estrellas";
            graph.labelText = "[[value]]";
            graph.valueField = "4Estrellas";
            graph.type = "column";
            graph.lineAlpha = 0;
            graph.fillAlphas = 1;
            graph.lineColor = "#69A55C";
            graph.balloonText = "<span style='color:#555555;'>[[category]]</span><br><span style='font-size:14px'>[[title]]:<b>[[value]]</b></span>";
            chart.addGraph(graph);

            // fifth graph
            graph = new AmCharts.AmGraph();
            graph.title = "5Estrellas";
            graph.labelText = "[[value]]";
            graph.valueField = "5Estrellas";
            graph.type = "column";
            graph.lineAlpha = 0;
            graph.fillAlphas = 1;
            graph.lineColor = "#B5B8D3";
            graph.balloonText = "<span style='color:#555555;'>[[category]]</span><br><span style='font-size:14px'>[[title]]:<b>[[value]]</b></span>";
            chart.addGraph(graph);

            // LEGEND                  
            var legend = new AmCharts.AmLegend();
            legend.borderAlpha = 0.2;
            legend.horizontalGap = 10;
            chart.addLegend(legend);

            // WRITE
            $("#estadistica8").html("");
            chart.write("estadistica8");
//            });
        } else {
            console.error("No hay estadisticas por instancia");
        }
    });

    function getColor() {
        var colores = ["#FF0F00", "#FF6600", "#FF9E01", "#FCD202", "#F8FF01", "#B0DE09", "#04D215", "#0D8ECF", "#0D52D1", "#2A0CD0", "#8A0CCF", "#CD0D74"];
        return colores[random(0, colores.length)];
    }

    function random(min, max) {
        var rango = max - min + 1;
        var numero = Math.floor(Math.random() * rango);
        return numero + min;
    }



});


