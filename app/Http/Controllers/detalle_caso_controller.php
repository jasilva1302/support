<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\detalle_caso_model;

class detalle_caso_controller extends Controller
{
    public function index($numero_caso)
    {
        $detalleCasoModel = new detalle_caso_model();
        $cliente_caso = $detalleCasoModel->consultarCliente($numero_caso);

        // Obtener el primer resultado de la consulta
        $primer_resultado = reset($cliente_caso);

        // Obtener el id_producto y el id_tipo_consulta
        $id_producto = $primer_resultado->id_producto;
        $id_tipo_consulta = $primer_resultado->id_tipo_consulta;

        // Obtener la lista de documentos por caso
        $lista_documentos_por_caso = $detalleCasoModel->obtenerDocumentosPorCaso($id_producto, $id_tipo_consulta);

        $numero_caso_actual = $numero_caso;

        return view('Usuario\detalle_caso')->with('cliente_caso', $cliente_caso)
                                            ->with('numero_caso_actual', $numero_caso_actual)
                                            ->with('lista_documentos_por_caso', $lista_documentos_por_caso);
    }

    public function actualizar_caso(Request $request)
    {
        $numero_caso = $request->input('numero_caso');
        $estado_caso = $request->input('estado_caso');
        $observacion = $request->input('observacion_caso');
        $id_documento_solucion = null;
    
        // Verificar si el estado es "Solucionado" y si se ha seleccionado un documento
        if ($estado_caso === "Solucionado") {
            $id_documento_solucion = $request->input('solucion_caso');
    
            // Verificar si no se ha seleccionado ningún documento
            if (!$id_documento_solucion) {
                // Mensaje de error
                return redirect()->back()->with('error', 'Por favor seleccione el documento de solución.');
            }
        }
    
        // Verificar si se ha proporcionado una observación si el estado es "Escalado", "Comunicación Interrumpida" o "Comunicación Suspendida por el cliente"
        if (in_array($estado_caso, ["Escalado", "Comunicación Interrumpida", "Comunicación Suspendida por el cliente"]) && !$observacion) {
            // Mensaje de error
            return redirect()->back()->with('error', 'Por favor agregue una observación.');
        }
    
        $detalleCasoModel = new detalle_caso_model();
        $sql = $detalleCasoModel->actualizarCaso($numero_caso, $estado_caso, $observacion, $id_documento_solucion);
    
        if ($sql) {
            // Mensaje de éxito
            session()->flash('exito', 'Los datos se han actualizado correctamente.');
        } else {
            // Mensaje de error
            session()->flash('error', 'Ha ocurrido un error al intentar actualizar los datos.');
        }
    
        // Redireccionar a la ruta nueva_solicitud
        return redirect()->route('Nueva_Solicitud');
    }
}