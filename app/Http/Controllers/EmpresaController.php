<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\EmpresaRequest;
use App\tipo;
use App\empresa;


class EmpresaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {   
        $empresas=empresa::all();
        return view('Empresas.lista_empresas',compact('empresas'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $tipos = tipo::all();
        return view('Empresas.crear_empresa',compact('tipos'));

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(EmpresaRequest $request)
    {
        $empresa_registrada=false;
        $empresa = new empresa;//
        $empresa->codigo = $request->codigo;
        $empresa->nombre_empresa = $request->nombre_empresa;
        $empresa->descripcion = $request->descripcion;
        $empresa->tipo_id = $request->tipo_id;
        $empresa->save();
        return redirect('empresas');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $empresa_actualizar = empresa::findOrFail($id);
        $tipos = tipo::all();
        return view('Empresas.editar_empresa', compact('empresa_actualizar','tipos'));

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

        $empresa_actualizar = empresa::findOrFail($id);
        $empresa_actualizar->codigo = $request->codigo;
        $empresa_actualizar->nombre_empresa = $request->nombre_empresa;
        $empresa_actualizar->descripcion = $request->descripcion;
        $empresa_actualizar->tipo_id = $request->tipo_id;
        $empresa_actualizar->save();
        return redirect('empresas');


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
