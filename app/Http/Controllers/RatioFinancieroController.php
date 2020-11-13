<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\EstadoFinanciero;
use App\RatioFinanciero;
use App\DetalleEstadosFinancieros;
use \DB;

class RatioFinancieroController extends Controller
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
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store($id)
    {   

        $ratios = RatioFinanciero::where('id_estado_financiero', $id)->get();

        $razones_liquidez = RatioFinanciero::where('id_estado_financiero', $id)->where('id_tipo_ratio', 1)->get();
        $razones_actividad = RatioFinanciero::where('id_estado_financiero', $id)->where('id_tipo_ratio', 2)->get();
        $razones_apalancamiento = RatioFinanciero::where('id_estado_financiero', $id)->where('id_tipo_ratio', 3)->get();
        $razones_rentabilidad = RatioFinanciero::where('id_estado_financiero', $id)->where('id_tipo_ratio', 4)->get();

        $estado_financiero_1 = EstadoFinanciero::findOrFail($id);
        $mensaje = "";
        
        if(count($ratios)==0)
        {
        $cantidad_periodos = 0;
        $pasivo_corriente = 0;
        $activo_corriente = 0;
        $inventarios = 0;
        $total_activos = 0;
        $efectivo = 0;
        $valores_corto_plazo = 0;
        $total_pasivos = 0;
        $total_patrimonio = 0;
        $gastos_financieros = 0;
        $utilidades_antes_impuestos = 0;
        $total_ingresos = 0;
        $utilidad_operativa = 0;
        $utilidad_bruta = 0;
        $inventario_promedio = 0;
        $costo_venta = 0;
        $cuentas_cobrar_comerciales_promedio = 0;
        $cuentas_pagar_comerciales_promedio = 0;
        $razon_periodo_medio_cobranza = 0;
        $compras = 0;
        $total_activo_promedio = 0;
        $activo_fijo_neto_promedio = 0;
        
        $mensaje = "";
        $periodos =[];

       
        $total_patrimonio_promedio = 0;
        $total_gastos=0;
        $ventas_netas=0;
        $inversion=0;
        
        $estado_financiero_1 = EstadoFinanciero::findOrFail($id);
        $balance = DB::select('select * from detalle_estados_financieros where id_estado_financiero ='.$id);
        $estado_financiero_2 = EstadoFinanciero::where('fecha_inicio','=',$estado_financiero_1->fecha_inicio)->
                                                where('fecha_final','=',$estado_financiero_1->fecha_final)->
                                                where('id_empresa','=',$estado_financiero_1->id_empresa)->
                                                where('id_tipo_estado_financiero','=',2)->first();
        if($estado_financiero_2)
        {                                      
        $estado_resultado = DB::select('select * from detalle_estados_financieros where id_estado_financiero ='.$estado_financiero_2->id_estado_financiero);;
        $periodos = EstadoFinanciero::where('fecha_inicio', '<=', $estado_financiero_1->fecha_inicio)->where('id_empresa', $estado_financiero_1->id_empresa)->get();
        
        //Ceuntas de balance general
        foreach($balance as $cuentas){
            if(!strcasecmp($cuentas->cuenta,'ACTIVO CORRIENTE')){
                $activo_corriente=$cuentas->saldo;
            }
            if(!strcasecmp($cuentas->cuenta,'PASIVO CORRIENTE')){
                $pasivo_corriente=$cuentas->saldo;
            }
            if(!strcasecmp($cuentas->cuenta,'inventarios')){
                $inventarios=$cuentas->saldo;
            }
            if(!strcasecmp($cuentas->cuenta,'TOTAL DE ACTIVOS')){
                $total_activos=$cuentas->saldo;
            }
            if(!strcasecmp($cuentas->cuenta,'Valores de corto plazo')){
                $valores_corto_plazo=$cuentas->saldo;
            }
            if(!strcasecmp($cuentas->cuenta,'EFECTIVO Y EQUIVALENTES DE EFECTIVO')){
                $efectivo=$cuentas->saldo;
            }
            if(!strcasecmp($cuentas->cuenta,'TOTAL DE PASIVOS')){
                $total_pasivos=$cuentas->saldo;
            }
            if(!strcasecmp($cuentas->cuenta,'TOTAL PATRIMONIO')){
                $total_patrimonio=$cuentas->saldo;
            }
            if(!strcasecmp($cuentas->cuenta,'Utilidades antes de impuesto')){
                $utilidades_antes_impuestos=$cuentas->saldo;
            }
            if(!strcasecmp($cuentas->cuenta,'Utilidad operativa')){
                $utilidad_operativa=$cuentas->saldo;
            }
            if(!strcasecmp($cuentas->cuenta,'UTILIDAD BRUTA')){
                $utilidad_bruta=$cuentas->saldo;
            }
            if(!strcasecmp($cuentas->cuenta,'Inversiones')){
                $inversion=$cuentas->saldo;
            }
        }
        //Promedio de cuentas del balance general
        foreach($periodos as $p){
            foreach($p->detallesEstado as $cuenta){
                if(!strcasecmp($cuenta->cuenta,'inventarios')){
                    $inventario_promedio=$inventario_promedio + $cuenta->saldo;
                    $cantidad_periodos++;
                } 
                if(!strcasecmp($cuenta->cuenta,'Cuentas por cobrar comerciales')){
                    $cuentas_cobrar_comerciales_promedio=$cuentas_cobrar_comerciales_promedio + $cuenta->saldo;
                }
                if(!strcasecmp($cuenta->cuenta,'Cuentas por pagar comerciales')){
                    $cuentas_pagar_comerciales_promedio=$cuentas_pagar_comerciales_promedio + $cuenta->saldo;
                } 
                if(!strcasecmp($cuenta->cuenta,'TOTAL DE ACTIVOS')){
                    $total_activo_promedio=$total_activo_promedio + $cuenta->saldo;
                }
                if(!strcasecmp($cuenta->cuenta,'ACTIVO FIJO NETO')){
                    $activo_fijo_neto_promedio=$activo_fijo_neto_promedio + $cuenta->saldo;
                }
                if(!strcasecmp($cuenta->cuenta,'TOTAL PATRIMONIO')){
                    $total_patrimonio_promedio=$total_patrimonio_promedio + $cuenta->saldo;
                }
            }
        }
        
        //Promedio de cuentas de estado de resultado
        foreach($estado_resultado as $cuenta){
                if(!strcasecmp($cuenta->cuenta,'TOTAL DE INGRESOS')){
                    $total_ingresos=$cuenta->saldo;
                }
                if(!strcasecmp($cuenta->cuenta,'COSTO DE VENTA')){
                        $costo_venta = $cuenta->saldo;
                }
                if(!strcasecmp($cuenta->cuenta,'COMPRAS')){
                    $compras = $cuenta->saldo;
                }
                if(!strcasecmp($cuenta->cuenta,'GASTOS FINANCIEROS')){
                    $gastos_financieros=$cuenta->saldo;
                }
                if(!strcasecmp($cuenta->cuenta,'TOTAL DE GASTOS')){
                    $total_gastos=$cuenta->saldo;
                }
                if(!strcasecmp($cuenta->cuenta,'Ventas Netas')){
                    $ventas_netas=$cuenta->saldo;
                }
        }
        //Calculo de promedios
        $inventario_promedio = $inventario_promedio/$cantidad_periodos;
        $cuentas_cobrar_comerciales_promedio = $cuentas_cobrar_comerciales_promedio/$cantidad_periodos;
        $cuentas_pagar_comerciales_promedio = $cuentas_pagar_comerciales_promedio/$cantidad_periodos;
        $total_activo_promedio = $total_activo_promedio/$cantidad_periodos;
        $activo_fijo_neto_promedio = $activo_fijo_neto_promedio/$cantidad_periodos;
        $total_patrimonio_promedio = $total_patrimonio_promedio/$cantidad_periodos;
        
        //Razones de liquidez////////////////////////////////////////////////////////////////////////////////////////////////
        $ratio = new RatioFinanciero();
        $ratio->id_estado_financiero = $id;
        $ratio->id_tipo_ratio = 1;
        $ratio->nombre_ratio = "Razón de circulante";
        $ratio->calculo_ratio = $pasivo_corriente == 0 ? 0 : (round($activo_corriente/$pasivo_corriente, 2));
        $ratio->save();

        $ratio = new RatioFinanciero();
        $ratio->id_estado_financiero = $id;
        $ratio->id_tipo_ratio = 1;
        $ratio->nombre_ratio = "Prueba ácida";
        $ratio->calculo_ratio = $pasivo_corriente == 0 ? 0 : (round(($activo_corriente - $inventarios)/ $pasivo_corriente, 2));
        $ratio->save();

        $ratio = new RatioFinanciero();
        $ratio->id_estado_financiero = $id;
        $ratio->id_tipo_ratio = 1;
        $ratio->nombre_ratio = "Razón de capital de trabajo";
        $ratio->calculo_ratio = $total_activos == 0 ? 0 : (round(($activo_corriente - $pasivo_corriente)/$total_activos, 2));
        $ratio->save();

        $ratio = new RatioFinanciero();
        $ratio->id_estado_financiero = $id;
        $ratio->id_tipo_ratio = 1;
        $ratio->nombre_ratio = "Razón de efectivo";
        $ratio->calculo_ratio = $pasivo_corriente == 0 ? 0 : round(($efectivo + $valores_corto_plazo)/$pasivo_corriente,2);
        $ratio->save();

        //Razones de actividad////////////////////////////////////////////////////////////////////////////////////////////////
        $ratio = new RatioFinanciero();
        $ratio->id_estado_financiero = $id;
        $ratio->id_tipo_ratio = 2;
        $ratio->nombre_ratio = "Razón de rotación de inventario";
        $ratio->calculo_ratio = $inventario_promedio == 0 ? 0 : (round($costo_venta / $inventario_promedio,2));
        $ratio->save();

        $ratio = new RatioFinanciero();
        $ratio->id_estado_financiero = $id;
        $ratio->id_tipo_ratio = 2;
        $ratio->nombre_ratio = "Razón de rotación de inventario (en días)";
        $ratio->calculo_ratio = $costo_venta == 0 ? 0 : (round($inventario_promedio / ($costo_venta/365),2));
        $ratio->save();

        $ratio = new RatioFinanciero();
        $ratio->id_estado_financiero = $id;
        $ratio->id_tipo_ratio = 2;
        $ratio->nombre_ratio = "Razón de rotación de cuentas por cobrar";
        $ratio->calculo_ratio = $cuentas_cobrar_comerciales_promedio == 0 ? 0 : (round(($total_ingresos) /$cuentas_cobrar_comerciales_promedio,2));
        $ratio->save();

        $ratio = new RatioFinanciero();
        $ratio->id_estado_financiero = $id;
        $ratio->id_tipo_ratio = 2;
        $ratio->nombre_ratio = "Razón de período medio de cobranza";
        $ratio->calculo_ratio = $total_ingresos == 0 ? 0 : (round(($cuentas_cobrar_comerciales_promedio*365) /$total_ingresos,2));
        $ratio->save();

        $ratio = new RatioFinanciero();
        $ratio->id_estado_financiero = $id;
        $ratio->id_tipo_ratio = 2;
        $ratio->nombre_ratio = "Razón de rotación de cuentas por pagar";
        $ratio->calculo_ratio = $cuentas_pagar_comerciales_promedio == 0 ? 0 : (round(($compras) /$cuentas_pagar_comerciales_promedio,2));
        $ratio->save();

        $ratio = new RatioFinanciero();
        $ratio->id_estado_financiero = $id;
        $ratio->id_tipo_ratio = 2;
        $ratio->nombre_ratio = "Período medio de pago";
        $ratio->calculo_ratio = $compras == 0 ? 0 : (round(($cuentas_pagar_comerciales_promedio*365) /$compras,2));
        $ratio->save();

        $ratio = new RatioFinanciero();
        $ratio->id_estado_financiero = $id;
        $ratio->id_tipo_ratio = 2;
        $ratio->nombre_ratio = "Índice de rotación de activos totales";
        $ratio->calculo_ratio = $total_activo_promedio == 0 ? 0 : (round($total_ingresos / $total_activo_promedio,2));
        $ratio->save();

        $ratio = new RatioFinanciero();
        $ratio->id_estado_financiero = $id;
        $ratio->id_tipo_ratio = 2;
        $ratio->nombre_ratio = "Índice de rotación de activos fijos";
        $ratio->calculo_ratio = $activo_fijo_neto_promedio == 0 ? 0 : (round($total_ingresos / $activo_fijo_neto_promedio,2));
        $ratio->save();

        $ratio = new RatioFinanciero();
        $ratio->id_estado_financiero = $id;
        $ratio->id_tipo_ratio = 2;
        $ratio->nombre_ratio = "Índice de margen bruto";
        $ratio->calculo_ratio = $total_ingresos == 0 ? 0 : (round($utilidad_bruta / $total_ingresos, 2));
        $ratio->save();

        $ratio = new RatioFinanciero();
        $ratio->id_estado_financiero = $id;
        $ratio->id_tipo_ratio = 2;
        $ratio->nombre_ratio = "Índice de margen operativo";
        $ratio->calculo_ratio = $total_ingresos == 0 ? 0 : (round($utilidad_operativa / $total_ingresos,2));
        $ratio->save();

        //Razones de actividad////////////////////////////////////////////////////////////////////////////////////////////////
        $ratio = new RatioFinanciero();
        $ratio->id_estado_financiero = $id;
        $ratio->id_tipo_ratio = 3;
        $ratio->nombre_ratio = "Grado de endeudamiento";
        $ratio->calculo_ratio = $total_activos == 0 ? 0 : (round($total_pasivos / $total_activos,2));
        $ratio->save();

        $ratio = new RatioFinanciero();
        $ratio->id_estado_financiero = $id;
        $ratio->id_tipo_ratio = 3;
        $ratio->nombre_ratio = "Grado de propiedad";
        $ratio->calculo_ratio = $total_activos == 0 ? 0 : (round($total_patrimonio / $total_activos,2));
        $ratio->save();

        $ratio = new RatioFinanciero();
        $ratio->id_estado_financiero = $id;
        $ratio->id_tipo_ratio = 3;
        $ratio->nombre_ratio = "Razón de endeudamiento patrimonial";
        $ratio->calculo_ratio = $total_patrimonio == 0 ? 0 : (round($total_pasivos / $total_patrimonio,2));
        $ratio->save();

        $ratio = new RatioFinanciero();
        $ratio->id_estado_financiero = $id;
        $ratio->id_tipo_ratio = 3;
        $ratio->nombre_ratio = "Razón de cobertura de gastos financieros";
        $ratio->calculo_ratio = $gastos_financieros == 0 ? 0 : (round($utilidades_antes_impuestos / $gastos_financieros,2));
        $ratio->save();

        
        //Razones de rentabilidad////////////////////////////////////////////////////////////////////////////////////////////////
        $ratio = new RatioFinanciero();
        $ratio->id_estado_financiero = $id;
        $ratio->id_tipo_ratio = 4;
        $ratio->nombre_ratio = "Rentabilidad neta del patrimonio (ROE)";
        $ratio->calculo_ratio = $total_patrimonio_promedio == 0 ? 0 : round(($total_ingresos - $total_gastos)/$total_patrimonio_promedio,2);
        $ratio->save();

        $ratio = new RatioFinanciero();
        $ratio->id_estado_financiero = $id;
        $ratio->id_tipo_ratio = 4;
        $ratio->nombre_ratio = "Rentabilidad del activo (ROA)";
        $ratio->calculo_ratio = $total_activo_promedio == 0 ? 0 : round(($total_ingresos - $total_gastos)/$total_activo_promedio,2);
        $ratio->save();

        $ratio = new RatioFinanciero();
        $ratio->id_estado_financiero = $id;
        $ratio->id_tipo_ratio = 4;
        $ratio->nombre_ratio = "Rentabilidad sobre ventas";
        $ratio->calculo_ratio = $ventas_netas  == 0 ? 0 : round(($total_ingresos - $total_gastos)/$ventas_netas,2);
        $ratio->save();

        $ratio = new RatioFinanciero();
        $ratio->id_estado_financiero = $id;
        $ratio->id_tipo_ratio = 4;
        $ratio->nombre_ratio = "Rentabilidad sobre la inversión (ROI)";
        $ratio->calculo_ratio = $inversion  == 0 ? 0 : round(($total_ingresos - $inversion)/$inversion,2);
        $ratio->save();
        
        } 
        else{
            $mensaje="Se debe registrar un estado de resultado correspondiente a este período para el cálculo de las razones financieras!!!";
        }

        }
        return view('RatiosFinancieros.ver_ratios', compact('estado_financiero_1', 'mensaje', 'ratios', 'razones_rentabilidad', 'razones_apalancamiento', 'razones_actividad', 'razones_liquidez')); 
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function comparar($id)
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
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
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
