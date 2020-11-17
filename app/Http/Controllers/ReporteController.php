<?php

namespace App\Http\Controllers;
use App\EstadoFinanciero;
use App\DetalleEstadosFinancieros;
use Illuminate\Http\Request;
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
}
