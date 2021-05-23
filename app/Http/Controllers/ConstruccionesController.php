<?php 
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Construcciones;
use App\Models\TipoConstruccion;

class ConstruccionesController extends Controller{

  /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    
    public function index()
    {
        $datosC = Construcciones::select(
        'construcciones.nomConstr',
        'tipoconstruccion.nomTipoCons')
        ->join('tipoconstruccion','construcciones.idConstrucciones', '=', 'tipoconstruccion.idTipoConstruccion')
        ->get();
        return response()->json($datosC); 
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function crear(Request $request)
    {
        $datosC = new Construcciones();
        $datosC->nomConstr = $request->nomConstr;
        $datosC->TipoConstruccion_idTipoConstruccion  = $request->TipoConstruccion_idTipoConstruccion;
        $datosC->save();
        return response()->json($request);
    }

    public function verID($idConstrucciones)
    {
        $datosC = new Construcciones();
        $datosEn = $datosC->find($idConstrucciones);
        return response()->json($datosEn);
    }
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Project  $project
     * @return \Illuminate\Http\Response
     */
    public function modificar(Request $request, $idConstrucciones)
    {

        $datosC = Construcciones::find($idConstrucciones);
        if ($request->input('nomConstr')) {
            $datosC->nomConstr = $request->input('nomConstr');
        }
        $datosC->save();

        return response()->json("Registro Actualizado");
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Project  $project
     * @return \Illuminate\Http\Response
     */
    public function eliminar($idConstrucciones)
    {

        $datosC = Construcciones::find($idConstrucciones);
        $datosC->delete();
        return response()->json("Registro Borrado");
    }
}