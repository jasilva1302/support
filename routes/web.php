<?php
use App\Http\Controllers\page_controller;
use App\Http\Controllers\producto_controller;
use App\Http\Controllers\detalle_caso_controller;
use App\Http\Controllers\CasosController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\nueva_solicitud_controller;
use App\Http\Controllers\reporte_caso_controller;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\reporte_caso_usuario_controller;

Route::middleware(['guest'])->group(function () {
   
    Route::post('login', [AuthController::class, 'login'])->name('login');
});





    Route::controller(page_controller::class)->group(function(){

    Route::get('/', 'inicio_sesion')->name('Inicio_De_Sesion');

    Route::get('Aclaracion_De_Saldo', 'aclaracion_salgo')->name('Aclaracion_De_Saldo')->middleware('auth');


    Route::get('Acuerdos_De_Pagos',  'acuerdo_pago')->name('Acuerdos_De_Pagos')->middleware('auth');

    Route::get('Escalar_Caso', 'escalar_caso')->name('Escalar_Caso')->middleware('auth');
    
    Route::get('Estadisticas_Del_Asesor', 'estadisticas_asesor')->name('Estadisticas_Del_Asesor')->middleware('auth');

    Route::get('Solicitud_De_Productos', 'solicitud_producto')->name('Solicitud_De_Productos')->middleware('auth');

    Route::get('Panel_De_Usuario', 'panel_usuario')->name('Panel_De_Usuario')->middleware('auth');

    Route::get('Panel_De_Usuario_Coordinador', 'panel_usuario_coordinador')->name('Panel_De_Usuario_Coordinador')->middleware('auth');

    Route::get('Reporte_Caso', 'reporte_caso')->name('Reporte_Caso')->middleware('auth');

    
    Route::get('Detalle_De_Caso', 'detalle_caso')->name('Detalle_De_Caso')->middleware('auth');
    
});


//Interfaz de Crear un nuevo caso

Route::controller(nueva_solicitud_controller::class)->group(function(){
    Route::post('Detalle_De_Caso', 'create')->name('create')->middleware('auth');
    Route::post('Nueva_Solicitud', 'consultar_cliente')->name('consultar_cliente')->middleware('auth');
});




//Interfaz de Crear un nuevo caso muestra los producctos disponibles
Route::controller(producto_controller::class)->group(function(){
    Route::get('Nueva_Solicitud', 'nueva_solicitud')->name('Nueva_Solicitud')->middleware('auth');
    Route::resource('productos', Producto_Controller::class)->middleware('auth');
});



//Interfaz para detalle caso
Route::get('Detalle_De_Caso={numero_caso}', [detalle_caso_controller::class, 'index'])->name('Usuario\detalle_caso')->middleware('auth');
// Route::get('Detalle_De_Caso/{numero_caso}', [detalle_caso_controller::class, 'index'])->name('Usuario\detalle_caso');

Route::controller(detalle_caso_controller::class)->group(function(){
    Route::post('prueba', 'actualizar_caso')->name('actualizar_caso')->middleware('auth');
});




//Interfaz para reporte caso
Route::controller(reporte_caso_controller::class)->group(function(){
    Route::get('Reporte_Caso', 'obtener_total_casos')->name('Reporte_Caso')->middleware('auth');
});


Route::post('login', [AuthController::class, 'login'])->name('login');


Route::post('/logout', [AuthController::class, 'logout'])->name('logout');


Route::get('/reporte_caso_usuario', [reporte_caso_usuario_controller::class, 'index'])->name('reporte_caso_usuario')->middleware('auth');
Route::get('/casos_escalados', [reporte_caso_controller::class, 'listar_casos_escalados'])->name('listar_casos_escalados')->middleware('auth');

//Interfaz pdf de reporte caso
Route::get('/reporte-casos-pdf', [reporte_caso_controller::class, 'generar_reporte_pdf'])->middleware('auth');

Route::get('/consulta_reciente', [CasosController::class, 'consultasRecientes'])->name('consultasRecientes')->middleware('auth');