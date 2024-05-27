<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class nueva_solicitud_model extends Model
{
    use HasFactory;

    public function create($request)
    {
        // Obtener el ID del usuario autenticado
        $id_usuario = Auth::id();

        $ultimoNumeroCaso = DB::table('caso')->orderBy('id', 'desc')->value('numero_caso');
        $nuevoNumeroCaso = $ultimoNumeroCaso + 1;

        $numero_caso = $nuevoNumeroCaso;
        $id_tipo_consulta = $request->input('tipo_consulta');
        $estado_caso = "Pendiente";
        $id_producto = $request->input('tipo_producto');
        $id_cliente = $request->input('id_cliente');
        $observacion = "";
        $fecha_registro_caso = date("Y-m-d H:i:s");
        $fecha_actualizacion_caso = date("Y-m-d H:i:s");
        $id_documento_solucion = 5;

        $sql = DB::insert("INSERT INTO caso (numero_caso,id_tipo_consulta,estado_caso,id_producto,id_usuario,id_cliente,observacion,fecha_registro_caso,fecha_actualizacion_caso,id_documento_solucion) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?)", [
            $numero_caso,
            $id_tipo_consulta,
            $estado_caso,
            $id_producto,
            $id_usuario,
            $id_cliente,
            $observacion,
            $fecha_registro_caso,
            $fecha_actualizacion_caso,
            $id_documento_solucion
        ]);

        return $numero_caso;
    }

    public function consultar_cliente($request)
    {
        $identificacion = $request->input('identificacion');

        if (!empty($identificacion)) {
            $resultados = DB::select("SELECT * FROM cliente INNER JOIN pais ON cliente.id_pais = pais.id WHERE identificacion = ?", [$identificacion]);
            return $resultados;
        } else {
            return null;
        }
    }
}
