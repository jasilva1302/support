@extends('productos.producto')

@section('content')
<div class="container">
    <h1>Editar Producto</h1>
    <form action="{{ route('productos.update', $producto->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="nombre_producto">Nombre del Producto</label>
            <input type="text" class="form-control" id="nombre_producto" name="nombre_producto" value="{{ $producto->nombre_producto }}" required>
        </div>
        <div class="form-group">
            <label for="id_grupo_especialidad">ID Grupo Especialidad</label>
            <input type="text" class="form-control" id="id_grupo_especialidad" name="id_grupo_especialidad" value="{{ $producto->id_grupo_especialidad }}" required>
        </div>
        <button type="submit" class="btn btn-primary">Actualizar</button>
        <a href="{{ route('productos.index') }}" class="btn btn-secondary">Cancelar</a>
    </form>
</div>
@endsection
