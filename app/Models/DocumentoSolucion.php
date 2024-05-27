<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class DocumentoSolucion extends Model
{
    protected $fillable = [
        'ruta_documento',
        'nombre',
        'observacion',
        'fecha_creacion_documento',
        'id_producto',
        'id_tipo_consulta',
    ];

    protected $table = 'documento_solucion';

    // Define las relaciones si es necesario
    protected $primaryKey = 'id_documento_solucion'; // Definir la clave primaria personalizada

    public function casos()
    {
        return $this->hasMany(Caso::class, 'id_documento_solucion', 'id_documento_solucion');
    }
}