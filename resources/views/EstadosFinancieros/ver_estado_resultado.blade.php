@extends('layouts.app')

@section('content')

<h3><i class="fa fa-angle-right"></i> ESTADO DE RESULTADOS
  <a href="{{route('ver_empresa', $estado_financiero->empresa->id)}}" style="float: right;"><button type="button" class="btn btn-default">Regresar</button></a>
</h3>


        <!-- BASIC FORM ELELEMNTS -->
        <div class="row mt">
          <div class="col-lg-12">
            <div class="form-panel" >
              
            <div class="btn-group btn-group-justified">
                <div class="btn-group">
                <a href="{{route('ver_estado_resultado', $estado_financiero->id_estado_financiero)}}"><button type="button" class="btn btn-theme"> 
                @if($estado_financiero->id_tipo_estado_financiero==1)
                Balance general
                @else
                Estado de resultados
                @endif
                </button></a>
                </div>
                <div class="btn-group">
                <a href="{{route('calcular_analisis_horizontal', $estado_financiero->id_estado_financiero)}}"><button type="button" class="btn btn-default"> Análisis horizontal</button></a>
                </div>
                <div class="btn-group">
                <a href="{{route('calcular_analisis_vertical', $estado_financiero->id_estado_financiero)}}"><button type="button" class="btn btn-default"> Análisis vertical</button></a>
                </div>

              </div>
            
              @if(!$mensaje)
              <div style="padding-left:75%; padding-top:5%; padding-bottom:3%;"> 
                <div class="btn-group">
                  <a href="{{route('reporte_estado_resultados', $estado_financiero->id_estado_financiero)}}"><button type="button" class="btn btn-danger"> <i class="fa fa-download"></i> Descargar PDF</button></a>
                </div>
              </div>
              @endif
            <div style="text-align:center;">
              <h3 class="mb">{{$estado_financiero->empresa->nombre_empresa}}</h3>
              <h4 class="mb">Estado de resultados</h4>
              <h4>Del {{date('j F, Y', strtotime($estado_financiero->fecha_inicio))}} al {{date('j F, Y', strtotime($estado_financiero->fecha_final))}}</h4>
            </div>
                
            @if($mensaje)
              <div class="panel-body">
              <div class="col-md-12 alert alert-warning" style="text-align:center;">
                      <h5><strong>{{$mensaje}}</strong></h5>
              </div>
              
              @else

              <div style="padding-left:15%; font-size:15px;" class="form-horizontal style-form" method="POST" action="{{route('guardar_detalle_estado_financiero',$estado_financiero->id_estado_financiero)}}" style="padding:2%;">
               @csrf
           
              <div class="panel-body">
                <div class="task-content">

                <div class="row">
                      <div class="col-md-12">
                        <h3> </h3>

                        <div class="col-md-10">
                      
                        <table class="table table-hover">
                           
                            <hr>
                            <thead>
                            <tr>
                                <th><h4><strong>Cuenta</strong></h4></th>
                                <th><h4><strong>Monto</strong></h4></th>
                               

                            </tr>
                            </thead>
                            <tbody>
                            
                            @foreach($estado_financiero->detallesEstado as $cuenta)
                            <tr>
                                
                              @if($cuenta->cuenta == 'INGRESOS' || $cuenta->cuenta == 'GASTOS')
                              <td><h3><strong>{{$cuenta->cuenta}}</strong></h3></td>
                              @elseif($cuenta->cuenta == 'TOTAL DE INGRESOS' || $cuenta->cuenta == 'TOTAL DE GASTOS')
                              <td><h3><strong>{{$cuenta->cuenta}}</strong></h3></td>
                              <td><h3><strong>${{ number_format($cuenta->saldo, 2)}}</strong></h3></td>
                              @else
                              <td><h4>{{$cuenta->cuenta}}</h4></td>
                              <td><h4><strong>${{ number_format($cuenta->saldo, 2)}}</strong></h4></td>
                              @endif
                             
                                
                            </tr>
                            @endforeach
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
          </div>
          <!-- col-lg-12-->
        </div>


@endsection