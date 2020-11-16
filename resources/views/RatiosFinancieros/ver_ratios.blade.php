@extends('layouts.app')

@section('content')


<h3><i class="fa fa-angle-right"></i> RAZONES FINANCIERAS</h3>
        <!-- BASIC FORM ELELEMNTS -->
        <div class="row mt">
          <div class="col-lg-12">
            <div class="form-panel" >
            <div class="btn-group btn-group-justified">
                <div class="btn-group">
                <a href="{{route('calcular_ratios_financieros', $estado_financiero_1->id_estado_financiero)}}"><button type="button" class="btn btn-theme"> Calcular razones financieras</button></a>
                </div>
                <div class="btn-group">
                <a href="{{route('comparar_ratios_financieros', $estado_financiero_1->id_estado_financiero)}}"><button type="button" class="btn btn-default"> Comparación razones financieras</button></a>
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
                            <tr><td><h4><strong>Razones de liquidez</strong></h4></td></tr>
                            @foreach($razones_liquidez as $razon)     
                            <tr>
                              <td>{{$razon->nombre_ratio}}</td>
                              <td><strong>{{$razon->calculo_ratio}}</strong></td>
                            </tr>
                            @endforeach
                 

                           <tr><td><h4><strong>Razones de actividad</strong></h4></td></tr>
                            @foreach($razones_actividad as $razon)     
                            <tr>
                              <td>{{$razon->nombre_ratio}}</td>
                              <td><strong>{{$razon->calculo_ratio}}</strong></td>
                            </tr>
                            @endforeach

                            <tr><td><h4><strong>Razones de apalancamiento</strong></h4></td></tr>
                            @foreach($razones_apalancamiento as $razon)     
                            <tr>
                              <td>{{$razon->nombre_ratio}}</td>
                              <td><strong>{{$razon->calculo_ratio}}</strong></td>
                            </tr>
                            @endforeach

                            <tr><td><h4><strong>Razones de rentabilidad</strong></h4></td></tr>
                            @foreach($razones_rentabilidad as $razon)     
                            <tr>
                              <td>{{$razon->nombre_ratio}}</td>
                              <td><strong>{{$razon->calculo_ratio}}</strong></td>
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
          <!-- col-lg-12-->
        </div>


@endsection