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
        $cuentas_mayores = CuentaMayor::all();
        $cuentas_primarias = SubcuentaPrimaria::all();
        $cuentas_secundarias = SubcuentaSecundaria::all();
        $cuentas_terciarias = SubcuentaTerciaria::all();
        $cuentas_cuaternarias = SubcuentaCuaternaria::all();
        $cuentas_quinarias = SubcuentaQuinaria::all();
        return view('Catalogo.crear_catalogo', compact('empresa', 'cuentas_mayores', 'cuentas_primarias', 'cuentas_secundarias', 'cuentas_terciarias', 'cuentas_cuaternarias', 'cuentas_quinarias'));
    }
}
