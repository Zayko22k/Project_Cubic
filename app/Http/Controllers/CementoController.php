<?php 
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Cemento;

class CementoController extends Controller{

 /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $datosM = Cemento::all();
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
    $datosM = new Cemento();
    $datosM->imagenCemento = $request->imagenCemento;
    $datosM->descripcionCemento = $request->descripcionCemento;
    $datosM->marcaCemento = $request->marcaCemento;
    $datosM->precio = $request->precio;
    $datosM->despacho = $request->despacho;
    $datosM->retiro = $request->retiro;
    $datosM->tienda_idTienda = $request->tienda_idTienda;

    $datosM->save();
    return response()->json($datosM);
}

public function verID($idCemento)
{
   $datosM = Cemento::find($idCemento);
    return response()->json($datosTU);
}
/**
 * Update the specified resource in storage.
 *
 * @param  \Illuminate\Http\Request  $request
 * @param  \App\Models\Project  $project
 * @return \Illuminate\Http\Response
 */
public function modificar(Request $request, $idCemento)
{

    $datosM = Material::find($idMaterial);
    if ($request->input('imagenCemento') ||
        $request->input('descripcionCemento') ||
        $request->input('marcaCemento') ||
        $request->input('precio') ||
        $request->input('despacho') ||
        $request->input('retiro')  ||
        $request->input('tienda_idTienda')) {

        $datosM->imagenCemento = $request->input('imagenCemento');    
        $datosM->descripcionCemento = $request->input('descripcionCemento');
        $datosM->marcaCemento = $request->input('marcaCemento');
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
public function eliminar($idCemento)
{
    $datosM = Cemento::find($idCemento);
    $datosM->delete();
    return response()->json("Registro Borrado");
}
}
