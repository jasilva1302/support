<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Cliente extends Model
{
    protected $fillable = [
        'id_cliente',
        'identificacion',
        'nombre',
        'email',
        'numero_contacto',
        'id_pais',
    ];

    protected $table = 'cliente';
    protected $primaryKey = 'id_cliente'; // Definir la clave primaria personalizada

    public function casos()
    {
        return $this->hasMany(Caso::class, 'id_cliente', 'id_cliente');
    }
}