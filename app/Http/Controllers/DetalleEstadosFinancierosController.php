<?php

namespace App\Http\Controllers;

use App\DetalleEstadosFinancieros;
use App\Imports\DetalleEstadosFinancierosImport;
use App\Http\Requests\DetalleEstadosFinancierosRequest;
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
    public function edit($id)
    {
        //
        $estado_financiero = EstadoFinanciero::findOrFail($id);
        $balance = DetalleEstadosFinancieros::where('id_estado_financiero', $id);
        if($estado_financiero->id_tipo_estado_financiero==1)
        {
            return view('EstadosFinancieros.editar_balance_general', compact('balance', 'estado_financiero'));
        }
        else{
            return view('EstadosFinancieros.editar_estado_resultado', compact('balance', 'estado_financiero'));
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\DetalleEstadosFinancieros  $detalleEstadosFinancieros
     * @return \Illuminate\Http\Response
     */
    public function update(DetalleEstadosFinancierosRequest $request,$id)
    {
        //
        $estado_financiero_actualizar = EstadoFinanciero::findOrFail($id);
        $detalle_estado_financiero_actualizar = DetalleEstadosFinancieros::where('id_estado_financiero',$id);
        foreach ($request->cuenta as $key => $value) {
            $detalle_estado_financiero_actualizar->cuenta=$request->cuenta;
            $detalle_estado_financiero_actualizar->saldo = $request->saldo;
            $detalle_estado_financiero_actualizar->update();
            }
        return redirect('empresas');
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
