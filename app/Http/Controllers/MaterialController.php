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

    $datosM->imagenMaterial = $request->imagenMaterial;
    $datosM->descripcionMaterial = $request->descripcionMaterial;
    $datosM->marcaMaterial = $request->marcaMaterial;
    $datosM->tituloMaterial = $request->tituloMaterial;
    $datosM->precio = $request->precio;
    $datosM->despacho = $request->despacho;
    $datosM->retiro = $request->retiro;
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
    if ($request->input('imagenMaterial') ||
        $request->input('descripcionMaterial') ||
        $request->input('marcaMaterial') ||
        $request->input('tituloMaterial') ||
        $request->input('precio') ||
        $request->input('despacho') ||
        $request->input('retiro')  ||
        $request->input('tienda_idTienda')) {

        $datosM->imagenMaterial = $request->input('imagenMaterial');    
        $datosM->descripcionMaterial = $request->input('descripcionMaterial');
        $datosM->marcaMaterial = $request->input('marcaMaterial');
        $datosM->tituloMaterial = $request->input('tituloMaterial');
        $datosM->precio = $request->input('precio');
        $datosM->despacho = $request->input('despacho');
        $datosM->retiro = $request->input('retiro');
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
