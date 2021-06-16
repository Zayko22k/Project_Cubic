<?php 
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Tienda;

class TiendaController extends Controller{

 /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $datosTi = Tienda::all();
        return response()->json($datosTi); 
    }
/**
 * Store a newly created resource in storage.
 *
 * @param  \Illuminate\Http\Request  $request
 * @return \Illuminate\Http\Response
 */
public function crear(Request $request)
{
    $datosTi = new Tienda();
    $datosTi->nomTienda = $request->nomTienda;
    $datosTi->save();
    return response()->json($request);
}

public function verID($idTienda)
{
   $datosTi = Tienda::find($idTienda);
    return response()->json($datosTi);
}
/**
 * Update the specified resource in storage.
 *
 * @param  \Illuminate\Http\Request  $request
 * @param  \App\Models\Project  $project
 * @return \Illuminate\Http\Response
 */
public function modificar(Request $request, $idTienda)
{

    $datosTi = Tienda::find($idTienda);
    if ($request->input('nomTienda')) {

        $datosTi->nomTienda = $request->input('nomTienda');
        $datosTi->Ciudad_idCiudad = $request->input('Ciudad_idCiudad');
    }
    $datosTi->save();

    return response()->json("Registro Actualizado");
}
/**
 * Remove the specified resource from storage.
 *
 * @param  \App\Models\Project  $project
 * @return \Illuminate\Http\Response
 */
public function eliminar($idTienda)
{

    $datosTi = TipoUsuario::find($idTienda);
    $datosTi->delete();
    return response()->json("Registro Borrado");
}
}
