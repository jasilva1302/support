<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Caso extends Model
{
    protected $fillable = [
        'numero_caso',
        'id_tipo_consulta',
        'estado_caso',
        'id_producto',
        'id_usuario',
        'id_cliente',
        'observacion',
        'fecha_registro_caso',
        'fecha_actualizacion_caso',
        'id_documento_solucion',
    ];

    protected $table = 'caso';

    public function tipoConsulta()
    {
        return $this->belongsTo(TipoConsulta::class, 'id_tipo_consulta');
    }

    public function cliente()
    {
        return $this->belongsTo(Cliente::class, 'id_cliente');
    }

    public function documentoSolucion()
    {
        return $this->belongsTo(DocumentoSolucion::class, 'id_documento_solucion');
    }
}
