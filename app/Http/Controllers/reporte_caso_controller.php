<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\reporte_caso_model;
use Illuminate\Support\Facades\DB;
use Barryvdh\DomPDF\Facade\Pdf;

class reporte_caso_controller extends Controller
{
    public function obtener_total_casos()
    {
        $total_caso = reporte_caso_model::obtener_reporte_caso_estado();
        $tiempo_promedio = reporte_caso_model::obtener_tiempo_promedio_asesores();
        $tiempo_mejor_promedio_caso_resulto = reporte_caso_model::obtener_mejor_tiempo_caso_promedio();
        $estadisticas_usuarios = reporte_caso_model::obtener_estadisticas_usuarios();

        return view('Usuario\reporte_caso')
            ->with('total_caso', $total_caso)
            ->with('tiempo_promedio', $tiempo_promedio)
            ->with('tiempo_mejor_promedio_caso_resulto', $tiempo_mejor_promedio_caso_resulto)
            ->with('estadisticas_usuarios', $estadisticas_usuarios);
    }

    public function listar_casos_escalados()
    {
        $casos_escalados = DB::table('caso')
            ->join('users', 'caso.id_usuario', '=', 'users.id')
            ->join('cliente', 'caso.id_cliente', '=', 'cliente.id_cliente')
            ->join('pais', 'cliente.id_pais', '=', 'pais.id')
            ->select(
                'caso.numero_caso', 
                'caso.observacion', 
                'users.name as nombre_asesor', 
                'cliente.identificacion as identificacion', 
                'cliente.nombre as nombre_cliente', 
                'cliente.email as email_cliente', 
                'cliente.numero_contacto as contacto_cliente', 
                'pais.nombre_pais as nombre_pais_cliente'
            )
            ->where('caso.estado_caso', 'Escalado')
            ->get();

        return view('usuario\casos_escalados', compact('casos_escalados'));
    }

    public function generar_reporte_pdf()
    {
        $total_caso = reporte_caso_model::obtener_reporte_caso_estado();
        $tiempo_promedio = reporte_caso_model::obtener_tiempo_promedio_asesores();
        $tiempo_mejor_promedio_caso_resulto = reporte_caso_model::obtener_mejor_tiempo_caso_promedio();
        $estadisticas_usuarios = reporte_caso_model::obtener_estadisticas_usuarios();

        $pdf = Pdf::loadView('Usuario.reporte_caso_pdf', compact('total_caso', 'tiempo_promedio', 'tiempo_mejor_promedio_caso_resulto', 'estadisticas_usuarios'));

        return $pdf->download('reporte_casos.pdf');
    }
}
