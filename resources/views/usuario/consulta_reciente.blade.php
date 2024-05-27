<!DOCTYPE html>
<html lang="en">
<head>
    @include('usuario/template_usuario/template_ruta')
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Consultas Recientes</title>
    <link rel="stylesheet" href="{{ asset('assets/css/Usuario/consulta_reciente_estilo.css') }}">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        body {
            background-image: url('assets/img/img_7.PNG');
            background-size: cover;
            background-repeat: no-repeat;
            background-attachment: fixed;
        }
    </style>
</head>
<body>
    @include('usuario/template_usuario/template_menu')

    <section class="box_contenedor_general">
        <h2 class="titulo_uno text-left">Consultas Recientes</h2>
        <div class="linea_titulo"></div>

        <form method="GET" action="{{ route('consultasRecientes') }}" id="filtro-form">
            <table class="table table-bordered mt-3">
                <thead class="table-dark">
                    <tr>
                        <th scope="col">ID <input type="text" class="form-control filtro" name="id" value="{{ $filters['id'] ?? '' }}" placeholder="Filtrar ID"></th>
                        <th scope="col">Número de Caso <input type="text" class="form-control filtro" name="numero_caso" value="{{ $filters['numero_caso'] ?? '' }}" placeholder="Filtrar N° Caso"></th>
                        <th scope="col">Tipo de Consulta <input type="text" class="form-control filtro" name="id_tipo_consulta" value="{{ $filters['id_tipo_consulta'] ?? '' }}" placeholder="Filtrar Tipo Consulta"></th>
                        <th scope="col">Estado de Caso <input type="text" class="form-control filtro" name="estado_caso" value="{{ $filters['estado_caso'] ?? '' }}" placeholder="Filtrar Estado Caso"></th>
                        <th scope="col">Observación</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($casos as $caso)
                        <tr class="caso-row" data-toggle="modal" data-target="#casoModal" data-id="{{ $caso->id }}" data-cliente="{{ $caso->cliente->nombre ?? 'N/A' }}" data-documento="{{ $caso->documentoSolucion->nombre ?? 'N/A' }}" data-url="{{ $caso->documentoSolucion->ruta_documento ?? '#' }}">
                            <td>{{ $caso->id }}</td>
                            <td>{{ $caso->numero_caso }}</td>
                            <td>{{ $caso->tipoConsulta->nombre_tipo_consulta ?? 'N/A' }}</td>
                            <td>{{ $caso->estado_caso }}</td>
                            <td>{{ $caso->observacion }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </form>

        <div class="d-flex justify-content-center">
            {{ $casos->appends(request()->input())->links('pagination::bootstrap-4') }}
        </div>
    </section>

    <!-- Modal para mostrar detalles del caso -->
    <div class="modal fade" id="casoModal" tabindex="-1" aria-labelledby="casoModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="casoModalLabel">Detalles del Caso</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <p><strong>Cliente:</strong> <span id="clienteNombre"></span></p>
                    <p><strong>Documento Solución:</strong> <span id="documentoNombre"></span></p>
                    <a id="documentoLink" href="#" target="_blank" class="btn btn-primary">Ver Documento</a>
                </div>
            </div>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script src="{{ asset('assets/js/usuario/consulta_reciente.js') }}"></script>
    
</body>
</html>
