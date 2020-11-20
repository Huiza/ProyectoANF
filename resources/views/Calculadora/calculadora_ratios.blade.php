@extends('layouts.app')

@section('content')
<div class="col-lg-12">
            <div class="col-lg-12 col-md-4 col-sm-4 col-xs-12">
            <h3>Calculadora de razones financieras</h3>
            <!-- RAZONES DE LIQUIDEZ -->
            <div class="col-lg-12 col-md-4 col-sm-4 col-xs-12" >
              <div class="custom-box" style="padding:5%;">
              <h3>Calculadora de razones financieras</h3>
              <!--Opciones en el checkbox-->
              
              
              <h4>Seleccione:</h4>
              <div class="btn-group btn-group-justified">
                <div class="btn-group">
                  <button  id="liquidez" onclick="ver_razones_liquidez()" type="button" class=" btn btn-default">Razones liquidez</button>
                </div>
                <div class="btn-group">
                  <button id="actividad" onclick="ver_razones_actividad()" type="button" class="btn btn-default">Razones de actividad</button>
                </div>
                <div class="btn-group">
                  <button id="apalancamiento" onclick="ver_razones_apalancamiento()" type="button" class="btn btn-default">Razones de apalancamiento</button>
                </div>
                <div class="btn-group">
                  <button id="rentabilidad" onclick="ver_razones_rentabilidad()" type="button" class="btn btn-default">Razones de rentabilidad</button>
                </div>
              </div>
         

              <br><br>
              <div id="razones_liquidez" >
                <div class="servicetitle">
                  <h4>Razones de liquidez</h4>
                  <hr>
                </div>
               
                <p>Ingrese los montos de las razones que desea calcular.</p><br><br>
                <div style="width:100%;">
                    <div class="form-group" >
                        <h4><strong>Razón de circulante/liquidez corriente</strong></h4><br>
                        <label for="activo_corriente" class="col-sm-12 col-sm-12 control-label"><strong> Activo corriente [$]</strong></label>
                        <input id="activo_corriente" type="number" step="any" min="0" class="form-control round-form" >
                        <label for="pasivo_corriente" class="col-sm-12 col-sm-12 control-label"><strong> Pasivo corriente [$]</strong></label>
                        <input id="pasivo_corriente" type="number" step="any" min="0" class="form-control round-form" ><br>
                    
                        <div id="razon_circulante_cont" class="col-md-12 alert alert-warning" hidden>
                        <strong>
                        <span>RAZÓN CIRCULANTE = </span><span id="razon_circulante"></span>  
                    </div>
                    <button class="btn btn-theme" onclick="calcular_razon_circulante()">Calcular</button>
                </div>
                
                <br><br>
                <div class="form-group">

                    <h4><strong>Prueba ácida/razón rápida</strong></h4><br>
                    <label for="activo_corriente_pa" class="col-sm-12 col-sm-12 control-label"><strong> Activo corriente [$]</strong></label>
                    <input id="activo_corriente_pa" type="number" step="any" min="0" class="form-control round-form">
                    <label for="inventario_pa" class="col-sm-12 col-sm-12 control-label"><strong> Inventario [$]</strong></label>
                    <input id="inventario_pa" type="number" step="any" min="0" class="form-control round-form" >
                    <label for="pasivo_corriente_pa" class="col-sm-12 col-sm-12 control-label"><strong> Pasivo corriente [$]</strong></label>
                    <input id="pasivo_corriente_pa" type="number" step="any" min="0" class="form-control round-form">
                    
                    <div id="prueba_acida_cont" class="col-md-12 alert alert-warning" hidden>
                    <strong>
                    <span>PRUEBA ÁCIDA = </span><span id="prueba_acida"></span>  
                    </div><br>
                    <button class="btn btn-theme" onclick="calcular_prueba_acida()">Calcular</button>
                
                </div>
                <br><br>
                <div class="form-group">

                <h4><strong>Razón de capital de trabajo</strong></h4><br>
                <label for="activo_corriente_ct" class="col-sm-12 col-sm-12 control-label"><strong> Activo corriente [$]</strong></label>
                <input id="activo_corriente_ct" type="number" step="any" min="0" class="form-control round-form">
                <label for="pasivo_corriente_ct" class="col-sm-12 col-sm-12 control-label"><strong> Pasivo corriente [$]</strong></label>
                <input id="pasivo_corriente_ct" type="number" step="any" min="0" class="form-control round-form">
                <label for="activos_totales_ct" class="col-sm-12 col-sm-12 control-label"><strong> Activos totales [$]</strong></label>
                <input id="activos_totales_ct" type="number" step="any" min="0" class="form-control round-form" >
                
                <div id="capital_trabajo_cont" class="col-md-12 alert alert-warning" hidden>
                <strong>
                <span>RAZÓN DE CAPITAL DE TRABAJO = </span><span id="capital_trabajo"></span>  
                </div><br>
                <button class="btn btn-theme" onclick="calcular_capital_trabajo()">Calcular</button>

                </div>
                <br><br>
                <div class="form-group">

                <h4><strong>Razón de efectivo</strong></h4><br>
                <label for="efectivo_re" class="col-sm-12 col-sm-12 control-label"><strong> Efectivo [$]</strong></label>
                <input id="efectivo_re" type="number" step="any" min="0" class="form-control round-form">
                <label for="valores_corto_plazo" class="col-sm-12 col-sm-12 control-label"><strong> Valores de corto plazo [$]</strong></label>
                <input id="valores_corto_plazo" type="number" step="any" min="0" class="form-control round-form">
                <label for="pasivos_corrientes_re" class="col-sm-12 col-sm-12 control-label"><strong> Pasivos corrientes [$]</strong></label>
                <input id="pasivos_corrientes_re" type="number" step="any" min="0" class="form-control round-form" >
                
                <div id="razon_efectivo_cont" class="col-md-12 alert alert-warning" hidden>
                <strong>
                <span>RAZÓN DE EFECTIVO = </span><span id="razon_efectivo"></span>  
                </div><br>
                <button class="btn btn-theme" onclick="calcular_razon_efectivo()">Calcular</button>

                </div>
              </div>
              </div>
              
       
              <!-- FIN DE RAZONES DE LIQUIDEZ -->
              <div id="razones_actividad" hidden>
              <div class="servicetitle">
                  <h4>Razones de actividad</h4>
                  <hr>
                </div>
               
                <p>Ingrese los montos de las razones que desea calcular.</p><br><br>
                <div style="width:50%;">
                <div class="form-group">

                    <h4><strong>Razón y días de rotación de inventario</strong></h4><br>
                    <label for="costo_ventas" class="col-sm-12 col-sm-12 control-label"><strong> Costo de ventas [$]</strong></label>
                    <input id="costo_ventas" type="number" step="any" min="0" class="form-control round-form" >
                    <label for="inventario_prom" class="col-sm-12 col-sm-12 control-label"><strong> Inventario promedio [$]</strong></label>
                    <input id="inventario_prom" type="number" step="any" min="0" class="form-control round-form" ><br>
                    
                    <div id="razon_inventario_cont" class="col-md-12 alert alert-warning" hidden>
                    <strong>
                    <span>RAZÓN DE ROTACIÓN DE INVENTARIO = </span><span id="razon_inventario"></span>  
                    </div>
                    <button class="btn btn-theme" onclick="calcular_razon_inventario()">Calcular</button>
                
                </div>
                
                <br><br>
                <div class="form-group">

                    <h4><strong>Razón y rotación de cobros</strong></h4><br>
                    <label for="ventas_rc" class="col-sm-12 col-sm-12 control-label"><strong> Ventas netas [$]</strong></label>
                    <input id="ventas_rc" type="number" step="any" min="0" class="form-control round-form">
                    <label for="prom_cuentas_cobrar" class="col-sm-12 col-sm-12 control-label"><strong> Promedio de cuentas por cobrar comerciales [$]</strong></label>
                    <input id="prom_cuentas_cobrar" type="number" step="any" min="0" class="form-control round-form" >
                    
                    <div id="rotacion_cobros_cont" class="col-md-12 alert alert-warning" hidden>
                    <strong>
                    <span>RAZÓN Y ROTACIÓN DE COBROS = </span><span id="rotacion_cobros"></span>  
                    </div><br>
                    <button class="btn btn-theme" onclick="calcular_rotacion_cobros()">Calcular</button>
                
                </div>
                <br><br>
                <div class="form-group">

                    <h4><strong>Razón y rotación de pagos</strong></h4><br>
                    <label for="compras" class="col-sm-12 col-sm-12 control-label"><strong> Compras [$]</strong></label>
                    <input id="compras" type="number" step="any" min="0" class="form-control round-form">
                    <label for="prom_cuentas_pagar" class="col-sm-12 col-sm-12 control-label"><strong> Promedio de cuentas por pagar comerciales [$]</strong></label>
                    <input id="prom_cuentas_pagar" type="number" step="any" min="0" class="form-control round-form" >
                    
                    <div id="rotacion_pagos_cont" class="col-md-12 alert alert-warning" hidden>
                    <strong>
                    <span>RAZÓN Y ROTACIÓN DE PAGOS = </span><span id="rotacion_pagos"></span>  
                    </div><br>
                    <button class="btn btn-theme" onclick="calcular_rotacion_pagos()">Calcular</button>
                
                </div>
                <br><br>
                <div class="form-group">

                <h4><strong>Índice de rotación de activos totales</strong></h4><br>
                <label for="ventas_netas_rat" class="col-sm-12 col-sm-12 control-label"><strong> Ventas netas [$]</strong></label>
                <input id="ventas_netas_rat" type="number" step="any" min="0" class="form-control round-form">
                <label for="act_total_prom" class="col-sm-12 col-sm-12 control-label"><strong> Activo total promedio [$]</strong></label>
                <input id="act_total_prom" type="number" step="any" min="0" class="form-control round-form">
              
                <div id="razon_activos_totales_cont" class="col-md-12 alert alert-warning" hidden>
                <strong>
                <span>ÍNDICE DE ROTACIÓN DE ACTIVOS TOTALES = </span><span id="razon_activos_totales"></span>  
                </div><br>
                <button class="btn btn-theme" onclick="calcular_razon_activos_totales()">Calcular</button>

                </div>

                <br><br>
                <div class="form-group">

                <h4><strong>Índice de rotación de activos fijos</strong></h4><br>
                <label for="ventas_netas_raf" class="col-sm-12 col-sm-12 control-label"><strong> Ventas netas [$]</strong></label>
                <input id="ventas_netas_raf" type="number" step="any" min="0" class="form-control round-form">
                <label for="act_fijo_total_prom" class="col-sm-12 col-sm-12 control-label"><strong> Activo fijo neto promedio [$]</strong></label>
                <input id="act_fijo_total_prom" type="number" step="any" min="0" class="form-control round-form">
              
                <div id="razon_activos_fijos_cont" class="col-md-12 alert alert-warning" hidden>
                <strong>
                <span>ÍNDICE DE ROTACIÓN DE ACTIVOS FIJOS = </span><span id="razon_activos_fijos"></span>  
                </div><br>
                <button class="btn btn-theme" onclick="calcular_razon_activos_fijos()">Calcular</button>

                </div>


                <div class="form-group">

                <h4><strong>Índice de margen bruto</strong></h4><br>
                <label for="utilidad_bruta" class="col-sm-12 col-sm-12 control-label"><strong> Utilidad bruta [$]</strong></label>
                <input id="utilidad_bruta" type="number" step="any" min="0" class="form-control round-form">
                <label for="ventas_indice_mb" class="col-sm-12 col-sm-12 control-label"><strong> Ventas [$]</strong></label>
                <input id="ventas_indice_mb" type="number" step="any" min="0" class="form-control round-form">
              
                <div id="razon_margen_bruto_cont" class="col-md-12 alert alert-warning" hidden>
                <strong>
                <span>ÍNDICE DE MARGEN BRUTO = </span><span id="razon_margen_bruto"></span>  
                </div><br>
                <button class="btn btn-theme" onclick="calcular_razon_margen_bruto()">Calcular</button>

                </div>

                <div class="form-group">

                <h4><strong>Índice de margen operativo</strong></h4><br>
                <label for="utilidad_operativa" class="col-sm-12 col-sm-12 control-label"><strong> Utilidad operativa [$]</strong></label>
                <input id="utilidad_operativa" type="number" step="any" min="0" class="form-control round-form">
                <label for="ventas_indice_mo" class="col-sm-12 col-sm-12 control-label"><strong> Ventas [$]</strong></label>
                <input id="ventas_indice_mo" type="number" step="any" min="0" class="form-control round-form">
              
                <div id="razon_margen_operativo_cont" class="col-md-12 alert alert-warning" hidden>
                <strong>
                <span>ÍNDICE DE MARGEN OPERATIVO = </span><span id="razon_margen_operativo"></span>  
                </div><br>
                <button class="btn btn-theme" onclick="calcular_razon_margen_operativo()">Calcular</button>

                </div>
                </div>
                </div>
          
         
                <!-- RAZONES DE APALANCAMIENTO -->
                <div id="razones_apalancamiento" hidden>
                    <div class="servicetitle">
                    <h4>Razones de apalancamiento</h4>
                    <hr>
                </div>
               
                <p>Ingrese los montos de las razones que desea calcular.</p><br><br>
                <div style="width:50%;">
                    <div class="form-group">
                        <h4><strong>Grado de endeudamiento</strong></h4><br>
                        <label for="pasivo_total_ge" class="col-sm-12 col-sm-12 control-label"><strong> Pasivo total [$]</strong></label>
                        <input id="pasivo_total_ge" type="number" step="any" min="0" class="form-control round-form" >
                        <label for="activo_total_ge" class="col-sm-12 col-sm-12 control-label"><strong> Activo total [$]</strong></label>
                        <input id="activo_total_ge" type="number" step="any" min="0" class="form-control round-form" ><br>
                    
                        <div id="razon_endeudamiento_cont" class="col-md-12 alert alert-warning" hidden>
                        <strong>
                        <span>GRADO DE ENDEUDAMIENTO = </span><span id="razon_endeudamiento"></span>  
                    </div>
                    <button class="btn btn-theme" onclick="calcular_razon_endeudamiento()">Calcular</button>
                </div>
                <br><br>

                <div class="form-group">

                    <h4><strong>Grado de propiedad</strong></h4><br>
                    <label for="patrimonio_total_gp" class="col-sm-12 col-sm-12 control-label"><strong> Patrimonio total[$]</strong></label>
                    <input id="patrimonio_total_gp" type="number" step="any" min="0" class="form-control round-form" >
                    <label for="activo_total_gp" class="col-sm-12 col-sm-12 control-label"><strong> Activo total [$]</strong></label>
                    <input id="activo_total_gp" type="number" step="any" min="0" class="form-control round-form" ><br>
                    
                    <div id="razon_propiedad_cont" class="col-md-12 alert alert-warning" hidden>
                    <strong>
                    <span>GRADO DE PROPIEDAD = </span><span id="razon_propiedad"></span>  
                    </div>
                    <button class="btn btn-theme" onclick="calcular_razon_propiedad()">Calcular</button>
                
                </div>
                <br><br>

                
                <div class="form-group">

                    <h4><strong>Grado de endeudamiento patrimonial</strong></h4><br>
                    <label for="pasivo_total_ep" class="col-sm-12 col-sm-12 control-label"><strong> Pasivo total [$]</strong></label>
                    <input id="pasivo_total_ep" type="number" step="any" min="0" class="form-control round-form" >
                    <label for="patrimonio_total_ep" class="col-sm-12 col-sm-12 control-label"><strong> Patrimonio total [$]</strong></label>
                    <input id="patrimonio_total_ep" type="number" step="any" min="0" class="form-control round-form" ><br>
                    
                    <div id="razon_endeudamiento_pat_cont" class="col-md-12 alert alert-warning" hidden>
                    <strong>
                    <span>GRADO DE ENDEUDAMIENTO PATRIMONIAL = </span><span id="razon_endeudamiento_pat"></span>  
                    </div>
                    <button class="btn btn-theme" onclick="calcular_razon_endeudamiento_pat()">Calcular</button>
                
                </div>
                <br><br>

                <div class="form-group">

                <h4><strong>Razón de cobertura de gastos financieros</strong></h4><br>
                <label for="utilidad_antes_impuestos" class="col-sm-12 col-sm-12 control-label"><strong> Utilidad antes de intereses e impuestos [$]</strong></label>
                <input id="utilidad_antes_impuestos" type="number" step="any" min="0" class="form-control round-form" >
                <label for="gastos_financieros" class="col-sm-12 col-sm-12 control-label"><strong> Gastos financieros [$]</strong></label>
                <input id="gastos_financieros" type="number" step="any" min="0" class="form-control round-form" ><br>

                <div id="razon_gastos_fin_cont" class="col-md-12 alert alert-warning" hidden>
                <strong>
                <span>GRADO DE ENDEUDAMIENTO PATRIMONIAL = </span><span id="razon_gastos_fin"></span>  
                </div>
                <button class="btn btn-theme" onclick="calcular_razon_gastos_fin()">Calcular</button>

                </div>
                <br><br>
              </div>
              
              </div>
              </div>
              </div>

              <div id="razones_rentabilidad" hidden>
                    <div class="servicetitle">
                        <h4>Razones de Rentabilidad</h4>
                        <hr>
                    </div>
               
                    <p>Ingrese los montos de las razones que desea calcular.</p><br><br>
                    <div style="width:100%;">
                        <div class="form-group" >
                            <h4><strong>Rentabilidad del Patrimnio(ROE)</strong></h4><br>
                            <label for="utilidad_neta" class="col-sm-12 col-sm-12 control-label"><strong> Utilidad Neta [$]</strong></label>
                            <input id="utilidad_neta" type="number" step="any" min="0" class="form-control round-form" >
                            <label for="patrimonio_promedio" class="col-sm-12 col-sm-12 control-label"><strong> Patrimonio Promedio [$]</strong></label>
                            <input id="patrimonio_promedio" type="number" step="any" min="0" class="form-control round-form" ><br>
                    
                            <div id="roe" class="col-md-12 alert alert-warning" hidden>
                                <strong>
                                <span>RENTABILIDAD NETA DEL PATRIMONIO = </span><span id="rentabilidad_neta_patrimonio"></span>  
                            </div>
                            <button class="btn btn-theme" onclick="calcular_roe()">Calcular</button>
                        </div>
                    </div><br><br>

                    <div class="form-group" >
                            <h4><strong>Rentabilidad por Acción</strong></h4><br>
                            <label for="utilidad_total" class="col-sm-12 col-sm-12 control-label"><strong> Utilidad Neta [$]</strong></label>
                            <input id="utilidad_total" type="number" step="any" min="0" class="form-control round-form" >
                            <label for="numero_acciones" class="col-sm-12 col-sm-12 control-label"><strong> Número de acciones [$]</strong></label>
                            <input id="numero_acciones" type="number" step="any" min="0" class="form-control round-form" ><br>
                    
                            <div id="rentabilidad_accion_cont" class="col-md-12 alert alert-warning" hidden>
                                <strong>
                                <span>RENTABILIDAD POR ACCIÓN = </span><span id="rentabilidad_accion"></span>  
                            </div>
                            <button class="btn btn-theme" onclick="calcular_rentabilidad_accion()">Calcular</button>
                        </div>
                    </div><br><br>

                    <div class="form-group" >
                            <h4><strong>Rentabilidad del Activo</strong></h4><br>
                            <label for="beneficio_neto" class="col-sm-12 col-sm-12 control-label"><strong> Utilidad Neta [$]</strong></label>
                            <input id="beneficio_neto" type="number" step="any" min="0" class="form-control round-form" >
                            <label for="activo_total_promedio" class="col-sm-12 col-sm-12 control-label"><strong>Activo Total Promedio [$]</strong></label>
                            <input id="activo_total_promedio" type="number" step="any" min="0" class="form-control round-form" ><br>
                    
                            <div id="roa_cont" class="col-md-12 alert alert-warning" hidden>
                                <strong>
                                <span>RENTABILIDAD POR ACTIVO = </span><span id="roa"></span>  
                            </div>
                            <button class="btn btn-theme" onclick="calcular_roa()">Calcular</button>
                        </div>
                    </div><br><br>

                    <div class="form-group" >
                            <h4><strong>Rentabilidad sobre Ventas</strong></h4><br>
                            <label for="ganancia_neta" class="col-sm-12 col-sm-12 control-label"><strong> Utilidad Neta [$]</strong></label>
                            <input id="ganancia_neta" type="number" step="any" min="0" class="form-control round-form" >
                            <label for="ventas_totales" class="col-sm-12 col-sm-12 control-label"><strong>Ventas Netas [$]</strong></label>
                            <input id="ventas_totales" type="number" step="any" min="0" class="form-control round-form" ><br>
                    
                            <div id="rentabilidad_ventas_cont" class="col-md-12 alert alert-warning" hidden>
                                <strong>
                                <span>RENTABILIDAD SOBRE VENTAS = </span><span id="rentabilidad_ventas"></span>  
                            </div>
                            <button class="btn btn-theme" onclick="calcular_rentabilidad_ventas()">Calcular</button>
                        </div>
                    </div><br><br>
                    <div class="form-group" >
                            <h4><strong>Rentabilidad sobre Inversión</strong></h4><br>
                            <label for="ingresos" class="col-sm-12 col-sm-12 control-label"><strong> Ingresos [$]</strong></label>
                            <input id="ingresos" type="number" step="any" min="0" class="form-control round-form" >
                            <label for="inversion" class="col-sm-12 col-sm-12 control-label"><strong>Inversión [$]</strong></label>
                            <input id="inversion" type="number" step="any" min="0" class="form-control round-form" ><br>
                    
                            <div id="roi_cont" class="col-md-12 alert alert-warning" hidden>
                                <strong>
                                <span>RENTABILIDAD SOBRE INVERSÍÓN = </span><span id="roi"></span>  
                            </div>
                            <button class="btn btn-theme" onclick="calcular_roi()">Calcular</button>
                        </div>
                    </div>
              </div>
              


<script>

//funciones de botones
function ver_razones_liquidez(){
  document.getElementById('razones_liquidez').hidden = false;
  document.getElementById('razones_actividad').hidden = true;
  document.getElementById('razones_apalancamiento').hidden = true;
  document.getElementById('razones_rentabilidad').hidden = true;
}

function ver_razones_actividad(){
  document.getElementById('razones_liquidez').hidden = true;
  document.getElementById('razones_actividad').hidden = false;
  document.getElementById('razones_apalancamiento').hidden = true;
  document.getElementById('razones_rentabilidad').hidden = true;
}

function ver_razones_apalancamiento(){
  document.getElementById('razones_liquidez').hidden = true;
  document.getElementById('razones_actividad').hidden = true;
  document.getElementById('razones_apalancamiento').hidden = false;
  document.getElementById('razones_rentabilidad').hidden = true;
}
function ver_razones_rentabilidad(){
  document.getElementById('razones_liquidez').hidden = true;
  document.getElementById('razones_actividad').hidden = true;
  document.getElementById('razones_apalancamiento').hidden = true;
  document.getElementById('razones_rentabilidad').hidden = false;
}
//////RAZONES DE LIQUIDEZ
function calcular_razon_circulante(){
    var act_cte =  parseFloat(document.getElementById('activo_corriente').value);
    var pas_cte =  parseFloat(document.getElementById('pasivo_corriente').value);
    var razon = (pas_cte==0) ? "El denominador es cero, no se puede calcular" : (act_cte/pas_cte).toFixed(2);
    document.getElementById('razon_circulante_cont').hidden = false;
    document.getElementById('razon_circulante').innerHTML = razon;
    if(isNaN(razon)){
      document.getElementById('razon_circulante').innerHTML = "Llene los campos";
    }
}

function calcular_prueba_acida(){
    var act_cte =  parseFloat(document.getElementById('activo_corriente_pa').value);
    var pas_cte =  parseFloat(document.getElementById('pasivo_corriente_pa').value);
    var inv_cte =  parseFloat(document.getElementById('inventario_pa').value);
    var razon = (pas_cte==0) ? "El denominador es cero, no se puede calcular" : ((act_cte-inv_cte)/pas_cte).toFixed(2);
    document.getElementById('prueba_acida_cont').hidden = false;
    document.getElementById('prueba_acida').innerHTML = razon;
    if(isNaN(razon)){
      document.getElementById('prueba_acida').innerHTML = "Llene los campos";
    }

}

function calcular_capital_trabajo(){
    var act_cte =  parseFloat(document.getElementById('activo_corriente_ct').value);
    var pas_cte =  parseFloat(document.getElementById('pasivo_corriente_ct').value);
    var act_tot =  parseFloat(document.getElementById('activos_totales_ct').value);
    var razon = (act_tot==0) ? "El denominador es cero, no se puede calcular" : ((act_cte-pas_cte)/act_tot).toFixed(2);
    document.getElementById('capital_trabajo_cont').hidden = false;
    document.getElementById('capital_trabajo').innerHTML = razon;
    if(isNaN(razon)){
      document.getElementById('capital_trabajo').innerHTML = "Llene los campos";
    }

}

function calcular_razon_efectivo(){
    var efectivo = parseFloat(document.getElementById('efectivo_re').value);
    var valores = parseFloat(document.getElementById('valores_corto_plazo').value);
    var pas_cte = parseFloat(document.getElementById('pasivos_corrientes_re').value);
    var razon = (pas_cte==0) ? "El denominador es cero, no se puede calcular" : ((efectivo+valores)/pas_cte).toFixed(2);
    document.getElementById('razon_efectivo_cont').hidden = false;
    document.getElementById('razon_efectivo').innerHTML = razon;
    if(isNaN(razon)){
      document.getElementById('razon_efectivo').innerHTML = "Llene los campos";
    }

}

////RAZONES DE ACTIVIDAD
function calcular_razon_inventario(){
    var ventas =  parseFloat(document.getElementById('costo_ventas').value);
    var inv_prom =  parseFloat(document.getElementById('inventario_prom').value);
    var razon = (inv_prom==0) ? "El denominador es cero, no se puede calcular" : (ventas/inv_prom).toFixed(2);
    var dias = razon * 365;
    document.getElementById('razon_inventario_cont').hidden = false;
    document.getElementById('razon_inventario').innerHTML = 'Índice: '+ razon + '<br>' + 'Días: ' + dias;
    if(isNaN(razon)){
      document.getElementById('razon_inventario').innerHTML = "Llene los campos";
    }
}

function calcular_rotacion_cobros(){
    var ventas_netas =  parseFloat(document.getElementById('ventas_rc').value);
    var prom_cuentas_cob =  parseFloat(document.getElementById('prom_cuentas_cobrar').value);
    var razon = (prom_cuentas_cob==0) ? "El denominador es cero, no se puede calcular" : (ventas_netas/prom_cuentas_cob).toFixed(2);
    var dias = razon * 365;
    document.getElementById('rotacion_cobros_cont').hidden = false;
    document.getElementById('rotacion_cobros').innerHTML = 'Índice: '+ razon + '<br>' + 'Días: ' + dias;
    if(isNaN(razon)){
      document.getElementById('rotacion_cobros').innerHTML = "Llene los campos";
    }
}

function calcular_rotacion_pagos(){
    var compras =  parseFloat(document.getElementById('compras').value);
    var prom_cuentas_pag =  parseFloat(document.getElementById('prom_cuentas_pagar').value);
    var razon = (prom_cuentas_pag==0) ? "El denominador es cero, no se puede calcular" : (compras/prom_cuentas_pag).toFixed(2);
    var dias = razon * 365;
    document.getElementById('rotacion_pagos_cont').hidden = false;
    document.getElementById('rotacion_pagos').innerHTML = 'Índice: '+ razon + '<br>' + 'Días: ' + dias;
    if(isNaN(razon)){
      document.getElementById('rotacion_pagos').innerHTML = "Llene los campos";
    }
}

function calcular_razon_activos_totales(){
    var ventas_netas =  parseFloat(document.getElementById('ventas_netas_rat').value);
    var act_total_prom =  parseFloat(document.getElementById('act_total_prom').value);
    var razon = (act_total_prom==0) ? "El denominador es cero, no se puede calcular" : (ventas_netas/act_total_prom).toFixed(2);
    document.getElementById('razon_activos_totales_cont').hidden = false;
    document.getElementById('razon_activos_totales').innerHTML = razon;
    if(isNaN(razon)){
      document.getElementById('razon_activos_totales').innerHTML = "Llene los campos";
    }
}


function calcular_razon_activos_fijos(){
    var ventas_netas =  parseFloat(document.getElementById('ventas_netas_raf').value);
    var act_fijo_total_prom =  parseFloat(document.getElementById('act_fijo_total_prom').value);
    var razon = (act_fijo_total_prom==0) ? "El denominador es cero, no se puede calcular" : (ventas_netas/act_fijo_total_prom).toFixed(2);
    document.getElementById('razon_activos_fijos_cont').hidden = false;
    document.getElementById('razon_activos_fijos').innerHTML = razon;
    if(isNaN(razon)){
      document.getElementById('razon_activos_fijos').innerHTML = "Llene los campos";
    }
}

function calcular_razon_margen_bruto(){
    var utilidad_bruta =  parseFloat(document.getElementById('utilidad_bruta').value);
    var ventas =  parseFloat(document.getElementById('ventas_indice_mb').value);
    var razon = (ventas==0) ? "El denominador es cero, no se puede calcular" : (utilidad_bruta/ventas).toFixed(2);
    document.getElementById('razon_margen_bruto_cont').hidden = false;
    document.getElementById('razon_margen_bruto').innerHTML = razon;
    if(isNaN(razon)){
      document.getElementById('razon_margen_bruto').innerHTML = "Llene los campos";
    }
}

function calcular_razon_margen_operativo(){
    var utilidad_operativa =  parseFloat(document.getElementById('utilidad_operativa').value);
    var ventas =  parseFloat(document.getElementById('ventas_indice_mo').value);
    var razon = (ventas==0) ? "El denominador es cero, no se puede calcular" : (utilidad_operativa/ventas).toFixed(2);
    document.getElementById('razon_margen_operativo_cont').hidden = false;
    document.getElementById('razon_margen_operativo').innerHTML = razon;
    if(isNaN(razon)){
      document.getElementById('razon_margen_operativo').innerHTML = "Llene los campos";
    }
}

/////RAZONES DE APALANCAMIENTO

function calcular_razon_endeudamiento(){
    var pasivo_total =  parseFloat(document.getElementById('pasivo_total_ge').value);
    var activo_total =  parseFloat(document.getElementById('activo_total_ge').value);
    var razon = (activo_total==0) ? "El denominador es cero, no se puede calcular" : (pasivo_total/activo_total).toFixed(2);
    document.getElementById('razon_endeudamiento_cont').hidden = false;
    document.getElementById('razon_endeudamiento').innerHTML = razon;
    if(isNaN(razon)){
      document.getElementById('razon_endeudamiento').innerHTML = "Llene los campos";
    }
}

function calcular_razon_propiedad(){
    var patrimonio_total =  parseFloat(document.getElementById('patrimonio_total_gp').value);
    var activo_total =  parseFloat(document.getElementById('activo_total_gp').value);
    var razon = (activo_total==0) ? "El denominador es cero, no se puede calcular" : (patrimonio_total/activo_total).toFixed(2);
    document.getElementById('razon_propiedad_cont').hidden = false;
    document.getElementById('razon_propiedad').innerHTML = razon;
    if(isNaN(razon)){
      document.getElementById('razon_propiedad').innerHTML = "Llene los campos";
    }
}

function calcular_razon_endeudamiento_pat(){
    var patrimonio_total =  parseFloat(document.getElementById('patrimonio_total_ep').value);
    var pasivo_total =  parseFloat(document.getElementById('pasivo_total_ep').value);
    var razon = (patrimonio_total==0) ? "El denominador es cero, no se puede calcular" : (pasivo_total/patrimonio_total).toFixed(2);
    document.getElementById('razon_endeudamiento_pat_cont').hidden = false;
    document.getElementById('razon_endeudamiento_pat').innerHTML = razon;
    if(isNaN(razon)){
      document.getElementById('razon_endeudamiento_pat').innerHTML = "Llene los campos";
    }
}

function calcular_razon_gastos_fin(){
    var utilidad_antes_imp =  parseFloat(document.getElementById('utilidad_antes_impuestos').value);
    var gastos_financieros =  parseFloat(document.getElementById('gastos_financieros').value);
    var razon = (gastos_financieros==0) ? "El denominador es cero, no se puede calcular" : (utilidad_antes_imp/gastos_financieros).toFixed(2);
    document.getElementById('razon_gastos_fin_cont').hidden = false;
    document.getElementById('razon_gastos_fin').innerHTML = razon;
    if(isNaN(razon)){
      document.getElementById('razon_gastos_fin').innerHTML = "Llene los campos";
    }
}
function calcular_roe(){
    var utilidad_neta =  parseFloat(document.getElementById('utilidad_neta').value);
    var patrimonio_promedio =  parseFloat(document.getElementById('patrimonio_promedio').value);
    var razon = (patrimonio_promedio==0) ? "El denominador es cero, no se puede calcular" : (utilidad_neta/patrimonio_promedio).toFixed(2);
    document.getElementById('roe').hidden = false;
    document.getElementById('rentabilidad_neta_patrimonio').innerHTML = razon;
    if(isNaN(razon)){
      document.getElementById('rentabilidad_neta_patrimonio').innerHTML = "Llene los campos";
    }
}

function calcular_rentabilidad_accion(){
    var utilidad_total =  parseFloat(document.getElementById('utilidad_total').value);
    var numero_acciones =  parseFloat(document.getElementById('numero_acciones').value);
    var razon = (numero_acciones==0) ? "El denominador es cero, no se puede calcular" : (utilidad_total/numero_acciones).toFixed(2);
    document.getElementById('rentabilidad_accion_cont').hidden = false;
    document.getElementById('rentabilidad_accion').innerHTML = razon;
    if(isNaN(razon)){
      document.getElementById('rentabilidad_accion').innerHTML = "Llene los campos";
    }
}

function calcular_roa(){
    var beneficio_neto =  parseFloat(document.getElementById('beneficio_neto').value);
    var activo_total_promedio =  parseFloat(document.getElementById('activo_total_promedio').value);
    var razon = (activo_total_promedio==0) ? "El denominador es cero, no se puede calcular" : (beneficio_neto/activo_total_promedio).toFixed(2);
    document.getElementById('roa_cont').hidden = false;
    document.getElementById('roa').innerHTML = razon;
    if(isNaN(razon)){
      document.getElementById('roa').innerHTML = "Llene los campos";
    }
}

function calcular_rentabilidad_ventas(){
    var ganancia_neta =  parseFloat(document.getElementById('ganancia_neta').value);
    var ventas_totales =  parseFloat(document.getElementById('ventas_totales').value);
    var razon = (ventas_totales==0) ? "El denominador es cero, no se puede calcular" : (ganancia_neta/ventas_totales).toFixed(2);
    document.getElementById('rentabilidad_ventas_cont').hidden = false;
    document.getElementById('rentabilidad_ventas').innerHTML = razon;
    if(isNaN(razon)){
      document.getElementById('rentabilidad_ventas').innerHTML = "Llene los campos";
    }
}

function calcular_roi(){
    var ingresos =  parseFloat(document.getElementById('ingresos').value);
    var inversion =  parseFloat(document.getElementById('inversion').value);
    var razon = (inversion==0) ? "El denominador es cero, no se puede calcular" : ((ingresos-inversion)/inversion).toFixed(2);
    document.getElementById('roi_cont').hidden = false;
    document.getElementById('roi').innerHTML = razon;
    if(isNaN(razon)){
      document.getElementById('roi').innerHTML = "Llene los campos";
    }
}
</script>



@endsection
