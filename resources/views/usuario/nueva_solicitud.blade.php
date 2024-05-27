<!DOCTYPE html>
<html lang="en">
<head>
    @include('usuario/template_usuario/template_ruta')
    <title>Support Sync | Nueva Solicitud</title>
    <link rel="stylesheet" href="{{ asset('assets/css/Usuario/nueva_solicitud_estilo.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" integrity="sha384-k6RqeWeci5ZR/Lv4MR0sA0FfDOM/uYcAn2YvIUzU2lOgq6QK3pvkQ/whvR9p6Zqx" crossorigin="anonymous">

    <style>
        body {
            background-image: url('assets/img/img_7.PNG');
            background-size: cover;
            background-repeat: no-repeat;
            background-attachment: fixed;
        }
        .input-icon {
            display: flex;
            align-items: center;
        }
        .input-icon img {
            margin-right: 10px;
            width: 50px;
            height:50px;
        }
    </style>
</head>
<body>
    @include('usuario/template_usuario/template_menu')
    <section class="box_contenedor_general">
        <div class="box_formulario">
            <div class="form_container">
                <form action="{{ route('consultar_cliente') }}" method="post">
                    @csrf
                    <h2 class="titulo_uno">
                        
                        Datos del Cliente
                    </h2>
                    <label for="identificacion_cliente" class="form-label">Documento de Identificación:</label>
                    <div class="row">
                        <div class="col">
                            <div class="input-icon">
                                <input id="identificacion" name="identificacion" type="number" class="form-control">
                            </div>
                        </div>
                        <div class="col btn_consultar_cliente">
                            <button type="submit" class="btn btn-secondary"><i class="bi bi-search"></i></button>
                        </div>
                    </div>
                </form>
                <form action="{{ route('create') }}" method="post">  
                @csrf  
                    @if(isset($resultados) && count($resultados) > 0)
                        <div class="row">
                            @foreach($resultados as $cliente)
                                <!-- TAREA: NO SE PUDE MOSTRAR EL ATRUBUTO ID -->
                                <input id="id_cliente" name="id_cliente" type="hidden" value="{{ $cliente->id_cliente }}" />
                                <input id="identificacion" name="identificacion" type="hidden" value="{{ $cliente->identificacion }}" />
                                <div class="col">
                                    <label for="nombre_cliente" class="form-label"></label>
                                    <div class="input-icon">
                                        <img src="{{ asset('assets/img/usuario.png') }}" alt="User Icon">
                                        <input id="nombre_cliente" name="nombre_cliente" type="text" class="form-control" value="{{ $cliente->nombre }}" disabled>
                                    </div>
                                </div>
                                <div class="col">
                                    <label for="email" class="form-label"></label>
                                    <div class="input-icon">
                                        <img src="{{ asset('assets/img/email.png') }}" alt="Email Icon">
                                        <input id="email" name="email" type="text" class="form-control" value="{{ $cliente->email }}" disabled>
                                    </div>
                                </div>
                                <div class="col">
                                    <label for="numero_contacto" class="form-label"></label>
                                    <div class="input-icon">
                                        <img src="{{ asset('assets/img/tel.png') }}" alt="Phone Icon">
                                        <input id="numero_contacto" name="numero_contacto" type="text" class="form-control" value="{{ $cliente->numero_contacto }}" disabled>
                                    </div>
                                </div>
                                <div class="col">
                                    <label for="pais" class="form-label"></label>
                                    <div class="input-icon">
                                        <img src="{{ asset('assets/img/pais.png') }}" alt="Country Icon">
                                        <input id="pais" name="pais" type="text" class="form-control" value="{{ $cliente->nombre_pais }}" disabled>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    @elseif(isset($resultados) && count($resultados) == 0 )
                        <div class="alert alert-warning alerta" role="alert">
                            No se encontraron datos para el cliente con la identificación ingresada.
                        </div>
                    @endif

                    <div class="row">
                        <div class="col">
                            <label for="sel1" class="form-label">Selecciona tipo de consulta:</label>
                            <select class="form-select" id="tipo_consulta" name="tipo_consulta">
                                <option value="1">Aclaración de Saldo</option>
                                <option value="2">Reclamo de Cobros</option>
                                <option value="4">Acuerdos de Pago</option>
                                <option value="4">Productos</option>
                            </select>
                        </div>
                        <div class="col">
                            <label for="sel1" class="form-label">Producto:</label>
                            <select class="form-select" id="tipo_producto" name="tipo_producto">
                                @if(isset($productos))
                                    @foreach($productos as $product)
                                        <option value="{{ $product->id }}">{{ $product->nombre_producto }}</option>
                                    @endforeach
                                @endif
                            </select>
                        </div>
                    </div>

                    <div class="d-flex justify-content-center box_btn_solicitud">
                        <button type="submit" class="btn btn-dark">Consultar</button>
                    </div>
                </form>
            </div>
        </div>
    </section>
</body>
</html>
