<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Clientes_Bloqueados;

class ClientesBloqueadosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $datosCB = Clientes_Bloqueados::select('cliente_bloqueados.idCliente_Bloqueados',
        'cliente_bloqueados.razon',
         'usuario.nombre',
         'usuario.apellidoP',
         'usuario.correo',
         'usuario.telefono')
            ->join('usuario', 'cliente_bloqueados.idCliente_Bloqueados', '=', 'usuario.idUsuario')
            ->get();


            return response()->json($datosCB); 
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function darBaja(Request $request)
    {
        $datosCB = new Clientes_Bloqueados();
        $datosCB->razon = $request->razon;
        $datosCB->Usuario_idUsuario = $request->Usuario_idUsuario;
        $datosCB->save();
        return response()->json("Este cliente se ha dado de baja");
    }

    public function verID($idCliente_Bloqueados)
    {
        $datosCB = new Clientes_Bloqueados();
        $datosCB = $datosCB->find($idCliente_Bloqueados);
        return response()->json($datosCB);
    }
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Project  $project
     * @return \Illuminate\Http\Response
     */
    public function darAlta(Request $request, $idCliente_Bloqueados)
    {

        $datosCB = Clientes_Bloqueados::find($idCliente_Bloqueados);
        if (
            $request->input('razon')
            || $request->input('Usuario_idUsuario')
        ) {
            $datosCB->razon = $request->input('razon');
            $datosCB->Usuario_idUsuario = $request->input('Usuario_idUsuario');
        }
        $datosCB->save();

        return response()->json("Registro Actualizado");
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Project  $project
     * @return \Illuminate\Http\Response
     */
    public function eliminar($idCliente_Bloqueados)
    {
        $datosCB = Clientes_Bloqueados::find($idCliente_Bloqueados);
        $datosCB->delete();
        return response()->json("Registro Borrado");
    }
}
