<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class grupo_especializado_model extends Model
{
    use HasFactory;
    protected $table = 'grupo_especialidad';

    public static function obtenerTodosLosGruposEspecializados()
    {
        $productos = DB::select("SELECT * FROM grupo_especialidad");
        return $productos;
    }

}


