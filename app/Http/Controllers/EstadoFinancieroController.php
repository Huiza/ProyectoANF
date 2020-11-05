<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Empresa;
use App\Catalogo;

class EstadoFinancieroController extends Controller
{
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($id)
    {   
        $cuentas = [];
        $empresa = Empresa::findOrFail($id);
        $catalogo = Catalogo::where('id_empresa', $empresa->id)->get();

        foreach($catalogo as $cuenta)
        {
            if($cuenta->cuenta->id_tipo_cuenta <= 3)
            {
                $cuentas[] = $cuenta;
            }
            
        }
        return view('EstadosFinancieros.crear_balance_general', compact('empresa', 'cuentas'));

    }
}
