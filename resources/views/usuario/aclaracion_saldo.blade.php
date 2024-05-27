<!DOCTYPE html>
<html lang="en">
<head>
    
    @include('usuario/template_usuario/template_ruta')
    <title>Support Sync | Aclaracion De Saldo </title>
    <link rel="stylesheet" href="assets/css/Usuario/aclaracion_saldo_estilo.css">

</head>
<body>
    



@include('usuario/template_usuario/template_menu')


    <section class="box_contenedor_general">
        <section class="box_titulo">
            <h2 class="titulo_dos">Productos</h2>
        </section>
            <div class="row box_nueva_solicitud">
                <div class="col col_borde_derecha">
                <h2 class="titulo_uno">Consultar en sistema</h2>
                    <div class="d-flex justify-content-center box_btn_solicitud">
                        <button type="submit" class="btn btn-dark">Sistema Interno 1</button>
                    </div>
                    <div class="d-flex justify-content-center box_btn_solicitud">
                        <button type="submit" class="btn btn-dark">Sistema Interno 2</button>
                    </div>
                </div>
                <div class="col">
                    <h2 class="titulo_uno">Consultar informacion sobre productos</h2>
                    <div class="col">
                        <label for="sel1" class="form-label">Seleccione el rango de fecha que quiere consultar:</label>
                        <br>
                        <div class="col">
                            <label for="sel1" class="form-label">Fecha Inicial:</label>
                            <input type="date" class="form-control" placeholder="Fecha Inicial">
                        </div>
                        <div class="col">
                            <label for="sel1" class="form-label">Fecha Corte:</label>
                            <input type="date" class="form-control" placeholder="Fecha Corte">
                        </div>
                        <div class="col">
                            <label for="sel1" class="form-label">Selecciona tipo de producto:</label>
                                <select class="form-select" id="sel1" name="sellist1">
                                    <option>Tarjeta de Credito 1</option>
                                    <option>Tarjeta de Credito 2</option>
                                    <option>Cuenta de ahorros 1</option>
                                </select>   
                        </div>
                    </div>
                    <br>
                    <div class="d-flex justify-content-center box_btn_solicitud">
                        <button type="submit" class="btn btn-danger">Consultar</button>
                    </div>
                </div>
            </div>
    </section>
    <div class="container mt-3">
  <h2>Historial - Producto: Tarjeta Credito</h2>
  <h3>Estado de Producto: <strong class="txt_verde">Activo</strong></h3>
  <br>
  <table class="table">
    <thead class="table-dark">
      <tr>
        <th>Concepto</th>
        <th>Valor Operación</th>
        <th>Fecha Operación</th>
        <th>Numero Operación</th>
      </tr>
    </thead>
    <tbody>
      <tr>
        <td>Compra realizada en almacen X</td>
        <td>$300.000</td>
        <td>10/03/2024</td>
        <td>182</td>
      </tr>
      <tr>
        <td>Pago Tarjeta de Credito</td>
        <td>$100.000</td>
        <td>03/03/2024</td>
        <td>102</td>
      </tr>
      <tr>
        <td>Pago Tarjeta de Credito</td>
        <td>$100.000</td>
        <td>03/02/2024</td>
        <td>51</td>
      </tr>
    </tbody>
  </table>
  
</div>

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