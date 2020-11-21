<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Empresa;
use App\CuentaMayor;
use App\SubcuentaPrimaria;
use App\SubcuentaSecundaria;
use App\SubcuentaTerciaria;
use App\SubcuentaCuaternaria;
use App\SubcuentaQuinaria;
use App\Cuenta;
use App\Catalogo;

class CatalogoController extends Controller
{
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($id)
    {   
        $empresa = Empresa::findOrFail($id);
        $cuentas = Cuenta::all();

        return view('Catalogo.crear_catalogo', compact('empresa', 'cuentas'));
    }

    public function store(Request $request)
    {
        foreach($request->id_cuenta as $key => $value){
            Catalogo::create([
                    'id_empresa' => $request['id_empresa'][$key], 
                    'id_cuenta' => $value, 
                ]);
        }

        //ID de la empresa
        $id = Empresa::findOrFail($request['id_empresa'][$value]);

        return redirect()->route('ver_empresa', $id)->withSuccess('Catálogo guardado correctamente');
    }

    public function configurar($id)
    {   
        
        $empresa = Empresa:: findOrFail($id);
        $catalogo = Catalogo::where('id_empresa',$id)->get();
        
       
        return view('Catalogo.configurar_catalogo', compact('catalogo', 'empresa'));
    }

    public function guardar_configuracion(Request $request, $id){
        
        $catalogo = Catalogo::where('id_empresa',$id)->get();
        $valores = [];

        foreach($request->codigo_cuenta as $key => $value)
        {
                $valores[] = $value;
                
        }

        for($i=0; $i<count($valores);$i++)
        {
            $catalogo[$i]->codigo_cuenta = $valores[$i];
            $catalogo[$i]->save();
        }
        

        return redirect()->route('ver_empresa', $id)->withSuccess('Catálogo guardado correctamente');
    
    }
}
