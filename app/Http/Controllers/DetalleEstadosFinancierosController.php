<?php

namespace App\Http\Controllers;

use App\DetalleEstadosFinancieros;
use App\Imports\DetalleEstadosFinancierosImport;
use Illuminate\Http\Request;
use App\EstadoFinanciero;
use App\RatioFinanciero;
use Excel;

class DetalleEstadosFinancierosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
       
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request,$id)
    {
        //$id=1;
        if ($request->hasFile('estado_financiero')){
            $file = $request->file('estado_financiero');
            Excel::import(new DetalleEstadosFinancierosImport($id), $file);
        }
        else
            foreach($request->cuenta as $key => $value){
                DetalleEstadosFinancieros::create([
                    'cuenta' => $value, 
                    'id_estado_financiero' => $request['id_estado_financiero'][$key],
                    'saldo' => $request['saldo'][$key],
                ]);
        }

        return redirect('empresas');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\DetalleEstadosFinancieros  $detalleEstadosFinancieros
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {   
        $ratio = RatioFinanciero::where('id_estado_financiero', $id)->get();
        $estado_financiero = EstadoFinanciero::findOrFail($id);
        $balance = DetalleEstadosFinancieros::where('id_estado_financiero', $id);
        if($estado_financiero->id_tipo_estado_financiero==1)
        {
            return view('EstadosFinancieros.ver_balance_general', compact('balance', 'estado_financiero', 'ratio'));
        }
        else{
            return view('EstadosFinancieros.ver_estado_resultado', compact('balance', 'estado_financiero'));
        }
        
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\DetalleEstadosFinancieros  $detalleEstadosFinancieros
     * @return \Illuminate\Http\Response
     */
    public function edit(DetalleEstadosFinancieros $detalleEstadosFinancieros)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\DetalleEstadosFinancieros  $detalleEstadosFinancieros
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, DetalleEstadosFinancieros $detalleEstadosFinancieros)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\DetalleEstadosFinancieros  $detalleEstadosFinancieros
     * @return \Illuminate\Http\Response
     */
    public function destroy(DetalleEstadosFinancieros $detalleEstadosFinancieros)
    {
        //
    }
}
