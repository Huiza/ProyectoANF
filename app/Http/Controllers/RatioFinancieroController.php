<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\EstadoFinanciero;
use App\DetalleEstadosFinancieros;
use \DB;

class RatioFinancieroController extends Controller
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
        $razon_circulante = 0;
        $pasivo_corriente = 0;
        $activo_corriente = 0;
        $prueba_acida = 0;
        $inventarios = 0;
        $total_activos = 0;
        $razon_capital_trabajo = 0;
        $razon_efectivo = 0;
        $efectivo = 0;
        $valores_corto_plazo = 0;
        $estado_financiero_1 = EstadoFinanciero::findOrFail($id);
        $balance = DB::select('select * from detalle_estados_financieros where id_estado_financiero ='.$id);
        $estado_financiero_2 = EstadoFinanciero::where('fecha_inicio','=',$estado_financiero_1->fecha_inicio)->
                                                where('fecha_final','=',$estado_financiero_1->fecha_final)->
                                                where('id_empresa','=',$estado_financiero_1->id_empresa)->
                                                where('id_tipo_estado_financiero','=',2)->get();
        
        foreach($balance as $cuentas){
            if($cuentas->cuenta=='ACTIVO CORRIENTE'){
                $activo_corriente=$cuentas->saldo;
            }
            if($cuentas->cuenta=='PASIVO CORRIENTE'){
                $pasivo_corriente=$cuentas->saldo;
            }

            if($cuentas->cuenta=='INVENTARIOS'){
                $inventarios=$cuentas->saldo;
            }
            if($cuentas->cuenta=='TOTAL DE ACTIVOS'){
                $total_activos=$cuentas->saldo;
            }
            if($cuentas->cuenta=='Valores de corto plazo'){
                $valores_corto_plazo=$cuentas->saldo;
            }
            if($cuentas->cuenta=='EFECTIVO Y EQUIVALENTES DE EFECTIVO'){
                $efectivo=$cuentas->saldo;
            }
        }

        $razon_circulante = round($activo_corriente/$pasivo_corriente, 2);
        $prueba_acida = round(($activo_corriente - $inventarios)/ $pasivo_corriente, 2);
        $razon_capital_trabajo = round(($activo_corriente - $pasivo_corriente)/$total_activos, 2);
        $razon_efectivo = round(($efectivo + $valores_corto_plazo)/$pasivo_corriente);

        return view('RatiosFinancieros/calcular_ratios', compact('estado_financiero_1', 'razon_circulante', 'prueba_acida', 'razon_capital_trabajo'));

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
