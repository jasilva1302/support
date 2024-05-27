<!DOCTYPE html>
<html lang="en">
<head>
    @include('usuario/template_usuario/template_ruta')
    <title>Casos Escalados</title>
  
    <link rel="stylesheet" href="{{ asset('assets/css/Usuario/casos_escalados_estilo.css') }}">
    <!-- Agregar los estilos de Bootstrap -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
    @include('usuario/template_usuario/template_menu_coordinador')

    <section class="box_contenedor_general">
        <h2 class="titulo_uno text-left">Casos Escalados</h2>
        <div class="linea_titulo"></div>
        <table class="table table-bordered">
            <thead class="table-dark">
                <tr>
                    <th scope="col">Número de Caso</th>
                    <th scope="col">Observación</th>
                    <th scope="col">Asesor</th>
                </tr>
            </thead>
            <tbody>
                @foreach($casos_escalados as $caso)
                <tr data-caso="{{ json_encode($caso) }}">
                    <td>{{ $caso->numero_caso }}</td>
                    <td>{{ $caso->observacion }}</td>
                    <td>{{ $caso->nombre_asesor }}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </section>

    <!-- Modal original -->
    <div class="modal fade" id="detalleCasoModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Detalles del Caso Escalado</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <p><strong>Número de Caso:</strong> <span id="numeroCaso"></span></p>
                    <p><strong>Observación:</strong> <span id="observacion"></span></p>
                    <p><strong>Asesor:</strong> <span id="nombreAsesor"></span></p>
                    <!-- aqui se puede agregar más detalles del cliente si es necesario -->
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal adicional -->
    <div class="modal fade" id="detalleClienteModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Detalles del Cliente</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <p><img src="assets/img/usuario.png" alt="Usuario Icon"> <strong></strong> <span id="nombreCliente"></span></p>
                    <p><img src="assets/img/id.png" alt="ID Icon"> <strong></strong> <span id="identificacionCliente"></span></p>
                    <p><img src="assets/img/email.png" alt="Email Icon"> <strong></strong> <span id="emailCliente"></span></p>
                    <p><img src="assets/img/tel.png" alt="Tel Icon"> <strong></strong> <span id="numeroContactoCliente"></span></p>
                    <p><img src="assets/img/pais.png" alt="Pais Icon"> <strong></strong> <span id="paisCliente"></span></p>
                    <!-- aqui se puede agregar más detalles del cliente si es necesario -->
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                </div>
            </div>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
   
    <script>
        $(document).ready(function() {
            $('tbody tr').click(function() {
                var caso = $(this).data('caso');
                $('#numeroCaso').text(caso.numero_caso);
                $('#observacion').text(caso.observacion);
                $('#nombreAsesor').text(caso.nombre_asesor);
                $('#nombreCliente').text(caso.nombre_cliente);
                $('#identificacionCliente').text(caso.identificacion);
                $('#emailCliente').text(caso.email_cliente);
                $('#numeroContactoCliente').text(caso.contacto_cliente);
                $('#paisCliente').text(caso.nombre_pais_cliente);
                $('#detalleClienteModal').modal('show');
            });
        });
    </script>
</body>
</html>
