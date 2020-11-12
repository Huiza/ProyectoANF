@extends('layouts.app')

@section('content')


<h3><i class="fa fa-angle-right"></i> ANÁLISIS HORIZONTAL</h3>
        <!-- BASIC FORM ELELEMNTS -->
        <div class="row mt">
          <div class="col-lg-12">
            <div class="form-panel" >
                     
            <div class="btn-group btn-group-justified">
                <div class="btn-group">
                <a href="{{route('ver_balance_general', $estado_financiero_1->id_estado_financiero)}}"><button type="button" class="btn btn-default"> Balance general</button></a>
                </div>
                <div class="btn-group">
                <a href="{{route('calcular_analisis_horizontal', $estado_financiero_1->id_estado_financiero)}}"><button type="button" class="btn btn-default"> Análisis horizontal</button></a>
                </div>
                <div class="btn-group">
                <a href="{{route('calcular_analisis_vertical', $estado_financiero_1->id_estado_financiero)}}"><button type="button" class="btn btn-default"> Análisis vertical</button></a>
                </div>
                <div class="btn-group">
                <a href="{{route('calcular_ratios_financieros', $estado_financiero_1->id_estado_financiero)}}"><button type="button" class="btn btn-theme"> Razones financieras</button></a>
                </div>
              </div>
            
            <div style="text-align:center; padding-top:5%; padding-bottom:3%;">
              <h3 class="mb">{{$estado_financiero_1->empresa->nombre_empresa}}</h3>
              <h4 class="mb">RAZONES FINANCIERAS</h4>
              <h4>Del {{date('j F, Y', strtotime($estado_financiero_1->fecha_inicio))}} al {{date('j F, Y', strtotime($estado_financiero_1->fecha_final))}}</h4>
            </div>

              @if($mensaje)
              <div class="panel-body">
              <div class="col-md-12 alert alert-warning" style="text-align:center;">
                      <h5><strong>{{$mensaje}}</strong></h5>
                      </div>
              @else
              
                <div class="task-content" style="padding-left:15%; font-size:15px;" >
              
            
                <div class="row">
                      <div class="col-md-12">
                      
                        <div class="col-md-10">
                      
                        <table class="table table-hover">
                           
                            <hr>
                          
                            <tbody>
                                
                                <tr>
                                <td><h3><strong>Razones de liquidez</strong></h3></td>
                                </tr>
                                <tr>
                                  <td>Razón de circulante / liquidez corriente</td>
                                  <td><strong>{{$razon_circulante}}</strong></td>
                                </tr>
                                <tr>
                                  <td>Prueba ácida / razón rápida</td>
                                  <td><strong>{{$prueba_acida}}</strong></td>
                                </tr>
                                <tr>
                                  <td>Razón de capital de trabajo</td>
                                  <td><strong>{{$razon_capital_trabajo}}</strong></td>
                                </tr>
                                <tr>
                                  <td>Razón de efectivo</td>
                                  <td><strong>{{$razon_efectivo}}</strong></td>
                                </tr>

                      
                                <tr>
                                <td><h3><strong>Razones de actividad</strong></h3></td>
                                </tr>
                                <tr>
                                  <td>Razón de rotación de inventario</td>
                                  <td><strong>{{$razon_rotacion_inventario}}</strong></td>
                                </tr>
                                <tr>
                                  <td>Razón de rotación de inventario (en días)</td>
                                  <td><strong>{{$dias_rotacion_inventario}}</strong></td>
                                </tr>
                                <tr>
                                  <td>Razón de rotación de cuentas por cobrar</td>
                                  <td><strong>{{$razon_rotacion_cuentas_cobrar}}</strong></td>
                                </tr>
                                <tr>
                                  <td>Razón de período medio de cobranza</td>
                                  <td><strong>{{$razon_periodo_medio_cobranza}}</strong></td>
                                </tr>
                                <tr>
                                  <td>Razón de rotación de cuentas por pagar</td>
                                  <td><strong>{{$razon_rotacion_cuentas_pagar}}</strong></td>
                                </tr>
                                <tr>
                                  <td>Período medio de pago</td>
                                  <td><strong>{{$razon_periodo_medio_pago}}</strong></td>
                                </tr>
                                <tr>
                                  <td>Índice de rotación de activos totales</td>
                                  <td><strong>{{$indice_rotacion_activo_total}}</strong></td>
                                </tr>
                                <tr>
                                  <td>Índice de rotación de activos fijos</td>
                                  <td><strong>{{$indice_rotacion_activo_fijo}}</strong></td>
                                </tr>
                                <tr>
                                  <td>Índice de margen bruto</td>
                                  <td><strong>{{$indice_margen_bruto}}</strong></td>
                                </tr>
                                <tr>
                                  <td>Índice de margen operativo</td>
                                  <td><strong>{{$indice_margen_operativo}}</strong></td>
                                </tr>
                                <tr>
                                <td><h3><strong>Razones de apalancamiento</strong></h3></td>
                                </tr>
                                <tr>
                                  <td>Grado de endeudamiento</td>
                                  <td><strong>{{$grado_endeudamiento}}</strong></td>
                                </tr>
                                <tr>
                                  <td>Grado de propiedad</td>
                                  <td><strong>{{$grado_propiedad}}</strong></td>
                                </tr>
                                <tr>
                                  <td>Razón de endeudamiento patrimonial</td>
                                  <td><strong>{{$razon_endeudamiento_patrimonial}}</strong></td>
                                </tr>
                                <tr>
                                  <td>Razón de cobertura de gastos financieros</td>
                                  <td><strong>{{$razon_cobertura_gastos_financieros}}</strong></td>
                                </tr>
                                  
                            </tbody>
                                
                        </table>
                      
                    </div>
                  
                </div>
               
              </div>
             @endif
                <br>
            </section>
          </div>
          <!-- /col-md-12-->
        </div>
  
            </div>
          </div>
          <!-- col-lg-12-->
        </div>


@endsection