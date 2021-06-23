<?php 
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Cubicacion;

class CubicacionController extends Controller{

 /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $datosCU = Cubicacion::all();
        return response()->json($datosCU); 
    }
/**
 * Store a newly created resource in storage.
 *
 * @param  \Illuminate\Http\Request  $request
 * @return \Illuminate\Http\Response
 */
public function crear(Request $request)
{
    $datosCU = new Cubicacion();
    $datosCU->area = $request->area;
    $datosCU->profundidad = $request->profundidad;
    $datosCU->ancho = $request->ancho;
    $datosCU->volumen = $request->volumen;
    $datosCU->m3 = $request->m3;
    $datosCU->dosificacion = $request->dosificacion;
    $datosCU->grava  = $request->grava;
    $datosCU->arena = $request->arena;
    $datosCU->agua = $request->agua;
    $datosCU->largo = $request->largo;
    $datosCU->cantidadSacos = $request->cantidadSacos;
    $datosCU->Inmueble_idInmueble = $request->Inmueble_idInmueble;
    $datosCU->Construcciones_idConstrucciones = $request->Construcciones_idConstrucciones;

    $datosCU->save();
    return response()->json($request);
}

public function verID($idCubica)
{
   $datosCU = Cubicacion::find($idCubica);
    return response()->json($datosCU);
}
/**
 * Update the specified resource in storage.
 *
 * @param  \Illuminate\Http\Request  $request
 * @param  \App\Models\Project  $project
 * @return \Illuminate\Http\Response
 */
public function modificar(Request $request, $idCubica)
{

    $datosCU = Cubicacion::find($idCubica);
    if ($request->input('area') ||
    $request->input('profundidad') ||
    $request->input('ancho') ||
    $request->input('volumen') ||
    $request->input('m3') ||
    $request->input('dosificacion') ||
    $request->input('grava') ||
    $request->input('arena') ||
    $request->input('agua') ||
    $request->input('largo') ||
    $request->input('cantidadSacos') ||
    $request->input('Inmueble_idInmueble') ||
    $request->input('Construcciones_idConstrucciones')) {

        $datosCU->area = $request->input('area');
        $datosCU->profundidad = $request->input('profundidad');
        $datosCU->ancho = $request->input('ancho');
        $datosCU->volumen = $request->input('volumen');
        $datosCU->m3 = $request->input('m3');
        $datosCU->dosificacion = $request->input('dosificacion');
        $datosCU->grava = $request->input('grava');
        $datosCU->arena = $request->input('arena');
        $datosCU->agua = $request->input('agua');
        $datosCU->largo = $request->input('largo');
        $datosCU->cantidadSacos = $request->input('cantidadSacos');
        $datosCU->Inmueble_idInmueble = $request->input('Inmueble_idInmueble');
        $datosCU->Construcciones_idConstrucciones = $request->input('Construcciones_idConstrucciones');
    }
    $datosCU->save();

    return response()->json("Registro Actualizado");
}
/**
 * Remove the specified resource from storage.
 *
 * @param  \App\Models\Project  $project
 * @return \Illuminate\Http\Response
 */
public function eliminar($idCubica)
{

    $datosCU = Cubicacion::find($idCubica);
    $datosCU->delete();
    return response()->json("Registro Borrado");
}
}
