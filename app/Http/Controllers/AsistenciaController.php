<?php 
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Asistencia;

class AsistenciaController extends Controller{

 /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $datosA = Asistencia::all();
        return response()->json($datosA); 
    }
/**
 * Store a newly created resource in storage.
 *
 * @param  \Illuminate\Http\Request  $request
 * @return \Illuminate\Http\Response
 */
public function crear(Request $request)
{
    $datosA = new Asistencia();
    $datosA->consulta = $request->consulta;
    $datosA->email = $request->email;
    $datosA->fecha_creacion = $request->fecha_creacion;
    $datosA->users_id = $request->users_id;
    $datosA->Region_idRegion = $request->Region_idRegion;
    $datosA->save();
    return response()->json($request);
}

public function verID($idAsistencia)
{
    $datosA = Asistencia::find($idAsistencia);
    return response()->json($datosA);
}
/**
 * Update the specified resource in storage.
 *
 * @param  \Illuminate\Http\Request  $request
 * @param  \App\Models\Project  $project
 * @return \Illuminate\Http\Response
 */
public function modificar(Request $request, $idAsistencia)
{

    $datosA = Asistencia::find($idAsistencia);
    if ($request->input('consulta') || $request->input('email') || $request->input('fecha_creacion')
        || $request->input('users_id') || $request->input('Region_idRegion')) {
        $datosA->consulta = $request->input('consulta');
        $datosA->email = $request->input('email');
        $datosA->fecha_creacion = $request->input('fecha_creacion');
        $datosA->users_id = $request->input('users_id');
        $datosA->Region_idRegion = $request->input('Region_idRegion');
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
public function eliminar($idAsistencia)
{

    $datosA = Asistencia::find($idAsistencia);
    $datosA->delete();
    return response()->json("Registro Borrado");
}
}
