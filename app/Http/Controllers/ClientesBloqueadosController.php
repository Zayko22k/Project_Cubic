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
        'cliente_bloqueados.bloqueado', 'cliente_bloqueados.users_id',
         'users.name',
         'users.email',
         'users.apellidoP',
         'users.apellidoM')
            ->join('users', 'cliente_bloqueados.idCliente_Bloqueados', '=', 'users.id')
            ->get();


            return response()->json($datosCB); 
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function crear(Request $request)
    {
        $datosCB = new Clientes_Bloqueados();
        $datosCB->bloqueado = $request->bloqueado;
        $datosCB->users_id = $request->users_id;
        $datosCB->save();
        return response()->json("Este cliente se ha ingresado correctamente");
    }

    public function verID($idCliente_Bloqueados)
    {
        $datosCB = new Clientes_Bloqueados();
        $datosEn = $datosCB->find($idCliente_Bloqueados);
        return response()->json($datosEn);
    }

    public function validacion($users_id)
    {
        $datosCB = new Clientes_Bloqueados();
        $datosEn = $datosCB->find($users_id);
        if($datosEn->bloqueado == "1"){
            return response()->json("Usuario no bloqueado");
        } else if($datosEn->bloqueado == "0"){
            return response()->json("Usuario bloqueado");
        }
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
            $request->input('bloqueado')
            || $request->input('users_id')
        ) {
            $datosCB->bloqueado = $request->input('bloqueado');
            $datosCB->users_id = $request->input('users_id');
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
