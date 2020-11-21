<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\EstadoFinanciero;
use App\DetalleEstadosFinancieros;
use \DB;

class AnalisisHorizontalController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $i = 0;
        $variacion_absoluta = [];
        $variacion_relativa = [];
        $balance_anterior = [];
        $mensaje = "";
        $estado_financiero = EstadoFinanciero::findOrFail($id);
        $balance = DB::select('select * from detalle_estados_financieros where id_estado_financiero ='.$id);
        $estado_financiero_anterior = EstadoFinanciero::where('fecha_inicio','<',$estado_financiero->fecha_inicio)->where('id_empresa', $estado_financiero->id_empresa)->orderBy('fecha_inicio', 'DESC')->first();
        
        if($estado_financiero_anterior)
        {
        $balance_anterior = DB::select('select * from detalle_estados_financieros where id_estado_financiero ='.$estado_financiero_anterior->id_estado_financiero);

            for($i = 0; $i <count($balance); $i++){
                $variacion_absoluta[$i] = $balance[$i]->saldo - $balance_anterior[$i]->saldo;
                if($balance_anterior[$i]->saldo!=0){
                $variacion_relativa[$i] = round((($balance[$i]->saldo - $balance_anterior[$i]->saldo)/$balance_anterior[$i]->saldo)*100, 2);
                }
                else{
                    $variacion_relativa[$i] = 0;
                }
            }
            
        }
        else{

            $mensaje = "No se han registrado períodos anteriores, no es posible calcular el análisis horizontal!!!";
        }
        return view('Analisis.calculo_analisis_horizontal', compact('estado_financiero', 'balance', 'estado_financiero_anterior', 'balance_anterior', 'variacion_absoluta', 'variacion_relativa', 'mensaje'));

        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
