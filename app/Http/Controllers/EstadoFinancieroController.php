<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Empresa;
use App\Catalogo;
use App\TipoEstadoFinanciero;
use App\EstadoFinanciero;
use App\Http\Requests\EmpresaRequest;
use App\Http\Requests\EstadoFinancieroRequest;
use RealRashid\SweetAlert\Facades\Alert;
use App\Imports\DetalleEstadosFinancierosImport;

class EstadoFinancieroController extends Controller
{
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($id)
    {   
        $empresa = Empresa::findOrFail($id);
        $tipo_estados = TipoEstadoFinanciero::all();

        return view('EstadosFinancieros.crear_estado_financiero', compact('empresa', 'tipo_estados'));


    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(EstadoFinancieroRequest $request)
    {   
       
        $estados_creados = EstadoFinanciero::where('id_empresa',$request->id_empresa)
                                            ->where('id_tipo_estado_financiero',$request->id_tipo_estado_financiero)
                                            ->whereBetween('fecha_inicio',[$request->fecha_inicio,$request->fecha_inicio])
                                            ->whereBetween('fecha_final',[$request->fecha_inicio,$request->fecha_inicio])->first();
        
        $estado_financiero = new EstadoFinanciero();
        $estado_financiero->id_tipo_estado_financiero = $request->id_tipo_estado_financiero;
        $estado_financiero->id_empresa = $request->id_empresa;
        $estado_financiero->fecha_inicio = $request->fecha_inicio;
        $estado_financiero->fecha_final = $request->fecha_inicio;

        if($estados_creados)
        {   
            return back()->withWarning('Ya se creó un estado financiero para el rango de fechas indicadas, ingrese otro período!');
   
        }
      
        $estado_financiero->save();
        
        
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
           
            return view('EstadosFinancieros.crear_balance_general', compact('activos', 'pasivos', 'patrimonio','empresa', 'estado_financiero'));
        }
        elseif($estado_financiero->id_tipo_estado_financiero==2)
        {
            $ingresos = [];
            $gastos = [];
            $catalogo = Catalogo::where('id_empresa', $empresa->id)->get();

            foreach($catalogo as $cuenta)
            {
                if($cuenta->cuenta->id_tipo_cuenta == 4)
                {
                    $gastos[] = $cuenta;
                }
                elseif($cuenta->cuenta->id_tipo_cuenta == 5)
                {
                    $ingresos[] = $cuenta;
                }
                
            }
            return view('EstadosFinancieros.crear_estado_resultados', compact('ingresos','gastos','empresa', 'estado_financiero', ));
        }
        
    }
        public function edit($id)
    {

    }

    public function update(EstadoFinancieroRequest $request, $id)
    {   


    }

}
