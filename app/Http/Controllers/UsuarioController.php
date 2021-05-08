<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Usuario;

class UsuarioController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $datosUS = Usuario::all();
        return response()->json([
            "Estado" => true,
            "Mensaje" => "Lista Tipos de Usuario",
            "data" => $datosUS
        ]);
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function crear(Request $request)
    {
        $datosUS = new Usuario();
        $datosUS->nombre = $request->nombre;
        $datosUS->apellidoP = $request->apellidoP;
        $datosUS->apellidoM = $request->apellidoM;
        $datosUS->rut = $request->rut;
        $datosUS->correo = $request->correo;
        $datosUS->telefono = $request->telefono;
        $datosUS->contrasenia = $request->contrasenia;
        $datosUS->fecha_nacimiento = $request->fecha_nacimiento;
        $datosUS->TipoUsuario_idTipoUsuario = $request->TipoUsuario_idTipoUsuario;
        $datosUS->save();
        return response()->json($request);
    }

    public function verID($idUsuario)
    {
        $datosUS = new Usuario();
        $datosEn = $datosUS->find($idUsuario);
        return response()->json($datosEn);
    }
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Project  $project
     * @return \Illuminate\Http\Response
     */
    public function modificar(Request $request, $idUsuario)
    {

        $datosUS = Usuario::find($idUsuario);
        if (
            $request->input('nombre')
            || $request->input('apellidoP')
            || $request->input('apellidoM')
            || $request->input('rut')
            || $request->input('correo')
            || $request->input('telefono')
            || $request->input('contrasenia')
            || $request->input('fecha_nacimiento')
            || $request->input('TipoUsuario_idTipoUsuario')
        ) {

            $datosUS->nombre = $request->input('nombre');
            $datosUS->apellidoP = $request->input('apellidoP');
            $datosUS->apellidoM = $request->input('apellidoM');
            $datosUS->rut = $request->input('rut');
            $datosUS->correo = $request->input('correo');
            $datosUS->telefono = $request->input('telefono');
            $datosUS->contrasenia = $request->input('contrasenia');
            $datosUS->fecha_nacimiento = $request->input('fecha_nacimiento');
            $datosUS->TipoUsuario_idTipoUsuario = $request->input('TipoUsuario_idTipoUsuario');
        }
        $datosUS->save();

        return response()->json("Registro Actualizado");
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Project  $project
     * @return \Illuminate\Http\Response
     */
    public function eliminar($idUsuario)
    {
        $datosUS = Usuario::find($idUsuario);
        $datosUS->delete();
        return response()->json("Registro Borrado");
    }
}
