<?php 
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\TipoUsuario;

class TipoUsuarioController extends Controller{

   /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $datosTU = TipoUsuario::all();
        return response()->json($datosTU); 
    }
/**
 * Store a newly created resource in storage.
 *
 * @param  \Illuminate\Http\Request  $request
 * @return \Illuminate\Http\Response
 */
public function crear(Request $request)
{
    $datosTU = new TipoUsuario();
    $datosTU->tipo = $request->tipo;
    $datosTU->save();
    return response()->json($request);
}

public function verID($idTipoUsuario)
{
    $datosTU = new TipoUsuario();
    $datosTU = $datosTU->find($idTipoUsuario);
    return response()->json($datosTU);
}
/**
 * Update the specified resource in storage.
 *
 * @param  \Illuminate\Http\Request  $request
 * @param  \App\Models\Project  $project
 * @return \Illuminate\Http\Response
 */
public function modificar(Request $request, $idTipoUsuario)
{

    $datosTU = TipoUsuario::find($idTipoUsuario);
    if ($request->input('tipo')) {
        $datosTU->tipo = $request->input('tipo');
    }
    $datosTU->save();

    return response()->json("Registro Actualizado");
}
/**
 * Remove the specified resource from storage.
 *
 * @param  \App\Models\Project  $project
 * @return \Illuminate\Http\Response
 */
public function eliminar($idTipoUsuario)
{

    $datosTU = TipoUsuario::find($idTipoUsuario);
    $datosTU->delete();
    return response()->json("Registro Borrado");
}
}
