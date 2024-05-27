<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Caso; // Asegúrate de importar el modelo Caso

class CasosController extends Controller
{
    public function consultasRecientes(Request $request)
    {
        $query = Caso::query();

        if ($request->filled('id')) {
            $query->where('id', $request->id);
        }

        if ($request->filled('numero_caso')) {
            $query->where('numero_caso', 'like', '%' . $request->numero_caso . '%');
        }

        if ($request->filled('id_tipo_consulta')) {
            $query->where('id_tipo_consulta', $request->id_tipo_consulta);
        }

        if ($request->filled('estado_caso')) {
            $query->where('estado_caso', 'like', '%' . $request->estado_caso . '%');
        }

        // Add more conditions if needed

        $casos = $query->paginate(20); // Paginate with 20 items per page

        return view('Usuario\consulta_reciente', [
            'casos' => $casos,
            'filters' => $request->all()
        ]);
    }
}