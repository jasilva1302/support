<!DOCTYPE html>
<html lang="en">
<head>

    @include('usuario/template_usuario/template_ruta')
    <title>Support Sync | Escalar Caso </title>
    <link rel="stylesheet" href="assets/css/Usuario/escalar_caso_estilo.css">

</head>
<body>
@include('usuario/template_usuario/template_menu')

    <section class="box_contenedor_general">
    <section class="box_titulo">
        <h2 class="titulo_dos">Escalar Caso #320</h2>
    </section>
        <div class="box_formulario">

            <form>
                
            <div class="row">
                <div class="col">
                <h2 class="titulo_uno">Datos del Cliente </h2>
                    <div class="row">
                    
                        <div class="row">
                            <div class="col">
                                <label for="identificacion_cliente" class="form-label">Identificación:</label>
                                <input id="identificacion" name="identificacion" type="number" class="form-control"  disabled>
                            </div>
                            <div class="col">
                                <label for="nombre_cliente" class="form-label">Nombre: </label>
                                <input id="nombre_cliente" name="nombre_cliente" type="text" class="form-control" value="" disabled>
                            </div>
                        </div>
                    
                        
                        <div class="row">
                            <div class="col">
                                <label for="email" class="form-label">Correo Electrónico: </label>
                                <input id="email" name="email" type="text" class="form-control" value="" disabled>
                            </div>
                            <div class="col">
                                <label for="numero_contacto" class="form-label">Teléfono: </label>
                                <input id="numero_contacto" name="numero_contacto" type="text" class="form-control" value="" disabled>
                            </div>
                            <div class="col">
                                <label for="pais" class="form-label">País: </label>
                                <input id="pais" name="pais" type="text" class="form-control" value="" disabled>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col">
                    <div class="row">
                        <h2 class="titulo_uno">Datos de consulta</h2>
                        <div class="row">
                            <div class="col">
                                <label for="sel1" class="form-label">Asunto:</label>
                                <input id="" name="" type="text" class="form-control" value="" disabled>
                            </div>
                            <div class="col">
                            <label for="sel1" class="form-label">Producto: </label>
                            <input id="" name="" type="text" class="form-control" value="" disabled>
                            </div>
                        </div>
                        <div class="mb-3">
                            <label for="exampleFormControlTextarea1" class="form-label">Observación</label>
                            <textarea class="form-control" rows="5" id="comment" name="text"></textarea>
                        </div>
                    </div>
                </div>

                
                <div class="d-flex justify-content-center box_btn_solicitud">
                    <button type="submit" class="btn btn-dark">Registrar Caso</button>
                </div>
            </div>
        </div>
    </section>

</body>
</html>