@extends('layouts.app')

@section('content')



<h3><i class="fa fa-angle-right"></i> ANÁLISIS VERTICAL
  <a href="{{route('ver_empresa', $estado_financiero->empresa->id)}}" style="float: right;"><button type="button" class="btn btn-default">Regresar</button></a>
</h3>
        <!-- BASIC FORM ELELEMNTS -->
        <div class="row mt">
          <div class="col-lg-12">
            <div class="form-panel" >
            
                       
            <div class="btn-group btn-group-justified">
                <div class="btn-group">
                <a href="{{route('ver_balance_general', $estado_financiero->id_estado_financiero)}}"><button type="button" class="btn btn-default"> 
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
                <a href="{{route('calcular_analisis_vertical', $estado_financiero->id_estado_financiero)}}"><button type="button" class="btn btn-theme"> Análisis vertical</button></a>
                </div>
                
              </div>
            
            <div style="padding-left:10%; padding-top:5%; padding-bottom:3%;"> 
              
              </div>
            <div style="text-align:center;">
              <h3 class="mb">{{$estado_financiero->empresa->nombre_empresa}}</h3>
              <h4 class="mb">ANÁLISIS VERTICAL</h4>
              <h4>Del {{date('j F, Y', strtotime($estado_financiero->fecha_inicio))}} al {{date('j F, Y', strtotime($estado_financiero->fecha_final))}}</h4>
            </div>

            @if($mensaje)
              <div class="panel-body">
              <div class="col-md-12 alert alert-warning" style="text-align:center;">
                      <h5><strong>{{$mensaje}}</strong></h5>
              </div>
            @else
    
              <div class="panel-body" style="padding-left:15%; font-size:15px;">
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
                                <th><h4><strong>Análisis vertical</strong></h4></th>


                            </tr>
                            </thead>
                            <tbody>

                            @for($i=0;$i<count($balance);$i++)
                            <tr>

                              @if($balance[$i]->cuenta == 'ACTIVO' || $balance[$i]->cuenta == 'PASIVO' ||$balance[$i]->cuenta == 'PATRIMONIO' ||$balance[$i]->cuenta == 'INGRESOS' ||$balance[$i]->cuenta == 'GASTOS')
                              <td><h3><strong>{{$balance[$i]->cuenta}}</strong></h3></td>

                              @else
                              <td><h4>{{$balance[$i]->cuenta}}</h4></td>
                              <td><h4><strong>${{$balance[$i]->saldo}}</strong></h4></td>
                              <td><h4><strong>{{$porcentaje_vertical[$i]}} %</strong></h4></td>
                              
                              @endif


                            </tr>
                            @endfor
                            
                            </tbody>
                                
                        </table>

                        <!-- Modal-->
                        <div class="centered">
                        <a href="{{route('ver_graficos_analisis_vertical', $estado_financiero->id_estado_financiero)}}"><button type="button" class="btn btn-theme02"> Ver gráficos</button></a>
                        </div>
                      
                     @endif
                    </div>
                 
                </div>
                
              </div>
            
              
           
                <br>
            </section>
          </div>
          <!-- /col-md-12-->
        </div>
        
                              
         
            </div>
          </div>
          <!-- col-lg-12-->



@endsection