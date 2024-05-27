<!DOCTYPE html>
<html lang="en">
<>
    
    @include('usuario/template_usuario/template_ruta')
    <title>Support Sync | Acuerdo de Saldo </title>
    <link rel="stylesheet" href="assets/css/Usuario/usuario_global_estilo.css">



</head>
<body>
@include('usuario/template_usuario/template_menu')
    <section class="box_contenedor_general">
        <div class="box_formulario">

            <form>
                
                    <div class="row">
                        <div class="col">
                        <h2 class="titulo_uno">Documentos Vigentes</h2>
                            <label for="sel1" class="form-label">Filtrar Por:</label>
                            <select class="form-select" id="sel1" name="sellist1">
                                <option>----</option>
                                <option>----</option>
                            </select>
                            <br>
                            <div class="d-flex justify-content-center box_btn_solicitud">
                                <button type="submit" class="btn btn-dark">Consultar</button>
                            </div>
                        </div>
                        <div class="col">
                            <h2 class="titulo_uno">Documentos Especializados</h2>
                            <label for="sel1" class="form-label">Filtrar Por:</label>
                                <select class="form-select" id="sel1" name="sellist1">
                                    <option>----</option>
                                    <option>----</option>
                                </select>
                                <br>
                                <div class="d-flex justify-content-center box_btn_solicitud">
                                    <button type="submit" class="btn btn-dark">Consultar</button>
                                </div>
                        </div>
                    </div>
                    

                
                </form>

            </div>
    </section>
    <div class="row box_btn_escalar">
        <div class="col">
            <div class="d-flex justify-content-center box_btn_solicitud">
                <button type="submit" class="btn btn-danger">Finalizar Consulta</button>
            </div>
        </div>
        <div class="col">
            <div class="d-flex justify-content-center box_btn_solicitud">
                <button type="submit" class="btn btn-danger">Escalar Caso</button>
            </div>
        </div>
    </div>
</body>
</html>