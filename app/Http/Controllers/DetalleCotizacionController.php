<?php 
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\DetalleCotizacion;

class DetalleCotizacionController extends Controller{

 /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $datosDC = DetalleCotizacion::all();
        return response()->json($datosDC); 
    }
/**
 * Store a newly created resource in storage.
 *
 * @param  \Illuminate\Http\Request  $request
 * @return \Illuminate\Http\Response
 */
public function crear(Request $request)
{
    $datosDC = new DetalleCotizacion();
    $datosDC->nombreCoti = $request->nombreCoti;
    $datosDC->total = $request->total;
    $datosDC->cubicacion_idCubica = $request->cubicacion_idCubica;
    $datosDC->users_id = $request->users_id;
    $datosDC->material_idMaterial = $request->material_idMaterial;
  

    $datosDC->save();
    return response()->json($request);
}

public function verID($idDetalleCoti)
{
   $datosDC = DetalleCotizacion::find($idDetalleCoti);
    return response()->json($datosDC);
}
/**
 * Update the specified resource in storage.
 *
 * @param  \Illuminate\Http\Request  $request
 * @param  \App\Models\Project  $project
 * @return \Illuminate\Http\Response
 */
public function modificar(Request $request, $idDetalleCoti)
{

    $datosDC = DetalleCotizacion::find($idDetalleCoti);
    if ($request->input('nombreCoti') ||
    $request->input('total') ||
    $request->input('cubicacion_idCubica') ||
    $request->input('users_id') ||
    $request->input('material_idMaterial')) {
        $datosDC->nombreCoti =$request->input('nombreCoti');
        $datosDC->total = $request->input('total');
        $datosDC->cubicacion_idCubica = $request->input('cubicacion_idCubica');
        $datosDC->users_id = $request->input('users_id');
        $datosDC->material_idMaterial = $request->input('material_idMaterial');
    }
    $datosDC->save();

    return response()->json("Registro Actualizado");
}
public function verId_User($users_id)
{

    $dato =DetalleCotizacion::select('detalleCotizacion.idDetalleCoti',
    'detallecotizacion.nombreCoti',
    'detallecotizacion.total',
    'detallecotizacion.created_at',
     //cubicacion
    'detallecotizacion.cubicacion_idCubica',
    'cubicacion.area',
    'cubicacion.profundidad',
    'cubicacion.ancho',
    'cubicacion.m3',
    'cubicacion.dosificacion',
    'cubicacion.grava',
    'cubicacion.arena',
    'cubicacion.agua',
    'cubicacion.largo',
    'cubicacion.cantidad',
     //Inmueble
    'cubicacion.Inmueble_idInmueble',
    'inmueble.nomInmueble',
    //Construccione
    'construcciones.idConstrucciones',
    'construcciones.nomConstr',
    //TipoConstruccion
    'construcciones.TipoConstruccion_idTipoConstruccion',
    'tipoconstruccion.nomTipoCons',
    //Usuario
    'detallecotizacion.users_id',
    //Material
    'detallecotizacion.material_idMaterial',
    'material.imagenMaterial',
    'material.descripcionMaterial',
    'material.marcaMaterial',
    'material.precio',
    'material.despacho',
    'material.retiro',
    'material.tienda_idTienda',
    'tienda.nomTienda')
     ->join('cubicacion','cubicacion.idCubica', '=','detallecotizacion.cubicacion_idCubica')
     ->join('inmueble','inmueble.idInmueble', '=','cubicacion.inmueble_idInmueble')
     ->join('construcciones','construcciones.idConstrucciones', '=','cubicacion.construcciones_idConstrucciones')
     ->join('tipoconstruccion','tipoconstruccion.idTipoConstruccion', '=','construcciones.TipoConstruccion_idTipoConstruccion')
     ->join('material','material.idMaterial', '=','detallecotizacion.material_idMaterial')
     ->join('tienda','tienda.idTienda', '=','material.tienda_idTienda')
    ->where('detallecotizacion.users_id', '=', $users_id )
    ->get();
    if($dato->count() == 0){
          return response()->json($dato);
    }else{
        return response()->json($dato);
    
    }
}
   
/**
 * Remove the specified resource from storage.
 *
 * @param  \App\Models\Project  $project
 * @return \Illuminate\Http\Response
 */
public function eliminar($idDetalleCoti)
{
    $datosDC = DetalleCotizacion::find($idDetalleCoti);
    $datosDC->delete();
    return response()->json($datosDC);
}
}
