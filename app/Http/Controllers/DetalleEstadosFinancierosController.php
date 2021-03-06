<?php

namespace App\Http\Controllers;

use App\DetalleEstadosFinancieros;
use App\Http\Requests\DetalleEstadosFinacierosRequest;
use App\Imports\DetalleEstadosFinancierosImport;
use Illuminate\Http\Request;
use App\EstadoFinanciero;
use App\RatioFinanciero;
use App\Catalogo;
use App\Empresa;
use RealRashid\SweetAlert\Facades\Alert;
use Excel;
use DB;

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
        $estado_financiero = EstadoFinanciero::findOrFail($id);
        

        if ($request->hasFile('estado_financiero')){
            $file = $request->file('estado_financiero');
            Excel::import(new DetalleEstadosFinancierosImport($id), $file);

            if($estado_financiero->id_tipo_estado_financiero==1){
                app('App\Http\Controllers\RatioFinancieroController')->store($id);
            }
            else{
                $estado_complementario = EstadoFinanciero::where('fecha_inicio','=',$estado_financiero->fecha_inicio)->
                                                    where('fecha_final','=',$estado_financiero->fecha_final)->
                                                    where('id_empresa','=',$estado_financiero->id_empresa)->
                                                    where('id_tipo_estado_financiero','=',1)->first();
                if($estado_complementario){
                    app('App\Http\Controllers\RatioFinancieroController')->store($estado_complementario->id_estado_financiero);
                }
            }    

        //ID de la empresa
        $estado_financiero_actual = EstadoFinanciero::findOrFail($id);
        $id_empresa = $estado_financiero_actual->empresa->id;
        return redirect()->route('ver_empresa', $id_empresa)->withSuccess('Estado financiero guardado correctamente');
        
        }
        else{
            

            foreach($request->cuenta as $key => $value){
                DetalleEstadosFinancieros::create([
                    'cuenta' => $value, 
                    'id_estado_financiero' => $request['id_estado_financiero'][$key],
                    'saldo' => $request['saldo'][$key],
                ]);
            }            
            if($estado_financiero->id_tipo_estado_financiero==1){
                app('App\Http\Controllers\RatioFinancieroController')->store($id);
            }
            else{
                $estado_complementario = EstadoFinanciero::where('fecha_inicio','=',$estado_financiero->fecha_inicio)->
                                                    where('fecha_final','=',$estado_financiero->fecha_final)->
                                                    where('id_empresa','=',$estado_financiero->id_empresa)->
                                                    where('id_tipo_estado_financiero','=',1)->first();
                if($estado_complementario){
                    app('App\Http\Controllers\RatioFinancieroController')->store($estado_complementario->id_estado_financiero);
                }
            }    


        return redirect()->route('ver_empresa', $estado_financiero->id_empresa)->withSuccess('Estado financiero guardado correctamente');
        
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\DetalleEstadosFinancieros  $detalleEstadosFinancieros
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {   
        $mensaje = "";
        $ratio = RatioFinanciero::where('id_estado_financiero', $id)->get();
        $estado_financiero = EstadoFinanciero::findOrFail($id);
        $id_balance_general = EstadoFinanciero::where('fecha_inicio', $estado_financiero->fecha_inicio)->where('id_tipo_estado_financiero',1)->where('id_empresa',$estado_financiero->id_empresa)->first();
        $balance = DetalleEstadosFinancieros::where('id_estado_financiero', $id)->get();
        

        if(count($balance)==0)
        {
            $mensaje = "No se registraron datos para este período!";
        }

        if($estado_financiero->id_tipo_estado_financiero==1)
        {
            return view('EstadosFinancieros.ver_balance_general', compact('balance', 'estado_financiero', 'ratio', 'mensaje'));
        }
        else{
            return view('EstadosFinancieros.ver_estado_resultado', compact('balance', 'estado_financiero', 'id_balance_general', 'mensaje'));
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
        
        $estado_actualizar = EstadoFinanciero::findOrFail($id);
        $empresa = Empresa::findOrFail($estado_actualizar->id_empresa);
        $balance = DB::select('select * from detalle_estados_financieros where id_estado_financiero ='.$id);

        if($estado_actualizar->id_tipo_estado_financiero==1)
        {   
            $i = 0;
            $activos = [];
            $pasivos = [];
            $patrimonio = [];
            $gastos = [];
            $ingresos = [];
            
            while($balance[$i]->cuenta!='PASIVO'){
                $activos[$i] = $balance[$i];
                $i++;
            }
            while($balance[$i]->cuenta!='PATRIMONIO'){
                $pasivos[$i] = $balance[$i];
                $i++;
            }
            while($i!==count($balance)){
                $patrimonio[$i] = $balance[$i];
                $i++;
            }
            return view('EstadosFinancieros.editar_balance_general', compact('activos', 'pasivos', 'patrimonio','empresa', 'estado_actualizar'));
        
        }
        else{
            $j = 0;

            while($balance[$j]->cuenta!='GASTOS'){
                $ingresos[$j] = $balance[$j];
                $j++;
            }
            while($j!==count($balance)){
                $gastos[$j] = $balance[$j];
                $j++;
            }
            return view('EstadosFinancieros.editar_estado_resultado', compact('gastos', 'ingresos','empresa', 'estado_actualizar'));

        }
       
        
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\DetalleEstadosFinancieros  $detalleEstadosFinancieros
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,$id)
    {
        
        $estado_financiero = EstadoFinanciero::findOrFail($id);
        $estados_actualizar = DetalleEstadosFinancieros::where('id_estado_financiero', $id)->get();

        foreach($estados_actualizar as $estado)
        {
            $estado->delete();
        }
        

        if ($request->hasFile('estado_financiero')){
            $file = $request->file('estado_financiero');
            Excel::import(new DetalleEstadosFinancierosImport($id), $file);

            if($estado_financiero->id_tipo_estado_financiero==1){
                app('App\Http\Controllers\RatioFinancieroController')->store($id);
            }
            else{
                $estado_complementario = EstadoFinanciero::where('fecha_inicio','=',$estado_financiero->fecha_inicio)->
                                                    where('fecha_final','=',$estado_financiero->fecha_final)->
                                                    where('id_empresa','=',$estado_financiero->id_empresa)->
                                                    where('id_tipo_estado_financiero','=',1)->first();
                if($estado_complementario){
                    app('App\Http\Controllers\RatioFinancieroController')->store($estado_complementario->id_estado_financiero);
                }
            }    

        //ID de la empresa
        $estado_financiero_actual = EstadoFinanciero::findOrFail($id);
        $id_empresa = $estado_financiero_actual->empresa->id;
        return redirect()->route('ver_empresa', $id_empresa)->withSuccess('Estado financiero actualizado correctamente');
        
        }
        else{
            $estado_financiero = EstadoFinanciero::findOrFail($id);
            $estado_financiero->fecha_inicio = $request->fecha_inicio;
            $estado_financiero->fecha_final = $request->fecha_final;
            $estado_financiero->save();
            
            foreach($request->cuenta as $key => $value){
                DetalleEstadosFinancieros::create([
                    'cuenta' => $value, 
                    'id_estado_financiero' => $request['id_estado_financiero'][$key],
                    'saldo' => $request['saldo'][$key],
                ]);
            }            
            if($estado_financiero->id_tipo_estado_financiero==1){
                app('App\Http\Controllers\RatioFinancieroController')->store($id);
            }
            else{
                $estado_complementario = EstadoFinanciero::where('fecha_inicio','=',$estado_financiero->fecha_inicio)->
                                                    where('fecha_final','=',$estado_financiero->fecha_final)->
                                                    where('id_empresa','=',$estado_financiero->id_empresa)->
                                                    where('id_tipo_estado_financiero','=',1)->first();
                if($estado_complementario){
                    app('App\Http\Controllers\RatioFinancieroController')->store($estado_complementario->id_estado_financiero);
                }
            }    

        //ID de la empresa
        $estado_financiero_actual = EstadoFinanciero::findOrFail($id);
        $id_empresa = $estado_financiero_actual->empresa->id;

        return redirect()->route('ver_empresa', $id_empresa)->withSuccess('Estado financiero actualizado correctamente');
        
        }       

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\DetalleEstadosFinancieros  $detalleEstadosFinancieros
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {   
        
        $estado_financiero = EstadoFinanciero::findOrFail($id);

        $detalles_estado = DetalleEstadosFinancieros::where('id_estado_financiero', $id)->get();
        foreach($detalles_estado as $detalle_estado){
            $detalle_estado->delete();
        }
        $estado_financiero->delete();

        return back();
    }
}
