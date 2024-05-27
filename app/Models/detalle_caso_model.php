<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class detalle_caso_model extends Model
{
    public function consultarCliente($numero_caso)
    {
        return DB::select("SELECT * FROM caso INNER JOIN cliente ON cliente.id_cliente = caso.id_cliente INNER JOIN producto ON producto.id = caso.id_producto INNER JOIN tipo_consulta ON tipo_consulta.id = caso.id_tipo_consulta WHERE caso.numero_caso=?", [$numero_caso]);
    }

    public function obtenerDocumentosPorCaso($id_producto, $id_tipo_consulta)
    {
        // Realizar la consulta a la base de datos para obtener la lista de documentos
        $lista_documentos = DB::select("SELECT * FROM `documento_solucion` WHERE id_producto=? AND id_tipo_consulta=?;", [$id_producto, $id_tipo_consulta]);

        return $lista_documentos;
    }

    public function actualizarCaso($numero_caso, $estado_caso, $observacion, $id_documento_solucion)
    {
        $fecha_actualizacion_caso = date("Y-m-d H:i:s");
          // Si el estado es "Escalado", "Comunicación Interrumpida" o "Comunicación Suspendida", asignar null a $id_documento_solucion
          if (in_array($estado_caso, ["Escalado", "Comunicación Interrumpida", "Comunicación Suspendida por el cliente"])) {
            $id_documento_solucion = null;
        }
        return DB::update("UPDATE caso SET estado_caso = ?, observacion = ?, fecha_actualizacion_caso = ?, id_documento_solucion = ? WHERE numero_caso = ?", [
            $estado_caso,
            $observacion,
            $fecha_actualizacion_caso,
            $id_documento_solucion,
            $numero_caso
        ]);
    }
}
