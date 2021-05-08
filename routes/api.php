<?php

use App\Http\Controllers\ClientesBloqueadosController;
use App\Http\Controllers\ServicioController;
use App\Http\Controllers\TipoUsuarioController;
use App\Models\Clientes_Bloqueados;
use App\Models\Servicio;
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
//tipos de usuario
Route::get('indexTP', [TipoUsuarioController::class, 'index']);
Route::get('/buscarTP/{idTipoUsuario}', [TipoUsuarioController::class,'verID']);
Route::post('crearTP', [TipoUsuarioController::class, 'crear']);
Route::delete('/borrarTP/{idTipoUsuario}', [TipoUsuarioController::class, 'eliminar']);
Route::post('/updateTP/{idTipoUsuario}', [TipoUsuarioController::class,'modificar']);
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