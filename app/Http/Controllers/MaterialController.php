<?php 
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Material;
class MaterialController extends Controller{

 /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $datosM = Material::all();
        return response()->json($datosM); 
    }
/**
 * Store a newly created resource in storage.
 *
 * @param  \Illuminate\Http\Request  $request
 * @return \Illuminate\Http\Response
 */
public function crear(Request $request)
{
    $datosM = new Material();

    $datosM->nomMaterial = $request->nomMaterial;
    $datosM->cantidad = $request->cantidad;
    $datosM->precio = $request->precio;
    $datosM->tienda_idTienda = $request->tienda_idTienda;

    $datosM->save();
    return response()->json($request);
}

public function verID($idMaterial)
{
   $datosM = Material::find($idMaterial);
    return response()->json($datosTU);
}
/**
 * Update the specified resource in storage.
 *
 * @param  \Illuminate\Http\Request  $request
 * @param  \App\Models\Project  $project
 * @return \Illuminate\Http\Response
 */
public function modificar(Request $request, $idMaterial)
{

    $datosM = Material::find($idMaterial);
    if ($request->input('nomMaterial') || $request->input('cantidad')
        || $request->input('precio') || $request->input('tienda_idTienda')) {

        $datosM->nomMaterial = $request->input('nomMaterial');    
        $datosM->cantidad = $request->input('cantidad');
        $datosM->precio = $request->input('precio');
        $datosM->tienda_idTienda = $request->input('idTienda');
    }
    $datosM->save();

    return response()->json("Registro Actualizado");
}
/**
 * Remove the specified resource from storage.
 *
 * @param  \App\Models\Project  $project
 * @return \Illuminate\Http\Response
 */
public function eliminar($idMaterial)
{
    $datosM = Material::find($idMaterial);
    $datosM->delete();
    return response()->json("Registro Borrado");
}
}
