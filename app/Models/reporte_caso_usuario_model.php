<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class reporte_caso_usuario_model extends Model
{
    use HasFactory;

    public static function obtener_reporte_caso_estado($id_usuario)
    {
        $total_caso = DB::select("SELECT 
                                    COUNT(CASE WHEN estado_caso = 'Solucionado' THEN 1 END) AS solucionados, 
                                    COUNT(CASE WHEN estado_caso = 'Escalado' THEN 1 END) AS pendientes,
                                    COUNT(CASE WHEN estado_caso = 'Comunicación Interrumpida' THEN 1 END) AS interrumpida,
                                    COUNT(CASE WHEN estado_caso = 'Comunicación Suspendida por el cliente' THEN 1 END) AS suspendida_cliente,
                                    COUNT(CASE WHEN estado_caso = 'Escalado' THEN 1 END) AS escalados
                                FROM caso WHERE id_usuario = ?;", [$id_usuario]);
        return $total_caso;
    }

    public static function obtener_tiempo_promedio_asesores($id_usuario)
    {
        $tiempo_promedio = DB::select(
            "SELECT tipo_consulta.nombre_tipo_consulta, 
                    producto.nombre_producto, 
                    TIME_FORMAT(SEC_TO_TIME(AVG(TIMESTAMPDIFF(SECOND, caso.fecha_registro_caso, caso.fecha_actualizacion_caso))), '%H:%i:%s') AS promedio_tiempo_formato, 
                    AVG(TIMESTAMPDIFF(MINUTE, caso.fecha_registro_caso, caso.fecha_actualizacion_caso)) AS promedio_tiempo_minutos 
             FROM caso 
             INNER JOIN producto ON caso.id_producto = producto.id 
             INNER JOIN tipo_consulta ON caso.id_tipo_consulta = tipo_consulta.id 
             WHERE caso.id_usuario = ? 
             GROUP BY caso.id_tipo_consulta, tipo_consulta.nombre_tipo_consulta, producto.nombre_producto;", 
            [$id_usuario]
        );
        return $tiempo_promedio;
    }

    public static function obtener_mejor_tiempo_caso_promedio($id_usuario)
    {
        $tiempo_mejor_promedio_caso_resulto = DB::select(
            "SELECT tipo_consulta.nombre_tipo_consulta, 
                    producto.nombre_producto, 
                    TIME_FORMAT(SEC_TO_TIME(AVG(TIMESTAMPDIFF(SECOND, caso.fecha_registro_caso, caso.fecha_actualizacion_caso))), '%H:%i:%s') AS promedio_tiempo_formato, 
                    AVG(TIMESTAMPDIFF(MINUTE, caso.fecha_registro_caso, caso.fecha_actualizacion_caso)) AS promedio_tiempo_minutos 
             FROM caso 
             INNER JOIN producto ON caso.id_producto = producto.id 
             INNER JOIN tipo_consulta ON caso.id_tipo_consulta = tipo_consulta.id 
             WHERE caso.id_usuario = ? 
             GROUP BY caso.id_tipo_consulta, tipo_consulta.nombre_tipo_consulta, producto.nombre_producto 
             ORDER BY AVG(TIMESTAMPDIFF(MINUTE, caso.fecha_registro_caso, caso.fecha_actualizacion_caso)) ASC 
             LIMIT 5;", 
            [$id_usuario]
        );
        return $tiempo_mejor_promedio_caso_resulto;
    }
}
