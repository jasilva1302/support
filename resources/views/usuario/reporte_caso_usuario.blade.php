<!DOCTYPE html>
<html lang="en">
<head>
    @include('usuario/template_usuario/template_ruta')
    <title>Support Sync | Reporte Productividad</title>

    <link rel="stylesheet" href="assets/css/Usuario/reporte_caso_esttilo.css">
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
</head>
<body>
    @include('usuario/template_usuario/template_menu')

    <section class="box_contenedor_general">
        <script>
            google.charts.load("current", {packages:["corechart"]});
            google.charts.setOnLoadCallback(drawChart);
            function drawChart() {
                // Calcular el máximo valor del eje x
                var maxCasos = Math.max(
                    {{ intval($total_caso[0]->solucionados) }},
                    {{ intval($total_caso[0]->pendientes) }},
                    {{ intval($total_caso[0]->interrumpida) }},
                    {{ intval($total_caso[0]->suspendida_cliente) }},
                    {{ intval($total_caso[0]->escalados) }}
                );
        
                var data = google.visualization.arrayToDataTable([
                    ["Estado", "Cantidad", { role: "style" }],
                    ["Solucionados", {{ intval($total_caso[0]->solucionados) }}, "color: #e5e4e2"],
                    ["Pendientes", {{ intval($total_caso[0]->pendientes) }}, "color: #c20000"],
                    ["Interrumpida", {{ intval($total_caso[0]->interrumpida) }}, "color: #3F51B5"],
                    ["Comunicación", {{ intval($total_caso[0]->suspendida_cliente) }}, "color: #FF9800"],
                    ["Escalado", {{ intval($total_caso[0]->escalados) }}, "color: #9C27B0"]
                ]);
        
                var view = new google.visualization.DataView(data);
                view.setColumns([0, 1, { calc: "stringify", sourceColumn: 1, type: "string", role: "annotation" }, 2]);
        
                var options = {
                    width: '100%',
                    height: 200,
                    legend: { position: "none" },
                    vAxis: {
                        format: '0'
                    },
                    hAxis: {
                        minValue: 0,
                        maxValue: 10, // Establecer el máximo valor del eje x
                    }
                };
        
                var chart = new google.visualization.BarChart(document.getElementById("barchart_values"));
                chart.draw(view, options);
            }
        </script>
        <div class="box_container_grafica">
            <div class="row">
                <div class="col col_responsive">
                    <h2 class="titulo_uno text-left">Reporte de casos y su estado</h2>
                    <div class="linea_titulo"></div>
                    <div class="row">
                        <div class="col-sm-4 d-flex flex-wrap align-content-center bg-light">
                            <table class="table table-bordered">
                                <thead class="table-danger">
                                    <tr>
                                        <th colspan="2">Total de Casos</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>Pendientes</td>
                                        <td>{{ $total_caso[0]->pendientes }}</td>
                                    </tr>
                                    <tr>
                                        <td>Solucionados</td>
                                        <td>{{ $total_caso[0]->solucionados }}</td>
                                    </tr>
                                    <tr>
                                        <td>Interrumpida</td>
                                        <td>{{ $total_caso[0]->interrumpida }}</td>
                                    </tr>
                                    <tr>
                                        <td>Suspendida por el cliente</td>
                                        <td>{{ $total_caso[0]->suspendida_cliente }}</td>
                                    </tr>
                                    <tr>
                                        <td>Caso Escalado</td>
                                        <td>{{ $total_caso[0]->escalados }}</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                        <div class="col-sm-8">
                            <div id="barchart_values" class="box_grafica"></div>
                        </div>
                    </div>
                </div>

                <div class="row box_completo col_responsive">
                    <div class="col">
                        <h2 class="titulo_uno">Promedio de tiempos de casos resueltos</h2>
                        <div class="linea_titulo"></div>
                        <div class="box_texto">
                            <p>En la siguiente tabla se presentan los tiempos en promedio que se tarda en resolver un caso, presentando el nombre del producto y el tipo de consulta que se realizó sobre ese producto:</p>
                        </div>
                        <table class="table table-bordered">
                            <thead class="table-dark">
                                <tr>
                                    <th scope="col">Tipo Consulta</th>
                                    <th scope="col">Nombre Producto</th>
                                    <th scope="col">Tiempo Promedio</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($tiempo_promedio as $tiempo)
                                <tr>
                                    <td>{{ $tiempo->nombre_tipo_consulta }}</td>
                                    <td>{{ $tiempo->nombre_producto }}</td>
                                    <td>{{ $tiempo->promedio_tiempo_formato }}</td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>

                    <div class="col">
                        <h2 class="titulo_uno">Casos solucionados en menor tiempo</h2>
                        <div class="linea_titulo"></div>
                        <div class="box_texto">
                            <p>En la siguiente tabla se presentan los tiempos en promedio de los casos que se resuelven con mayor rapidez:</p>
                        </div>
                        <table class="table table-bordered">
                            <thead class="table-dark">
                                <tr>
                                    <th scope="col">Tipo Consulta</th>
                                    <th scope="col">Nombre Producto</th>
                                    <th scope="col">Tiempo Promedio</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($mejor_tiempo_caso as $mejor_caso_tiempo)
                                <tr>
                                    <td>{{ $mejor_caso_tiempo->nombre_tipo_consulta }}</td>
                                    <td>{{ $mejor_caso_tiempo->nombre_producto }}</td>
                                    <td>{{ $mejor_caso_tiempo->promedio_tiempo_formato }}</td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>

                        <script>
                            google.charts.load("current", {packages:['corechart']});
                            google.charts.setOnLoadCallback(drawBarChart);
                            function drawBarChart() {
                                var data = google.visualization.arrayToDataTable([
                                    ["Producto", "Tiempo (minutos)", { role: "style" }],
                                    @foreach($mejor_tiempo_caso as $mejor_caso_tiempo)
                                    ["{{ $mejor_caso_tiempo->nombre_producto }}", {{ $mejor_caso_tiempo->promedio_tiempo_minutos }}, "#b61818"],
                                    @endforeach
                                ]);

                                var view = new google.visualization.DataView(data);
                                view.setColumns([0, 1, { calc: "stringify", sourceColumn: 1, type: "string", role: "annotation" }, 2]);

                                var options = {
                                    width: '100%',
                                    height: 300,
                                    bar: {groupWidth: "95%"},
                                    legend: { position: "none" },
                                    hAxis: {
                                        title: 'Tiempo Promedio (minutos)'
                                    },
                                    vAxis: {
                                        title: 'Producto'
                                    }
                                };

                                var chart = new google.visualization.BarChart(document.getElementById("columnchart_values"));
                                chart.draw(view, options);
                            }
                        </script>
                        <div id="columnchart_values"></div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</body>
</html>
