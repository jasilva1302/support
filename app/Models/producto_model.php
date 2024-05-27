<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class producto_model extends Model
{
    use HasFactory;

    protected $table = 'producto';
    protected $fillable = ['nombre_producto', 'estado', 'id_grupo_especialidad'];

    public function grupoEspecialidad()
    {
        return $this->belongsTo(grupo_especializado_model::class, 'id_grupo_especialidad');
    }




    public static function obtenerProductos()
    {
        $productos = DB::select("SELECT * FROM producto");
        return $productos;
    }
}


