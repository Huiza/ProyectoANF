<?php

namespace App\Http\Controllers;
use App\EstadoFinanciero;
use App\DetalleEstadosFinancieros;
use App\RatioFinanciero;
use App\Empresa;
use Illuminate\Http\Request;
use DB;
use PDF;
use App\Fecha;


class ReporteController extends Controller
{
    public function balance_general($id){
        $estado_financiero = EstadoFinanciero::findOrFail($id);
        $balance_general=DetalleEstadosFinancieros::where('id_estado_financiero',$id)->get();
        $fecha_inicio = Fecha::fechaTexto($estado_financiero->fecha_inicio);
        $fecha_final = Fecha::fechaTexto($estado_financiero->fecha_final);
        $pdf=PDF::loadView('Reportes/reporte_balance_general',compact('balance_general', 'estado_financiero', 'fecha_inicio', 'fecha_final'));
        return $pdf->download('balance_general.pdf');
    }

    public function estado_resultados($id){
        $estado_financiero = EstadoFinanciero::findOrFail($id);
        $estado_resultados=DetalleEstadosFinancieros::where('id_estado_financiero',$id)->get();
        $fecha_inicio = Fecha::fechaTexto($estado_financiero->fecha_inicio);
        $fecha_final = Fecha::fechaTexto($estado_financiero->fecha_final);
        $pdf=PDF::loadView('Reportes/reporte_estado_resultados',compact('estado_resultados', 'estado_financiero', 'fecha_inicio', 'fecha_final'));
        return $pdf->download('estado_resultados.pdf');
    }

    public function analisis_horizontal($id){
        $i = 0;
        $variacion_absoluta = [];
        $variacion_relativa = [];
        $balance_anterior = [];
        $estado_financiero = EstadoFinanciero::findOrFail($id);
        $fecha_inicio = Fecha::fechaTexto($estado_financiero->fecha_inicio);
        $fecha_final = Fecha::fechaTexto($estado_financiero->fecha_final);
        $balance = DB::select('select * from detalle_estados_financieros where id_estado_financiero ='.$id);
        $estado_financiero_anterior = EstadoFinanciero::where('fecha_inicio','<',$estado_financiero->fecha_inicio)->where('id_empresa', $estado_financiero->id_empresa)->orderBy('fecha_inicio', 'DESC')->first();

        $balance_anterior = DB::select('select * from detalle_estados_financieros where id_estado_financiero ='.$estado_financiero_anterior->id_estado_financiero);

            for($i = 0; $i < count($balance); $i++){
                $variacion_absoluta[$i] = $balance[$i]->saldo - $balance_anterior[$i]->saldo;
                if($balance_anterior[$i]->saldo!=0){
                $variacion_relativa[$i] = round((($balance[$i]->saldo - $balance_anterior[$i]->saldo)/$balance_anterior[$i]->saldo)*100, 2);
                }
                else{
                    $variacion_relativa[$i] = 0;
                }
            }
        
        $pdf=PDF::loadview('Reportes.reporte_analisis_horizontal', compact('estado_financiero', 'balance', 'estado_financiero_anterior', 'balance_anterior', 'variacion_absoluta', 'variacion_relativa', 'fecha_inicio', 'fecha_final'));
        return $pdf->download('analisis_horizontal.pdf');
    }

    public function analisis_vertical($id)
    {
        $i = 0;
        $j = 0;
        $m = 0;
        $total_activo = 0;
        $total_pasivo = 0;
        $total_patrimonio = 0;
        $total_ingresos = 0;
        $total_gastos = 0;
        $mensaje = "";
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

        $pdf=PDF::loadview('Analisis.calculo_analisis_vertical', compact('estado_financiero', 'balance', 'porcentaje_vertical', 'mensaje'));
        return $pdf->download('analisis_vertical.pdf');
    }

    public function ratios_financieros($id){

        $estado_financiero = EstadoFinanciero::findOrFail($id);
        $razones_liquidez = RatioFinanciero::where('id_estado_financiero', $id)->where('id_tipo_ratio', 1)->get();
        $razones_actividad = RatioFinanciero::where('id_estado_financiero', $id)->where('id_tipo_ratio', 2)->get();
        $razones_apalancamiento = RatioFinanciero::where('id_estado_financiero', $id)->where('id_tipo_ratio', 3)->get();
        $razones_rentabilidad = RatioFinanciero::where('id_estado_financiero', $id)->where('id_tipo_ratio', 4)->get();
        $fecha_inicio = Fecha::fechaTexto($estado_financiero->fecha_inicio);
        $fecha_final = Fecha::fechaTexto($estado_financiero->fecha_final);

        $pdf=PDF::loadview('Reportes.reporte_ratios', compact('estado_financiero', 'razones_rentabilidad', 'razones_apalancamiento', 'razones_actividad', 'razones_liquidez', 'fecha_inicio', 'fecha_final'));
        return $pdf->download('razones_financieras.pdf');
    }

    public function comparacion_ratios($id){

        $estado_financiero = EstadoFinanciero::findOrFail($id);
        $fecha_inicio = Fecha::fechaTexto($estado_financiero->fecha_inicio);
        $fecha_final = Fecha::fechaTexto($estado_financiero->fecha_final);
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

        $pdf=PDF::loadview('Reportes.reporte_comparacion_ratios', compact('razones_liquidez', 'razones_actividad','razones_apalancamiento','razones_rentabilidad','ratios_apalancamiento_promedio','ratios_actividad_promedio','ratios_rentabilidad_promedio','ratios_liquidez_promedio', 'empresa', 'estado_financiero', 'fecha_inicio', 'fecha_final'));
        return $pdf->download('comparacion_razones_financieras.pdf');
    }

}
