<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\reporte_caso_usuario_model;

class reporte_caso_usuario_controller extends Controller
{
    public function index()
    {
        $id_usuario = auth()->user()->id;

        $total_caso = reporte_caso_usuario_model::obtener_reporte_caso_estado($id_usuario);
        $tiempo_promedio = reporte_caso_usuario_model::obtener_tiempo_promedio_asesores($id_usuario);
        $mejor_tiempo_caso = reporte_caso_usuario_model::obtener_mejor_tiempo_caso_promedio($id_usuario);

        return view('Usuario\reporte_caso_usuario', compact('total_caso', 'tiempo_promedio', 'mejor_tiempo_caso'));
    }
}
