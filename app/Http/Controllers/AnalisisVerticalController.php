<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\EstadoFinanciero;
use App\DetalleEstadosFinancieros;
use \DB;

class AnalisisVerticalController extends Controller
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
        $j = 0;
        $m = 0;
        $total_activo = 0;
        $total_pasivo = 0;
        $total_patrimonio = 0;
        $total_ingresos = 0;
        $total_gastos = 0;
        $porcentaje_vertical = [];
        $estado_financiero = EstadoFinanciero::findOrFail($id);
        $balance = DB::select('select * from detalle_estados_financieros where id_estado_financiero ='.$id);

        for($i = 0; $i < count($balance); $i++){
            if($balance[$i]->cuenta=='TOTAL DE ACTIVOS'){
                $total_activo = $balance[$i]->saldo;
            }
        }

        for($i = 0; $i < count($balance); $i++){
            if($balance[$i]->cuenta=='TOTAL DE PASIVOS'){
                $total_pasivo = $balance[$i]->saldo;
            }
        }

        for($i = 0; $i < count($balance); $i++){
            if($balance[$i]->cuenta=='TOTAL PATRIMONIO'){
                $total_patrimonio = $balance[$i]->saldo;
            }
        }

        for($i = 0; $i < count($balance); $i++){
            if($balance[$i]->cuenta=='TOTAL DE INGRESOS'){
                $total_ingresos = $balance[$i]->saldo;
            }
        }

        for($i = 0; $i < count($balance); $i++){
            if($balance[$i]->cuenta=='TOTAL DE GASTOS'){
                $total_gastos = $balance[$i]->saldo;
            }
        }

       if($estado_financiero->id_tipo_estado_financiero==1)
       {
            while($balance[$j]->cuenta!='PASIVO'){
                if($balance[$j]->saldo!=0){
                    $porcentaje_vertical[$j] = round((($balance[$j]->saldo)/$total_activo)*100, 2);
                    }
                    else{
                        $porcentaje_vertical[$j] = 0;
                    }

                $j++;
            }

            while($balance[$j]->cuenta!='PATRIMONIO'){
                if($balance[$j]->saldo!=0){
                    $porcentaje_vertical[$j] = round((($balance[$j]->saldo)/$total_pasivo)*100, 2);
                    }
                    else{
                        $porcentaje_vertical[$j] = 0;
                    }

                $j++;
            }

            while($j!==count($balance)){
                if($balance[$j]->saldo!=0){
                    $porcentaje_vertical[$j] = round((($balance[$j]->saldo)/$total_patrimonio)*100, 2);
                    }
                    else{
                        $porcentaje_vertical[$j] = 0;
                    }

                $j++;
            }
      
        }
        else{
            while($balance[$j]->cuenta!='GASTOS'){
                if($balance[$j]->saldo!=0){
                    $porcentaje_vertical[$j] = round((($balance[$j]->saldo)/$total_ingresos)*100, 2);
                    }
                    else{
                        $porcentaje_vertical[$j] = 0;
                    }
    
                $j++;
            }

            while($j!==count($balance)){
                if($balance[$j]->saldo!=0){
                    $porcentaje_vertical[$j] = round((($balance[$j]->saldo)/$total_gastos)*100, 2);
                    }
                    else{
                        $porcentaje_vertical[$j] = 0;
                    }

                $j++;
            }
        }
        

        return view('Analisis.calculo_analisis_vertical', compact('estado_financiero', 'balance', 'porcentaje_vertical'));
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
