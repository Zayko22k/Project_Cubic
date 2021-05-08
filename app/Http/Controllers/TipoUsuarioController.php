<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\TipoUsuario;
use Validator;

class TipoUsuarioController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $datosTP = TipoUsuario::all();
        return response()->json($datosTP);
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function crear(Request $request)
    {
        $datosTP = new TipoUsuario();
        $datosTP->tipo = $request->tipo;
        $datosTP->save();
        return response()->json($request);
    }

    public function verID($idTipoUsuario)
    {
        $datosTP = new TipoUsuario();
        $datosEn = $datosTP->find($idTipoUsuario);
        return response()->json($datosEn);
    }
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Project  $project
     * @return \Illuminate\Http\Response
     */
    public function modificar(Request $request, $idTipoUsuario)
    {

        $datosTP = TipoUsuario::find($idTipoUsuario);
        if ($request->input('tipo')) {
            $datosTP->tipo = $request->input('tipo');
        }
        $datosTP->save();

        return response()->json("Registro Actualizado");
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Project  $project
     * @return \Illuminate\Http\Response
     */
    public function eliminar($idTipoUsuario)
    {

        $datosTP = TipoUsuario::find($idTipoUsuario);
        $datosTP->delete();
        return response()->json("Registro Borrado");
    }
}
