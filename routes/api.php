<?php

use App\Http\Controllers\ClientesBloqueadosController;
use App\Http\Controllers\DetalleCotizacionController;
use App\Http\Controllers\TipoPagoController;
use App\Http\Controllers\MaterialController;
use App\Http\Controllers\RegionController;
use App\Http\Controllers\TiendaController;
use App\Http\Controllers\CubicacionController;
use App\Http\Controllers\ServicioController;
use App\Http\Controllers\CiudadController;
use App\Http\Controllers\ArriendoController;
use App\Http\Controllers\TipoUsuarioController;
use App\Http\Controllers\InmuebleController;
use App\Http\Controllers\TipoConstruccionController;
use App\Http\Controllers\ConstruccionesController;
use App\Http\Controllers\UserController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

// Route::middleware('auth:api')->get('/user', function (Request $request) {
//     return $request->user();
// });
//User
Route::get('indexUS', 'App\Http\Controllers\UserController@index');
Route::post('register', 'App\Http\Controllers\UserController@register');
Route::post('login', 'App\Http\Controllers\UserController@authenticate');
Route::group(['middleware' => ['jwt.verify']], function() {

    Route::post('user','App\Http\Controllers\UserController@getAuthenticatedUser');

});
//Arriendo
Route::get('indexAr', [ArriendoController::class, 'index']);
Route::get('arriendoVence/{users_id}', [ArriendoController::class, 'diferenciaDias']);
Route::get('buscarAr/{idArriendo}', [ArriendoController::class,'verID']);
Route::get('buscarxUser/{users_id}', [ArriendoController::class,'verId_User']);
Route::post('crearAr', [ArriendoController::class, 'crear']);
Route::delete('/borrarAr/{idArriendo}', [ArriendoController::class, 'eliminar']);
Route::post('/updateAr/{idArriendo}', [ArriendoController::class,'modificar']);

//Asistencia
Route::get('indexA', [AsistenciaController::class, 'index']);
Route::get('/buscarA/{idAsistencia}', [AsistenciaController::class,'verID']);
Route::post('crearA', [AsistenciaController::class, 'crear']);
Route::delete('/borrarA/{idAsistencia}', [AsistenciaController::class, 'eliminar']);
Route::post('/updateA/{idAsistencia}', [AsistenciaController::class,'modificar']);

//Construcciones
Route::get('indexC', [ConstruccionesController::class, 'index']);
Route::get('indexSR/{idTipoConstruccion}', [ConstruccionesController::class, 'indexJoin']);
Route::get('/buscarC/{idConstrucciones}', [ConstruccionesController::class,'verID']);
Route::post('crearC', [ConstruccionesController::class, 'crear']);
Route::delete('/borrarC/{idConstrucciones}', [ConstruccionesController::class, 'eliminar']);
Route::post('/updateC/{idConstrucciones}', [ConstruccionesController::class,'modificar']);

//Cubicacion
Route::get('indexCubic', [CubicacionController::class, 'index']);
Route::get('/buscarCubic/{idCubica}', [CubicacionController::class,'verID']);
Route::post('crearCubic', [CubicacionController::class, 'crear']);
Route::delete('/borrarCubic/{idCubica}', [CubicacionController::class, 'eliminar']);
Route::post('/updateCubic/{idCubica}', [CubicacionController::class, 'modificar']);

//DetalleCotizacion
Route::get('indexDT', [DetalleCotizacionController::class, 'index']);
Route::get('/buscarDT/{idDetalleCoti}', [DetalleCotizacionController::class, 'verID']);
Route::get('/buscarMicoti/{users_id}', [DetalleCotizacionController::class, 'verId_User']);
Route::get('/buscarCoti/{keywords}', [DetalleCotizacionController::class, 'buscarCotizacion']);
Route::post('crearDT', [DetalleCotizacionController::class, 'crear']);
Route::delete('/borrarDT/{idDetalleCoti}', [DetalleCotizacionController::class, 'eliminar']);
Route::post('/updateDT/{idDetalleCoti}', [DetalleCotizacionController::class, 'modificar']);

//Inmueble
Route::get('indexIn', [InmuebleController::class, 'index']);
Route::get('/buscarIn/{idInmueble}', [InmuebleController::class,'verID']);
Route::post('crearIn', [InmuebleController::class, 'crear']);
Route::delete('/borrarIn/{idInmueble}', [InmuebleController::class, 'eliminar']);
Route::post('/updateIn/{idInmueble}', [InmuebleController::class,'modificar']);
//Material
Route::get('indexM', [MaterialController::class, 'index']);
Route::get('/buscarM/{idMaterial}', [MaterialoController::class, 'verID']);
Route::post('crearMa', [MaterialController::class, 'crear']);
Route::delete('/borrarM/{idMaterial}', [MaterialoController::class, 'eliminar']);
Route::post('/updateM/{idMaterial}', [MaterialController::class, 'modificar']);

//Region
Route::get('indexRe', [RegionController::class, 'index']);
Route::get('/buscarRe/{idRegion}', [RegionController::class,'verID']);
Route::post('crearRe', [RegionController::class, 'crear']);
Route::delete('/borrarRe/{idRegion}', [RegionController::class, 'eliminar']);
Route::post('/updateRe/{idRegion}', [RegionController::class, 'modificar']);

//Servicio
Route::get('indexSE', [ServicioController::class, 'index']);
Route::get('/buscarSE/{idServicio}', [ServicioController::class,'verID']);
Route::post('crearSE', [ServicioController::class, 'crear']);
Route::delete('/borrarSE/{idServicio}', [ServicioController::class, 'eliminar']);
Route::post('/updateSE/{idServicio}', [ServicioController::class,'modificar']);

//Tienda
Route::get('indexTienda', [TiendaController::class, 'index']);
Route::get('buscarTienda/{idTienda}', [TiendaController::class, 'verID']);
Route::post('crearTienda', [TiendaController::class, 'crear']);
Route::delete('/borrarTienda/{idTienda}', [TiendaController::class, 'eliminar']);
Route::post('/updateTienda/{idTienda}', [TiendaController::class, 'modificar']);

//Tipo de Construccion
Route::get('indexTC', [TipoConstruccionController::class, 'index']);
Route::get('/buscarTC/{idTipoConstruccion}', [TipoConstruccionController::class,'verID']);
Route::post('crearTC', [TipoConstruccionController::class, 'crear']);
Route::delete('/borrarTC/{idTipoConstruccion}', [TipoConstruccionController::class, 'eliminar']);
Route::post('/updateTC/{idTipoConstruccion}', [TipoConstruccionController::class,'modificar']);

//Tipo Pago
Route::get('indexTG', [TipoPagoController::class, 'index']);
Route::get('/buscarTG/{idTipoPago}', [TipoPagoController::class,'verID']);
Route::post('crearTG', [TipoPagoController::class, 'crear']);
Route::delete('/borrarTG/{idTipoPago}', [TipoPagoController::class, 'eliminar']);
Route::post('/updateTG/{idTipoPago}', [TipoPagoController::class, 'modificar']);

//Tipo Usuario
Route::get('indexTU', [TipoUsuarioController::class, 'index']);
Route::get('/buscarTU/{idTipoUsuario}', [TipoUsuarioController::class,'verID']);
Route::post('crearTU', [TipoUsuarioController::class, 'crear']);
Route::delete('/borrarTU/{idTIpoUsuario}', [TipoUsuarioController::class, 'eliminar']);
Route::post('/updateTU/{idTipoUsuario}', [TipoUsuarioController::class,'modificar']);




