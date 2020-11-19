@extends('layouts.app')

@section('content')
<div class="col-lg-12">
            <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
              <div class="custom-box">
                <div class="servicetitle">
                  <h4>Razones de liquidez</h4>
                  <hr>
                </div>
               
                <p>Ingrese los montos de las razones que desea calcular.</p><br><br>
                <div class="form-group">

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
              <!-- end custombox -->
            </div>





            <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
              <div class="custom-box">
                <div class="servicetitle">
                  <h4>Razones de actividad</h4>
                  <hr>
                </div>
               
                <p>Ingrese los montos de las razones que desea calcular.</p><br><br>
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
              <!-- end custombox -->
            </div>
            <!-- end col-4 -->
            
            <!-- end col-4 -->
           
            <!-- end col-4 -->
          </div>

<script>
    
function calcular_razon_circulante(){
    var act_cte =  parseFloat(document.getElementById('activo_corriente').value);
    var pas_cte =  parseFloat(document.getElementById('pasivo_corriente').value);
    var razon = (pas_cte==0) ? "El denominador es cero, no se puede calcular" : (act_cte/pas_cte).toFixed(2);
    document.getElementById('razon_circulante_cont').hidden = false;
    document.getElementById('razon_circulante').innerHTML = razon;
}

function calcular_prueba_acida(){
    var act_cte =  parseFloat(document.getElementById('activo_corriente_pa').value);
    var pas_cte =  parseFloat(document.getElementById('pasivo_corriente_pa').value);
    var inv_cte =  parseFloat(document.getElementById('inventario_pa').value);
    var razon = (pas_cte==0) ? "El denominador es cero, no se puede calcular" : ((act_cte-inv_cte)/pas_cte).toFixed(2);
    document.getElementById('prueba_acida_cont').hidden = false;
    document.getElementById('prueba_acida').innerHTML = razon;

}

function calcular_capital_trabajo(){
    var act_cte =  parseFloat(document.getElementById('activo_corriente_ct').value);
    var pas_cte =  parseFloat(document.getElementById('pasivo_corriente_ct').value);
    var act_tot =  parseFloat(document.getElementById('activos_totales_ct').value);
    var razon = (act_tot==0) ? "El denominador es cero, no se puede calcular" : ((act_cte-pas_cte)/act_tot).toFixed(2);
    document.getElementById('capital_trabajo_cont').hidden = false;
    document.getElementById('capital_trabajo').innerHTML = razon;

}

function calcular_razon_efectivo(){
    var efectivo = parseFloat(document.getElementById('efectivo_re').value);
    var valores = parseFloat(document.getElementById('valores_corto_plazo').value);
    var pas_cte = parseFloat(document.getElementById('pasivos_corrientes_re').value);
    var razon = (pas_cte==0) ? "El denominador es cero, no se puede calcular" : ((efectivo+valores)/pas_cte).toFixed(2);
    document.getElementById('razon_efectivo_cont').hidden = false;
    document.getElementById('razon_efectivo').innerHTML = razon;

}

////////////////////////////////////////////////////////////////////////////////
function calcular_razon_inventario(){
    var ventas =  parseFloat(document.getElementById('costo_ventas').value);
    var inv_prom =  parseFloat(document.getElementById('inventario_prom').value);
    var razon = (inv_prom==0) ? "El denominador es cero, no se puede calcular" : (ventas/inv_prom).toFixed(2);
    var dias = razon * 365;
    document.getElementById('razon_inventario_cont').hidden = false;
    document.getElementById('razon_inventario').innerHTML = 'Índice: '+ razon.toFixed(2) + '<br>' + 'Días: ' +dias.toFixed(2);
}

//////////
function calcular_rotacion_cobros(){
    var ventas_netas =  parseFloat(document.getElementById('ventas_rc').value);
    var prom_cuentas_cob =  parseFloat(document.getElementById('prom_cuentas_cobrar').value);
    var razon = (prom_cuentas_cob==0) ? "El denominador es cero, no se puede calcular" : (ventas_netas/prom_cuentas_cob).toFixed(2);
    var dias = razon * 365;
    document.getElementById('rotacion_cobros_cont').hidden = false;
    document.getElementById('rotacion_cobros').innerHTML = 'Índice: '+ razon + '<br>' + 'Días: ' + dias.toFixed(2);
}


</script>

@endsection
