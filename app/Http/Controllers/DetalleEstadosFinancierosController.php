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
        $total_activos = 0;
        $total_activos = 0;
        $total_patrimonio = 0;
        $cuentas = [];
        $montos = [];

        foreach($request->cuenta as $key => $value){
            $cuentas[$key] = $value;  
            $montos[$key] = $request['saldo'][$key];
        }
        for($i=0; $i<count($cuentas);$i++)
        {
            if(!strcasecmp($cuentas[$i],'Total de activos')){
                $total_activos=$montos[$i];
            }
            if(!strcasecmp($cuentas[$i],'Total de pasivos')){
                $total_pasivos=$montos[$i];
            }
            if(!strcasecmp($cuentas[$i],'Total patrimonio')){
                $total_patrimonio=$montos[$i];
            }
        }

        if($total_activos!=$total_pasivos+$total_patrimonio)
        {   
            $estado_financiero = EstadoFinanciero::findOrFail($id);
            $empresa = Empresa::findOrFail($estado_financiero->id_empresa);
            if($estado_financiero->id_tipo_estado_financiero==1)
            {
                
                $activos = [];
                $pasivos = [];
                $patrimonio = [];
                $catalogo = Catalogo::where('id_empresa', $empresa->id)->get();
    
                foreach($catalogo as $cuenta)
                {
                    if($cuenta->cuenta->id_tipo_cuenta == 1)
                    {
                        $activos[] = $cuenta;
                    }
                    elseif($cuenta->cuenta->id_tipo_cuenta == 2)
                    {
                        $pasivos[] = $cuenta;
                    }
                    elseif($cuenta->cuenta->id_tipo_cuenta == 3)
                    {
                        $patrimonio[] = $cuenta;
                    }
                }
                Alert::error('Error', 'El total de activos debe ser igual al total de activos más patrimonio!');
                return view('EstadosFinancieros.crear_balance_general', compact('activos', 'pasivos', 'patrimonio','empresa', 'estado_financiero'));
            }
           
        }
        else{

        
        if ($request->hasFile('estado_financiero')){
            $file = $request->file('estado_financiero');
            Excel::import(new DetalleEstadosFinancierosImport($id), $file);
        }
        else{
            foreach($request->cuenta as $key => $value){
                DetalleEstadosFinancieros::create([
                    'cuenta' => $value, 
                    'id_estado_financiero' => $request['id_estado_financiero'][$key],
                    'saldo' => $request['saldo'][$key],
                ]);
         }
         
        }

        app('App\Http\Controllers\RatioFinancieroController')->store($id);

        //ID de la empresa
        $estado_financiero_actual = EstadoFinanciero::findOrFail($id);
        $id_empresa = $estado_financiero_actual->empresa->id;

        return redirect()->route('ver_empresa', $id_empresa)->withSuccess('Estado financiero guardado correctamente');
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
        //
        $estado_financiero = EstadoFinanciero::findOrFail($id);
        $balance = DetalleEstadosFinancieros::where('id_estado_financiero', $id)->get();
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
    public function update(Request $request,$id)
    {
            $estado_actualizar = EstadoFinanciero::findOrFail($id);
            $estado_actualizar->fecha_inicio = $request->fecha_inicio;
            $estado_actualizar->fecha_final =$request->fecha_final;
            $estado_actualizar->update();

        foreach($request->cuenta as $key => $value){
            DetalleEstadosFinancieros::where('id_detalle_estados_financieros', $request['id_detalle_estados_financieros'][$key])->update([
                'cuenta' => $value, 
                'id_estado_financiero' => $request['id_estado_financiero'][$key],
                'saldo' => $request['saldo'][$key],
            ]);
            }

            app('App\Http\Controllers\RatioFinancieroController')->store($id);
            
            //ID de la empresa
            $estado_financiero_actual = EstadoFinanciero::findOrFail($id);
            $id_empresa = $estado_financiero_actual->empresa->id;

            return redirect()->route('ver_empresa', $id_empresa)->withSuccess('Estado financiero guardado correctamente');
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
