<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\EstadoFinanciero;
use App\Empresa;
use App\RatioFinanciero;
use App\DetalleEstadosFinancieros;
use \DB;
class GraficoController extends Controller
{
    public function analisis_vertical_graficos($id)
    {   
        $indice_activos = 0;
        $indice_pasivos = 0;
        $indice_ingresos = 0;
        $indice_gastos = 0;
        $estado_financiero = EstadoFinanciero::findOrFail($id);
        $balance = DB::select('select * from detalle_estados_financieros where saldo>0 and id_estado_financiero ='.$id);
        
        foreach($balance as $cuenta)
        {
            $cuenta->cuenta = ucfirst(strtolower($cuenta->cuenta));
        }

        for($i=0; $i<count($balance); $i++)
        {
            if(!strcasecmp($balance[$i]->cuenta,"TOTAL DE ACTIVOS"))
            {
                $indice_activos = $i;
            }

            if(!strcasecmp($balance[$i]->cuenta,"TOTAL DE PASIVOS"))
            {
                $indice_pasivos = $i;
            }
            if(!strcasecmp($balance[$i]->cuenta,"TOTAL DE INGRESOS"))
            {
                $indice_ingresos = $i;
            }
            if(!strcasecmp($balance[$i]->cuenta,"TOTAL DE GASTOS"))
            {
                $indice_gastos = $i;
            }
        }
        return view('Analisis.graficos_analisis_vertical', compact('balance', 'indice_activos', 'indice_pasivos', 'indice_ingresos', 'indice_gastos','estado_financiero'));
    }


    public function analisis_horizontal_graficos($id)
    {
        $indice_activos = 0;
        $indice_pasivos = 0;
        $indice_ingresos = 0;
        $indice_gastos = 0;
        $balance_anterior = [];
        $mensaje = "";
        $estado_financiero = EstadoFinanciero::findOrFail($id);
        $balance = DB::select('select * from detalle_estados_financieros where id_estado_financiero ='.$id);
        $estado_financiero_anterior = EstadoFinanciero::where('fecha_inicio','<',$estado_financiero->fecha_inicio)->where('id_empresa', $estado_financiero->id_empresa)->where('id_tipo_estado_financiero',$estado_financiero->id_tipo_estado_financiero)->orderBy('fecha_inicio', 'DESC')->first();
        
        if($estado_financiero_anterior)
        {
            $balance_anterior = DB::select('select * from detalle_estados_financieros where id_estado_financiero ='.$estado_financiero_anterior->id_estado_financiero);
            
        }
        else{
            $mensaje = "No se han registrado períodos anteriores, no es posible calcular el análisis horizontal!!!";
        }

        foreach($balance as $cuenta)
        {
            $cuenta->cuenta = ucfirst(strtolower($cuenta->cuenta));
        }

        for($i=0; $i<count($balance); $i++)
        {
            if(!strcasecmp($balance[$i]->cuenta,"TOTAL DE ACTIVOS"))
            {
                $indice_activos = $i;
            }

            if(!strcasecmp($balance[$i]->cuenta,"TOTAL DE PASIVOS"))
            {
                $indice_pasivos = $i;
            }
            if(!strcasecmp($balance[$i]->cuenta,"TOTAL DE INGRESOS"))
            {
                $indice_ingresos = $i;
            }

            if(!strcasecmp($balance[$i]->cuenta,"TOTAL DE GASTOS"))
            {
                $indice_gastos = $i;
            }
            
        }
        return view('Analisis.graficos_analisis_horizontal', compact('balance', 'balance_anterior', 'estado_financiero', 'estado_financiero_anterior', 'mensaje', 'indice_activos', 'indice_pasivos', 'indice_ingresos', 'indice_gastos'));
    }

    public function comparacion_ratios_graficos($id){
        $estado_financiero = EstadoFinanciero::findOrFail($id);
        $empresa = Empresa::findOrFail($estado_financiero->id_empresa);
        $empresa_tipo = $empresa->tipo_id;
        $ratios_liquidez_promedio = DB::table('ratio_financieros')->join('estado_financieros', 'estado_financieros.id_estado_financiero', '=', 'ratio_financieros.id_estado_financiero')
                        ->join('empresas', 'empresas.id', '=', 'estado_financieros.id_empresa')
                        ->where('estado_financieros.fecha_inicio', $estado_financiero->fecha_inicio)
                        ->where('empresas.tipo_id', $empresa_tipo)
                        ->where('ratio_financieros.id_tipo_ratio', 1)
                        ->select(DB::raw('round(avg(calculo_ratio),2) as promedio, nombre_ratio', 'id_tipo_ratio'))
                        ->orderBy('id_tipo_ratio')
                        ->groupBy('nombre_ratio')->get();

        $ratios_actividad_promedio = DB::table('ratio_financieros')->join('estado_financieros', 'estado_financieros.id_estado_financiero', '=', 'ratio_financieros.id_estado_financiero')
                        ->join('empresas', 'empresas.id', '=', 'estado_financieros.id_empresa')
                        ->where('estado_financieros.fecha_inicio', $estado_financiero->fecha_inicio)
                        ->where('empresas.tipo_id', $empresa_tipo)
                        ->where('ratio_financieros.id_tipo_ratio', 2)
                        ->select(DB::raw('round(avg(calculo_ratio),2) as promedio, nombre_ratio', 'id_tipo_ratio'))
                        ->orderBy('id_tipo_ratio')
                        ->groupBy('nombre_ratio')->get();

        $ratios_apalancamiento_promedio = DB::table('ratio_financieros')->join('estado_financieros', 'estado_financieros.id_estado_financiero', '=', 'ratio_financieros.id_estado_financiero')
                        ->join('empresas', 'empresas.id', '=', 'estado_financieros.id_empresa')
                        ->where('estado_financieros.fecha_inicio', $estado_financiero->fecha_inicio)
                        ->where('empresas.tipo_id', $empresa_tipo)
                        ->where('ratio_financieros.id_tipo_ratio', 3)
                        ->select(DB::raw('round(avg(calculo_ratio),2) as promedio, nombre_ratio', 'id_tipo_ratio'))
                        ->orderBy('id_tipo_ratio')
                        ->groupBy('nombre_ratio')->get();

        $ratios_rentabilidad_promedio = DB::table('ratio_financieros')->join('estado_financieros', 'estado_financieros.id_estado_financiero', '=', 'ratio_financieros.id_estado_financiero')
                        ->join('empresas', 'empresas.id', '=', 'estado_financieros.id_empresa')
                        ->where('estado_financieros.fecha_inicio', $estado_financiero->fecha_inicio)
                        ->where('empresas.tipo_id', $empresa_tipo)
                        ->where('ratio_financieros.id_tipo_ratio', 4)
                        ->select(DB::raw('round(avg(calculo_ratio),2) as promedio, nombre_ratio', 'id_tipo_ratio'))
                        ->orderBy('id_tipo_ratio')
                        ->groupBy('nombre_ratio')->get();

        $razones_liquidez = RatioFinanciero::where('id_estado_financiero', $id)->where('id_tipo_ratio', 1)->get();
        $razones_actividad = RatioFinanciero::where('id_estado_financiero', $id)->where('id_tipo_ratio', 2)->get();
        $razones_apalancamiento = RatioFinanciero::where('id_estado_financiero', $id)->where('id_tipo_ratio', 3)->get();
        $razones_rentabilidad = RatioFinanciero::where('id_estado_financiero', $id)->where('id_tipo_ratio', 4)->get();

        return view('RatiosFinancieros.grafico_comparacion_ratios', compact('razones_liquidez', 'razones_actividad','razones_apalancamiento','razones_rentabilidad','ratios_apalancamiento_promedio','ratios_actividad_promedio','ratios_rentabilidad_promedio','ratios_liquidez_promedio', 'empresa', 'estado_financiero'));
    }
}
