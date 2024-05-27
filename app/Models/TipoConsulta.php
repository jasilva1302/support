<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TipoConsulta extends Model
{
    protected $table = 'tipo_consulta'; // Ensure this matches your table name
    protected $fillable = ['nombre_tipo_consulta', 'id']; // Include other fillable attributes if necessary

    public function casos()
    {
        return $this->hasMany(Caso::class, 'id_tipo_consulta');
    }
}