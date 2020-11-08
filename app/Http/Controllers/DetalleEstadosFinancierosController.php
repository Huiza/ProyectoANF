<?php

namespace App\Http\Controllers;

use App\DetalleEstadosFinancieros;
use Illuminate\Http\Request;

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
    public function store(Request $request)
    {
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
    public function show(DetalleEstadosFinancieros $detalleEstadosFinancieros)
    {
        //
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
