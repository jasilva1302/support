<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class reporte_caso_model extends Model
{
    use HasFactory;

    //  1. Volume of clients impacted positively by the new system.
    public static function obtener_reporte_caso_estado()
    {
        $total_caso = DB::select("
            SELECT 
                COUNT(CASE WHEN estado_caso = 'Solucionado' THEN 1 END) AS solucionados, 
                COUNT(CASE WHEN estado_caso = 'Pendiente' THEN 1 END) AS pendientes,
                COUNT(CASE WHEN estado_caso = 'Comunicación Interrumpida' THEN 1 END) AS interrumpida,
                COUNT(CASE WHEN estado_caso = 'Suspendida por el cliente' THEN 1 END) AS suspendida,
                COUNT(CASE WHEN estado_caso = 'Escalado' THEN 1 END) AS escalado
            FROM caso;
        ");
        return $total_caso;
    }

    //  2. Average time advisors save using the new system.
    public static function obtener_tiempo_promedio_asesores()
    {
        $tiempo_promedio = DB::select("
            SELECT 
                caso.id_tipo_consulta, 
                producto.nombre_producto, 
                TIME_FORMAT(SEC_TO_TIME(AVG(TIMESTAMPDIFF(SECOND, caso.fecha_registro_caso, caso.fecha_actualizacion_caso))), '%H:%i:%s') AS promedio_tiempo_formato, 
                AVG(TIMESTAMPDIFF(MINUTE, caso.fecha_registro_caso, caso.fecha_actualizacion_caso)) AS promedio_tiempo_minutos 
            FROM caso 
            INNER JOIN producto ON caso.id_producto = producto.id 
            WHERE estado_caso = 'Solucionado'
            GROUP BY caso.id_tipo_consulta, producto.nombre_producto;
        ");
        return $tiempo_promedio;
    }

    //  3. Cases resolved the fastest using the new system.
    public static function obtener_mejor_tiempo_caso_promedio()
    {
        $tiempo_mejor_promedio_caso_resulto = DB::select("
            SELECT 
                caso.id_tipo_consulta, 
                producto.nombre_producto, 
                TIME_FORMAT(SEC_TO_TIME(AVG(TIMESTAMPDIFF(SECOND, caso.fecha_registro_caso, caso.fecha_actualizacion_caso))), '%H:%i:%s') AS promedio_tiempo_formato, 
                AVG(TIMESTAMPDIFF(MINUTE, caso.fecha_registro_caso, caso.fecha_actualizacion_caso)) AS promedio_tiempo_minutos 
            FROM caso 
            INNER JOIN producto ON caso.id_producto = producto.id 
            WHERE estado_caso = 'Solucionado'
            GROUP BY caso.id_tipo_consulta, producto.nombre_producto 
            ORDER BY AVG(TIMESTAMPDIFF(MINUTE, caso.fecha_registro_caso, caso.fecha_actualizacion_caso)) ASC 
            LIMIT 5;
        ");
        return $tiempo_mejor_promedio_caso_resulto;
    }

    // New function to get users and their case handling statistics
    public static function obtener_estadisticas_usuarios()
    {
        $estadisticas_usuarios = DB::select("
            SELECT 
                users.name, 
                COUNT(caso.id) AS cantidad_casos, 
                AVG(TIMESTAMPDIFF(MINUTE, caso.fecha_registro_caso, caso.fecha_actualizacion_caso)) AS promedio_tiempo_minutos 
            FROM users 
            LEFT JOIN caso ON users.id = caso.id_usuario 
            WHERE caso.estado_caso = 'Solucionado'
            GROUP BY users.name;
        ");
        return $estadisticas_usuarios;
    }
}
