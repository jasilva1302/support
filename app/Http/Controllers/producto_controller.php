<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\producto_model;
use App\Models\grupo_especializado_model;


class producto_controller extends Controller
{

    public function nueva_solicitud()
    {
        //Funcion que consulta los productos desde un incio a los productos
        $productos = producto_model::obtenerProductos();
        return view('Usuario\nueva_solicitud')->with('productos', $productos);
    }

    public function index()
    {
        $productos = producto_model::where('estado','Activo')->get();
        $grupoEspecialidades = grupo_especializado_model::all();
        return view('productos.index', compact('productos', 'grupoEspecialidades'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'nombre_producto' => 'required',
            'id_grupo_especialidad' => 'required|exists:grupo_especialidad,id_grupo_especialidad',
        ]);
    
        // Crear un nuevo producto utilizando el modelo producto_model
        producto_model::create([
            'nombre_producto' => $request->nombre_producto,
            'id_grupo_especialidad' => $request->id_grupo_especialidad,
            'estado' => 'Activo', // Supongo que el estado debería ser 'Activo' por defecto
        ]);
    
        return redirect()->route('productos.index')->with('success', 'Producto creado exitosamente.');
    }

    public function edit($id)
    {
        $producto = producto_model::findOrFail($id);
        $grupoEspecialidades = grupo_especializado_model::all();
        return view('productos.edit', compact('producto', 'grupoEspecialidades'));
    }

    public function update(Request $request, $id)
{
    $request->validate([
        'nombre_producto' => 'required',
        'id_grupo_especialidad' => 'required|exists:grupo_especialidad,id_grupo_especialidad',
    ]);

    $producto = producto_model::findOrFail($id);
    $producto->nombre_producto = $request->nombre_producto;
    $producto->id_grupo_especialidad = $request->id_grupo_especialidad;
    $producto->save();

    return redirect()->route('productos.index')->with('success', 'Producto actualizado exitosamente.');
}

    public function destroy($id)
    {
        $producto = Producto_model::findOrFail($id);
        $producto->update(['estado' => 'Inactivo' ]);

        return redirect()->route('productos.index')->with('success', 'Producto eliminado exitosamente.');
    }

   

} 