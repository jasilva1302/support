<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\producto_model;
use Illuminate\Support\Facades\DB;

class page_controller extends Controller
{

    
    public function aclaracion_salgo()
    {
        return view('Usuario\aclaracion_saldo');
    }

  
    public function inicio_sesion()
    {
        return view('Inicio\inicio_sesion');
    }
        public function acuerdo_pago()
    {
        return view('Usuario\acuerdo_pago');
    }
    public function nueva_solicitud()
    {
        return view('Usuario\nueva_solicitud');
    }
   
    public function escalar_caso()
    {
        return view('Usuario\escalar_caso');
    }
    public function estadisticas_asesor()
    {
        return view('Usuario\estadistica_asesor');
    }
    public function solicitud_producto()
    {
        return view('Usuario\solicitud_producto');
    }
    public function detalle_caso()
    {
        return view('Usuario\detalle_caso');
    }
    
    public function panel_usuario()
    {
        return view('Usuario\panel_usuario');
    }
    public function panel_usuario_coordinador()
    {
        return view('Usuario\panel_usuario_coordinador');
    }
    public function reporte_caso()
    {
        return view('Usuario\reporte_caso');
    }
   
}

