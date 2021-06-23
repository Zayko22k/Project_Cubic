<?php 
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Arriendo;

class ArriendoController extends Controller{
 /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $datosAR = Arriendo::all();
        return response()->json($datosAR); 
    }
/**
 * Store a newly created resource in storage.
 *
 * @param  \Illuminate\Http\Request  $request
 * @return \Illuminate\Http\Response
 */
public function crear(Request $request)
{
    $datosAR = new Arriendo();
    $datosAR->vencido = $request->vencido;
    $datosAR->activo = $request->activo;
    $datosAR->servicio_idServicio = $request->servicio_idServicio;
    $datosAR->tipopago_idTipoPago = $request->tipopago_idTipoPago;
    $datosAR->users_id = $request->users_id;
    $datosAR->save();
    return response()->json($request);
}

public function verID($idArriendo)
{
   $datosAR = Arriendo::find($idArriendo);
    return response()->json($datosAR);
}
public function verId_User($users_id)
{

    $dato =Arriendo::select('arriendo.idArriendo',
    'arriendo.created_at',
    'arriendo.servicio_idServicio',
    'servicio.nombre',
    'servicio.precio')
    ->join('servicio','servicio.idServicio', '=','arriendo.servicio_idServicio')
    ->where('arriendo.users_id', '=', $users_id)
    ->get();

    return response()->json($dato);
}
/**
 * Update the specified resource in storage.
 *
 * @param  \Illuminate\Http\Request  $request
 * @param  \App\Models\Project  $project
 * @return \Illuminate\Http\Response
 */
public function modificar(Request $request, $idArriendo)
{

    $datosAR = Arriendo::find($idArriendo);
    if ($request->input('vencido') ||
    $request->input('activo') ||
    $request->input('servicio_idServicio') ||
    $request->input('tipopago_idTipoPago') ||
    $request->input('users_id')) {

        $datosAR->vencido = $request->input('vencido');
        $datosAR->activo = $request->input('activo');
        $datosAR->servicio_idServicio = $request->input('servicio_idServicio');
        $datosAR->tipopago_idTipoPago = $request->input('tipopago_idTipoPago');
        $datosAR->users_id = $request->input('users_id');
    }
    $datosAR->save();

    return response()->json("Registro Actualizado");
}
/**
 * Remove the specified resource from storage.
 *
 * @param  \App\Models\Project  $project
 * @return \Illuminate\Http\Response
 */
public function eliminar($idArriendo)
{

    $datosAR = TipoUsuario::find($idArriendo);
    $datosAR->delete();
    return response()->json("Registro Borrado");
}
}
