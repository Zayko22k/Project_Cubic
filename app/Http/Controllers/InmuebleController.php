<?php 
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Inmueble;
class InmuebleController extends Controller{

  /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    
    public function index()
    {
        $datosIn = Inmueble::all();
        return response()->json($datosIn); 
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function crear(Request $request)
    {
        $datosIn = new Inmueble();
        $datosIn->nomInmueble = $request->nomInmueble;
        $datosIn->save();
        return response()->json($request);
    }

    public function verID($idInmueble)
    {
        $datosIn = new Inmueble();
        $datosEn = $datosIn->find($idInmueble);
        return response()->json($datosEn);
    }
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Project  $project
     * @return \Illuminate\Http\Response
     */
    public function modificar(Request $request, $idInmueble)
    {

        $datosIn = Inmueble::find($idInmueble);
        if ($request->input('nomInmueble')) {
            $datosIn->nomInmueble = $request->input('nomInmueble');
        }
        $datosIn->save();

        return response()->json("Registro Actualizado");
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Project  $project
     * @return \Illuminate\Http\Response
     */
    public function eliminar($idInmueble)
    {

        $datosIn = Inmueble::find($idInmueble);
        $datosIn->delete();
        return response()->json("Registro Borrado");
    }
}
