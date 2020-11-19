<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CalculadoraController extends Controller
{
    public function calcular_ratios(Request $request){

        $activo_corriente = $request->get('activo_corriente');
        $pasivo_corriente = $request->get('pasivo_corriente');
        $inventario = $request->get('inventario');
        $activos_totales = $request->get('activos_totales');
        $efectivo = $request->get('efectivo');
        $valores_corto_plazo = $request->get('valores_corto_plazo');

        $razon_liquidez = $pasivo_corriente == 0 ? 0 : (round($activo_corriente / $pasivo_corriente,2));
        $razon_liquidez = $pasivo_corriente == 0 ? 0 : (round(($activo_corriente - $inventario)/ $pasivo_corriente,2));
        $razon_capital_trabajo = $activos_totales == 0 ? 0 : (round(($activo_corriente - $pasivo_corriente)/ $activos_totales,2));
        $razon_efectivo = $pasivo_corriente == 0 ? 0 : (round(($efectivo + $valores_corto_plazo) / $pasivo_corriente,2));

        




        return view('Calculadora.calculadora_ratios');
    }

    public function resultado_ratios(){
        
        return view('Calculadora.resultados_ratios');
    }
}
