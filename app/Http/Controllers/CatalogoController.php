<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\empresa;
use App\CuentaMayor;
use App\SubcuentaPrimaria;
use App\SubcuentaSecundaria;
use App\SubcuentaTerciaria;
use App\SubcuentaCuaternaria;
use App\SubcuentaQuinaria;
use App\Cuenta;

class CatalogoController extends Controller
{
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($id)
    {   
        $empresa = empresa::findOrFail($id);
        /*$cuentas_mayores = CuentaMayor::all();
        $cuentas_primarias = SubcuentaPrimaria::all();
        $cuentas_secundarias = SubcuentaSecundaria::all();
        $cuentas_terciarias = SubcuentaTerciaria::all();
        $cuentas_cuaternarias = SubcuentaCuaternaria::all();
        $cuentas_quinarias = SubcuentaQuinaria::all();*/
        $cuentas = Cuenta::all();

        return view('Catalogo.crear_catalogo', compact('empresa', 'cuentas'));
    }
}
