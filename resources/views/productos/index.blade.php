@extends('productos.producto')

@section('content')
<div class="container container-custom">
    <h1>Productos</h1>
    <a href="#createModal" class="btn btn-crear-producto" data-toggle="modal">Crear Producto</a>
    <table class="table table-striped table-custom mt-4">
        <thead>
            <tr>
                <th>ID</th>
                <th>Nombre</th>
                <th>Grupo Especialidad</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach($productos as $producto)
            <tr>
                <td>{{ $producto->id }}</td>
                <td>{{ $producto->nombre_producto }}</td>
                <td>{{ $producto->id_grupo_especialidad }}</td>
                <td>
                    <a href="#" class="btn" data-toggle="modal" data-target="#editModal{{ $producto->id }}" style="background: url('assets/img/editar.png') no-repeat center center; background-size: contain; width: 30px; height: 30px; display: inline-block; text-indent: -9999px;">Editar</a>
                    <form action="{{ route('productos.destroy', $producto->id) }}" method="POST" style="display:inline;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn" style="background: url('assets/img/eliminar.png') no-repeat center center; background-size: contain; width: 30px; height: 30px; border: none; padding: 0; text-indent: -9999px;">Eliminar</button>
                    </form>
                </td>
            </tr>
            <!-- Modal Editar Producto -->
            <div class="modal fade" id="editModal{{ $producto->id }}" tabindex="-1" role="dialog" aria-labelledby="editModalLabel{{ $producto->id }}" aria-hidden="true">
              <div class="modal-dialog" role="document">
                <div class="modal-content modal-content-custom">
                  <form action="{{ route('productos.update', $producto->id) }}" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="modal-header">
                      <h5 class="modal-title" id="editModalLabel{{ $producto->id }}">Editar Producto</h5>
                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                      </button>
                    </div>
                    <div class="modal-body">
                      <div class="form-group">
                        <label for="nombre_producto">Nombre del Producto</label>
                        <input type="text" class="form-control" id="nombre_producto" name="nombre_producto" value="{{ $producto->nombre_producto }}" required>
                      </div>
                      <div class="form-group">
                        <label for="id_grupo_especialidad">Grupo de Especialidad</label>
                        <select class="form-control" id="id_grupo_especialidad" name="id_grupo_especialidad" required>
                          @foreach($grupoEspecialidades as $grupoEspecialidad)
                            <option value="{{ $grupoEspecialidad->id_grupo_especialidad }}" {{ $producto->id_grupo_especialidad == $grupoEspecialidad->id_grupo_especialidad ? 'selected' : '' }}>
                              {{ $grupoEspecialidad->nombre }}
                            </option>
                          @endforeach
                        </select>
                      </div>
                    </div>
                    <div class="modal-footer">
                      <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                      <button type="submit" class="btn btn-primary">Actualizar</button>
                    </div>
                  </form>
                </div>
              </div>
            </div>
            @endforeach
        </tbody>
    </table>
</div>

<!-- Modal Crear Producto -->
<div class="modal fade" id="createModal" tabindex="-1" role="dialog" aria-labelledby="createModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content modal-content-custom">
      <form action="{{ route('productos.store') }}" method="POST">
        @csrf
        <div class="modal-header">
          <h5 class="modal-title" id="createModalLabel">Crear Producto</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <div class="form-group">
            <label for="nombre_producto">Nombre del Producto</label>
            <input type="text" class="form-control" id="nombre_producto" name="nombre_producto" required>
          </div>
          <div class="form-group">
            <label for="id_grupo_especialidad">Grupo de Especialidad</label>
            <select class="form-control" id="id_grupo_especialidad" name="id_grupo_especialidad" required>
              @foreach($grupoEspecialidades as $grupoEspecialidad)
                <option value="{{ $grupoEspecialidad->id_grupo_especialidad }}">{{ $grupoEspecialidad->nombre }}</option>
              @endforeach
            </select>
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
          <button type="submit" class="btn btn-primary">Guardar</button>
        </div>
      </form>
    </div>
  </div>
</div>
@endsection
