<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\EstadoFinanciero;
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
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $cantidad_periodos = 0;
        $razon_circulante = 0;
        $pasivo_corriente = 0;
        $activo_corriente = 0;
        $prueba_acida = 0;
        $inventarios = 0;
        $total_activos = 0;
        $razon_capital_trabajo = 0;
        $razon_efectivo = 0;
        $efectivo = 0;
        $valores_corto_plazo = 0;
        $total_pasivos = 0;
        $total_patrimonio = 0;

        $grado_endeudamiento = 0;
        $grado_propiedad = 0;
        $razon_endeudamiento_patrimonial = 0;
        $gastos_financieros = 0;
        $utilidades_antes_impuestos = 0;
        $razon_cobertura_gastos_financieros = 0;

        $indice_margen_bruto = 0;
        $indice_margen_operativo = 0;
        $total_ingresos = 0;
        $utilidad_operativa = 0;
        $utilidad_bruta = 0;
        $inventario_promedio = 0;
        $costo_venta = 0;
        $razon_rotacion_inventario = 0;
        $dias_rotacion_inventario = 0;
        $cuentas_cobrar_comerciales_promedio = 0;
        $cuentas_pagar_comerciales_promedio = 0;
        $razon_rotacion_cuentas_cobrar = 0;
        $razon_periodo_medio_cobranza = 0;
        $razon_rotacion_cuentas_pagar = 0;
        $razon_periodo_medio_pago = 0;
        $compras = 0;
        $total_activo_promedio = 0;
        $activo_fijo_neto_promedio = 0;
        $indice_rotacion_activo_total = 0;
        $indice_rotacion_activo_fijo = 0;
        $mensaje = "";
        $periodos =[];
        
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
            if($cuentas->cuenta=='ACTIVO CORRIENTE'){
                $activo_corriente=$cuentas->saldo;
            }
            if($cuentas->cuenta=='PASIVO CORRIENTE'){
                $pasivo_corriente=$cuentas->saldo;
            }
            if($cuentas->cuenta=='INVENTARIOS'){
                $inventarios=$cuentas->saldo;
            }
            if($cuentas->cuenta=='TOTAL DE ACTIVOS'){
                $total_activos=$cuentas->saldo;
            }
            if($cuentas->cuenta=='Valores de corto plazo'){
                $valores_corto_plazo=$cuentas->saldo;
            }
            if($cuentas->cuenta=='EFECTIVO Y EQUIVALENTES DE EFECTIVO'){
                $efectivo=$cuentas->saldo;
            }
            if($cuentas->cuenta=='TOTAL DE PASIVOS'){
                $total_pasivos=$cuentas->saldo;
            }
            if($cuentas->cuenta=='TOTAL PATRIMONIO'){
                $total_patrimonio=$cuentas->saldo;
            }
            if($cuentas->cuenta=='Utilidades antes de impuesto'){
                $utilidades_antes_impuestos=$cuentas->saldo;
            }
            if($cuentas->cuenta=='Utilidad operativa'){
                $utilidad_operativa=$cuentas->saldo;
            }
            if($cuentas->cuenta=='UTILIDAD BRUTA'){
                $utilidad_bruta=$cuentas->saldo;
            }
            
        }
        //Promedio de cuentas del balance general
        foreach($periodos as $p){
            foreach($p->detallesEstado as $cuenta){
                if($cuenta->cuenta=='INVENTARIOS'){
                    $inventario_promedio=$inventario_promedio + $cuenta->saldo;
                    $cantidad_periodos++;
                } 
                if($cuenta->cuenta=='Cuentas por cobrar comerciales'){
                    $cuentas_cobrar_comerciales_promedio=$cuentas_cobrar_comerciales_promedio + $cuenta->saldo;
                }
                if($cuenta->cuenta=='Cuentas por pagar comerciales'){
                    $cuentas_pagar_comerciales_promedio=$cuentas_pagar_comerciales_promedio + $cuenta->saldo;
                } 
                if($cuenta->cuenta=='TOTAL DE ACTIVOS'){
                    $total_activo_promedio=$total_activo_promedio + $cuenta->saldo;
                }
                if($cuenta->cuenta=='ACTIVO FIJO NETO'){
                    $activo_fijo_neto_promedio=$activo_fijo_neto_promedio + $cuenta->saldo;
                } 
                
                
            }                      
        }
        
        //Promedio de cuentas de estado de resultado
        foreach($estado_resultado as $cuenta){
                if($cuenta->cuenta=='TOTAL DE INGRESOS'){
                    $total_ingresos=$cuenta->saldo;
                }
                if($cuenta->cuenta=='COSTO DE VENTA'){
                        $costo_venta = $cuenta->saldo;
                }
                if($cuenta->cuenta=='COMPRAS'){
                    $compras = $cuenta->saldo;
                }
                if($cuenta->cuenta=='GASTOS FINANCIEROS'){
                    $gastos_financieros=$cuenta->saldo;
                }                
        }                      
        
        $inventario_promedio = $inventario_promedio/$cantidad_periodos;
        $cuentas_cobrar_comerciales_promedio = $cuentas_cobrar_comerciales_promedio/$cantidad_periodos;
        $cuentas_pagar_comerciales_promedio = $cuentas_pagar_comerciales_promedio/$cantidad_periodos;
        $total_activo_promedio = $total_activo_promedio/$cantidad_periodos;
        $activo_fijo_neto_promedio = $activo_fijo_neto_promedio/$cantidad_periodos;

        //Razones de liquidez
        $razon_circulante = round($activo_corriente/$pasivo_corriente, 2);
        $prueba_acida = round(($activo_corriente - $inventarios)/ $pasivo_corriente, 2);
        $razon_capital_trabajo = round(($activo_corriente - $pasivo_corriente)/$total_activos, 2);
        $razon_efectivo = round(($efectivo + $valores_corto_plazo)/$pasivo_corriente,2);

        //Razones de actividad
        $razon_rotacion_inventario = $inventario_promedio == 0 ? 0 : (round($costo_venta / $inventario_promedio,2));
        $dias_rotacion_inventario = $costo_venta == 0 ? 0 : (round($inventario_promedio / ($costo_venta/365),2));
        
        $razon_rotacion_cuentas_cobrar = $cuentas_cobrar_comerciales_promedio == 0 ? 0 : (round(($total_ingresos) /$cuentas_cobrar_comerciales_promedio,2));
        $razon_periodo_medio_cobranza = $total_ingresos == 0 ? 0 : (round(($cuentas_cobrar_comerciales_promedio*365) /$total_ingresos,2));
        
        $razon_rotacion_cuentas_pagar = $cuentas_pagar_comerciales_promedio == 0 ? 0 : (round(($compras) /$cuentas_pagar_comerciales_promedio,2));
        $razon_periodo_medio_pago = $compras == 0 ? 0 : (round(($cuentas_pagar_comerciales_promedio*365) /$compras,2));
        
        $indice_rotacion_activo_total = $total_activo_promedio == 0 ? 0 : (round($total_ingresos / $total_activo_promedio,2));
        $indice_rotacion_activo_fijo = $activo_fijo_neto_promedio == 0 ? 0 : (round($total_ingresos / $activo_fijo_neto_promedio,2));

        $indice_margen_bruto = $total_ingresos == 0 ? 0 : (round($utilidad_bruta / $total_ingresos, 3));
        $indice_margen_operativo = $total_ingresos == 0 ? 0 : (round($utilidad_operativa / $total_ingresos,2));


        //Razones de apalancamiento
        $grado_endeudamiento = $total_activos == 0 ? 0 : (round($total_pasivos / $total_activos,2));
        $grado_propiedad = $total_activos == 0 ? 0 : (round($total_patrimonio / $total_activos,2));
        $razon_endeudamiento_patrimonial = $total_patrimonio == 0 ? 0 : (round($total_pasivos / $total_patrimonio,2));
        $razon_cobertura_gastos_financieros = $gastos_financieros == 0 ? 0 : (round($utilidades_antes_impuestos / $gastos_financieros,2));
        } 
        else{
            $mensaje="Se debe registrar un estado de resultado correspondiente a este período para el cálculo de las razones financieras!!!";
        }
        return view('RatiosFinancieros/calcular_ratios', compact('estado_financiero_1', 'razon_circulante', 'prueba_acida', 'razon_capital_trabajo', 'razon_efectivo', 'grado_endeudamiento', 'grado_propiedad', 'razon_endeudamiento_patrimonial', 'razon_cobertura_gastos_financieros', 'indice_margen_bruto', 'indice_margen_operativo', 'periodos', 'razon_rotacion_inventario', 'dias_rotacion_inventario', 'razon_rotacion_cuentas_cobrar', 'razon_periodo_medio_cobranza', 'razon_periodo_medio_pago', 'razon_rotacion_cuentas_pagar', 'indice_rotacion_activo_fijo', 'indice_rotacion_activo_total', 'mensaje'));

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
