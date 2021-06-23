<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Servicio;

class ServicioController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $datosSE = Servicio::all();
        return response()->json($datosSE); 
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function crear(Request $request)
    {
        $datosSE = new Servicio();
        $datosSE->nombre = $request->nombre;
        $datosSE->descripcion = $request->descripcion;
        $datosSE->precio = $request->precio;
        $datosSE->save();
        return response()->json($request);
    }

    public function verID($idServicio)
    {
        $datosSE = new Servicio();
        $datosEn = $datosSE->find($idServicio);
        return response()->json($datosEn);
    }
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Project  $project
     * @return \Illuminate\Http\Response
     */
    public function modificar(Request $request, $idServicio)
    {

        $datosSE = Servicio::find($idServicio);
        if ($request->input('nombre') ||
            $request->input('descripcion') ||
            $request->input('precio')) {
        
            $datosSE->nombre = $request->input('nombre');
            $datosSE->descripcion = $request->input('descripcion');   
            $datosSE->precio = $request->input('precio');
        }
        $datosSE->save();

        return response()->json("Registro Actualizado");
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Project  $project
     * @return \Illuminate\Http\Response
     */
    public function eliminar($idServicio)
    {

        $datosSE = Servicio::find($idServicio);
        $datosSE->delete();
        return response()->json("Registro Borrado");
    }
}
