<?php 
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\TipoPago;

class TipoPagoController extends Controller{

 /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $datosTG = TipoPago::all();
        return response()->json($datosTG); 
    }
/**
 * Store a newly created resource in storage.
 *
 * @param  \Illuminate\Http\Request  $request
 * @return \Illuminate\Http\Response
 */
public function crear(Request $request)
{
    $datosTG = new TipoPago();
    $datosTG->nombre = $request->nombre;
    $datosTG->save();
    return response()->json($request);
}

public function verID($idTipoPago)
{
   $datosTG = TipoPago::find($idTipoPago);
    return response()->json($datosTG);
}
/**
 * Update the specified resource in storage.
 *
 * @param  \Illuminate\Http\Request  $request
 * @param  \App\Models\Project  $project
 * @return \Illuminate\Http\Response
 */
public function modificar(Request $request, $idTipoPago)
{

    $datosTG = TipoPago::find($idTipoPago);
    if ($request->input('nombre')) {
        $datosTU->nombre = $request->input('nombre');
    }
    $datosTG->save();

    return response()->json("Registro Actualizado");
}
/**
 * Remove the specified resource from storage.
 *
 * @param  \App\Models\Project  $project
 * @return \Illuminate\Http\Response
 */
public function eliminar($idTipoPago)
{

    $datosTG = TipoUsuario::find($idTipoPago);
    $datosTG->delete();
    return response()->json("Registro Borrado");
}
}
