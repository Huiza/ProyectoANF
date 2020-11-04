<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Imports\BalanceGeneralImport;
use App\Imports\EstadoResultadoImport;
use Excel;

class ImportarExcelController extends Controller
{
    //
    public function importarBalanceGeneral(Request $request){
        $file = $request->file('estado_financiero');
        Excel::import(new BalanceGeneralImport, $file);
        return back()->with('message','Importación del balance general completado.');
    }

     public function importarEstadoResultado(Request $request){
        $file = $request->file('estado_financiero');
        Excel::import(new EstadoResultadoImport, $file);
        return back()->with('message','Importación del estado de resultado completado.');
    }
}
