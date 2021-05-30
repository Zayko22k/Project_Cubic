<?php

use App\Http\Controllers\ClientesBloqueadosController;
use App\Http\Controllers\ServicioController;
use App\Http\Controllers\UsuarioController;
use App\Http\Controllers\InmuebleController;
use App\Http\Controllers\TipoConstruccionController;
use App\Http\Controllers\ConstruccionesController;
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
//User(Admin BD)
Route::post('register', 'App\Http\Controllers\UserController@register');
Route::post('login', 'App\Http\Controllers\UserController@authenticate');
Route::group(['middleware' => ['jwt.verify']], function() {

    Route::post('user','App\Http\Controllers\UserController@getAuthenticatedUser');

});
//Usuario //Admin app
Route::get('indexUS', [UsuarioController::class, 'index']);
Route::get('/buscarUS/{idUsuario}', [UsuarioController::class,'verID']);
Route::post('crearUS', [UsuarioController::class, 'crear']);
Route::delete('/borrarUS/{idUsuario}', [UsuarioController::class, 'eliminar']);
Route::post('/updateUS/{idUsuario}', [UsuarioController::class,'modificar']);
//Servicio
Route::get('indexSE', [ServicioController::class, 'index']);
Route::get('/buscarSE/{idServicio}', [ServicioController::class,'verID']);
Route::post('crearSE', [ServicioController::class, 'crear']);
Route::delete('/borrarSE/{idServicio}', [ServicioController::class, 'eliminar']);
Route::post('/updateSE/{idServicio}', [ServicioController::class,'modificar']);
//Clientes_Bloqueados
Route::get('indexCB', [ClientesBloqueadosController::class, 'index']);
Route::get('/buscarCB/{idCliente_Bloqueados}', [ClientesBloqueadosController::class,'verID']);
Route::post('crearCB', [ClientesBloqueadosController::class, 'darBaja']);
Route::delete('/borrarCB/{idCliente_Bloqueados}', [ClientesBloqueadosController::class, 'eliminar']);
Route::post('/updateCB/{idCliente_Bloqueados}', [ClientesBloqueadosController::class,'darAlta']);
//Inmueble
Route::get('indexIn', [InmuebleController::class, 'index']);
Route::get('/buscarIn/{idInmueble}', [InmuebleController::class,'verID']);
Route::post('crearIn', [InmuebleController::class, 'crear']);
Route::delete('/borrarIn/{idInmueble}', [InmuebleController::class, 'eliminar']);
Route::post('/updateIn/{idInmueble}', [InmuebleController::class,'modificar']);
//Tipo de Construccion
Route::get('indexTC', [TipoConstruccionController::class, 'index']);
Route::get('/buscarTC/{idTipoConstruccion}', [TipoConstruccionController::class,'verID']);
Route::post('crearTC', [TipoConstruccionController::class, 'crear']);
Route::delete('/borrarTC/{idTipoConstruccion}', [TipoConstruccionController::class, 'eliminar']);
Route::post('/updateTC/{idTipoConstruccion}', [TipoConstruccionController::class,'modificar']);
//Construcciones
Route::get('indexC', [ConstruccionesController::class, 'index']);
Route::get('/buscarC/{idConstrucciones}', [ConstruccionesController::class,'verID']);
Route::post('crearC', [ConstruccionesController::class, 'crear']);
Route::delete('/borrarC/{idConstrucciones}', [ConstruccionesController::class, 'eliminar']);
Route::post('/updateC/{idConstrucciones}', [ConstruccionesController::class,'modificar']);