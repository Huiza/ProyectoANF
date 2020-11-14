<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\EstadoFinanciero;
use \DB;
class GraficoController extends Controller
{
    public function analisis_vertical_graficos($id)
    {   
        $indice_activos = 0;
        $indice_pasivos = 0;
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
        }
        return view('Analisis.graficos_analisis_vertical', compact('balance', 'indice_activos', 'indice_pasivos', 'estado_financiero'));
        
    }
}
