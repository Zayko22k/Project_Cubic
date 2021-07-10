<?php 
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\RespuestAsistencia;

class RespuestAsistenciaController extends Controller{
     /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
   public function index(){

    $datoRes = RespuestAsistencia::all();
    return response()->json($datoRes);
   }

   /**
 * Store a newly created resource in storage.
 *
 * @param  \Illuminate\Http\Request  $request
 * @return \Illuminate\Http\Response
 */
   public function crear(Request $request){

    $datoRes = new RespuestAsistencia();;

    $datoRes->respuesta = $request->respuesta;
    $datoRes->Asistencia_idAsistencia = $request->Asistencia_idAsistencia;
    $datoRes->users_id = $request->users_id;
    $datoRes->save();

    return response()->json($request);
   }


   public function verID($idRespuestAsistencia)
{
   $datoRes = RespuestAsistencia::find($idRespuestAsistencia);
    return response()->json($datoRes);
}
/**
 * Update the specified resource in storage.
 *
 * @param  \Illuminate\Http\Request  $request
 * @param  \App\Models\Project  $project
 * @return \Illuminate\Http\Response
 */
public function modificar(Request $request, $idRespuestAsistencia)
{

    $datoRes = RespuestAsistencia::find($idRespuestAsistencia);
    if ($request->input('respuesta') ||
    $request->input('Asistencia_idAsistencia') ||
    $request->input('users_id')) {

        $datoRes->respuesta = $request->input('respuesta');
        $datoRes->users_id = $request->input('users_id');
        $datoRes->Asistencia_idAsistencia = $request->input('Asistencia_idAsistencia');
      
    }
    $datoRes->save();

    return response()->json("Registro Actualizado");
}
    /**
 * Remove the specified resource from storage.
 *
 * @param  \App\Models\Project  $project
 * @return \Illuminate\Http\Response
 */
public function eliminar($idRespuestAsistencia)
{

    $datoRes = RespuestAsistencia::find($idRespuestAsistencia);
    $datoRes->delete();
    return response()->json("Registro Borrado");
}


}
