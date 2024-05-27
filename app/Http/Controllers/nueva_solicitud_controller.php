<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\nueva_solicitud_model;
use App\Models\producto_model;
use Illuminate\Support\Facades\Redirect;

class nueva_solicitud_controller extends Controller
{
    public function create(Request $request)
    {
        $modelo = new nueva_solicitud_model();
        $numero_caso = $modelo->create($request);

        if ($numero_caso) {
            return redirect()->route('Usuario\detalle_caso', ['numero_caso' => $numero_caso]);
        } else {
            // Handle error
        }
    }

    public function consultar_cliente(Request $request)
    {
        $nueva_solicitud = new nueva_solicitud_model();
        $resultados = $nueva_solicitud->consultar_cliente($request);

        if ($resultados) {
            $productos_controller = new producto_model();
            $productos = $productos_controller->obtenerProductos();
            return view('Usuario\nueva_solicitud')->with('resultados', $resultados)->with('productos', $productos);
        } else {
            return redirect()->back()->with('error', 'El campo de identificación está vacío.');
        }
    }
}
