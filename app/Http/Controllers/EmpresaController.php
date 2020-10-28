<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\EmpresaRequest;

class EmpresaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        return view('Empresas.lista_empresas');

        //
        $empresas=empresa::all();
        return view('',compact('empresas'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        return view('Empresas.crear_empresa');

        $tipos = tipo::all();
        return view('',compact('tipos'));
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(EmpresaRequest $request)
    {
        $empresa = new empresa;//
        $empresa->codigo = $request->codigo;
        $empresa->nombre_empresa = $request->nombre;
        $empresa->descripcion = $request->descripcion;
        $empresa->tipo_id = $request->tipo_id;
        $empresa->save();
        return redirect('');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $empresa_actualizar = emprtesa::findOrFail($id);
        $tipos = tipo::all();
         return view('',compact('empresa_actualizar','tipos'));

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(EmpresaRequest $request, $id)
    {
        //
        $empresa_actualizar = empresa::findOrFail($id);
        $empresa_actualizar->codigo = $request->codigo;
        $empresa_actualizar->nombre_empresa = $request->nombre;
        $empresa_actualizar->descripcion = $request->descripcion;
        $empresa_actualizar->tipo_id = $request->tipo_id;
        $empresa_actualizar->save();

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        
    }
}
