<?php 
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Ciudad;

class CiudadController extends Controller{

/**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $datosCD = Ciudad::all();
        return response()->json($datosCD); 
    }
/**
 * Store a newly created resource in storage.
 *
 * @param  \Illuminate\Http\Request  $request
 * @return \Illuminate\Http\Response
 */
public function crear(Request $request)
{
    $datosCD = new Ciudad();
    $datosCD->nomCiudad = $request->nomCiudad;
    $datosCD->save();
    return response()->json($request);
}

public function verID($idCiudad)
{
    $datosCD = Ciudad::find($idCiudad);
    return response()->json($datosCD);
}
/**
 * Update the specified resource in storage.
 *
 * @param  \Illuminate\Http\Request  $request
 * @param  \App\Models\Project  $project
 * @return \Illuminate\Http\Response
 */
public function modificar(Request $request, $idCiudad)
{

    $datosCD = Ciudad::find($idCiudad);
    if ($request->input('nomCiudad') || $request->input('Region_idRegion')) {
        $datosCD->nomCiudad = $request->input('nomCiudad');
        $datosCD->Region_idRegion = $request->input('Region_idRegion');
    }
    $datosCD->save();

    return response()->json("Registro Actualizado");
}
/**
 * Remove the specified resource from storage.
 *
 * @param  \App\Models\Project  $project
 * @return \Illuminate\Http\Response
 */
public function eliminar($idCiudad)
{

    $datosCD = Region::find($idCiudad);
    $datosCD->delete();
    return response()->json("Registro Borrado");
}
}
