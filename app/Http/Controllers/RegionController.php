<?php 
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Region;

class RegionController extends Controller{
/**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $datosR = Region::all();
        return response()->json($datosR); 
    }
/**
 * Store a newly created resource in storage.
 *
 * @param  \Illuminate\Http\Request  $request
 * @return \Illuminate\Http\Response
 */
public function crear(Request $request)
{
    $datosR = new Region();
    $datosR->nomRegion = $request->nomRegion;
    $datosR->save();
    return response()->json($request);
}

public function verID($idRegion)
{
    $datosR = Region::find($idRegion);
    return response()->json($datosR);
}
/**
 * Update the specified resource in storage.
 *
 * @param  \Illuminate\Http\Request  $request
 * @param  \App\Models\Project  $project
 * @return \Illuminate\Http\Response
 */
public function modificar(Request $request, $idRegion)
{

    $datosR = Region::find($idRegion);
    if ($request->input('nomRegion')) {
        $datosR->nomRegion = $request->input('nomRegion');
    }
    $datosR->save();

    return response()->json("Registro Actualizado");
}
/**
 * Remove the specified resource from storage.
 *
 * @param  \App\Models\Project  $project
 * @return \Illuminate\Http\Response
 */
public function eliminar($idRegion)
{

    $datosR = Region::find($idRegion);
    $datosR->delete();
    return response()->json("Registro Borrado");
}
}
