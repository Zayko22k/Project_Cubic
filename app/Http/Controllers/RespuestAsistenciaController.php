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
    $datoRes->vistos = 1;
    $datoRes->save();

    return response()->json($request);
   }


   public function verID($idRespuestAsistencia)
{
   $datoRes = RespuestAsistencia::find($idRespuestAsistencia);
    return response()->json($datoRes);
}

public function verIDxUser($users_id)
{
   $datoRes = RespuestAsistencia::select(
   'respuestasistencia.idRespuestAsistencia',
   'respuestasistencia.respuesta',
   'respuestasistencia.created_at',
   'respuestasistencia.Asistencia_idAsistencia',
   'respuestasistencia.visto',
   'users.name',
   'asistencia.consulta',
   'asistencia.email',
   'asistencia.users_id',
   'asistencia.Region_idRegion',
   'region.nomRegion')
   ->join('asistencia','asistencia.idAsistencia', '=', 'respuestasistencia.Asistencia_idAsistencia')
   ->join('users','users.id','=', 'respuestasistencia.users_id')
   ->join('region','region.idRegion','=', 'asistencia.Region_idRegion')
   ->where('asistencia.users_id', '=', $users_id)
   ->get();
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
    $request->input('users_id')||
    $request->input('visto')) {

        $datoRes->respuesta = $request->input('respuesta');
        $datoRes->Asistencia_idAsistencia = $request->input('Asistencia_idAsistencia');
        $datoRes->users_id = $request->input('users_id');
        $datoRes->visto = $request->input('visto');
        
      
    }
    $datoRes->save();

    return response()->json("Registro Actualizado");
}
public function vistos($idRespuestAsistencia)
{

    $datoRes = RespuestAsistencia::find($idRespuestAsistencia);
   
        $datoRes->visto = 2;
        
    
    $datoRes->save();

    return response()->json($datoRes);
}
    /**
 * Remove the specified resource from storage.
 *
 * @param  \App\Models\Project  $project
 * @return \Illuminate\Http\Response
 */
public function eliminar($idRespuestAsistencia)
{
    $datos = RespuestAsistencia::find($idRespuestAsistencia);
    $datos->delete();
   
    return response()->json("Registro Borrado");
}


}
