@extends('layouts.app')

@section('content')

<h3><i class="fa fa-angle-right"></i> ANÁLISIS HORIZONTAL</h3>
        <!-- BASIC FORM ELELEMNTS -->
        <div class="row mt">
          <div class="col-lg-12">
            <div class="form-panel" >
            <h4><i class="fa fa-angle-right"></i> Análisis</h4>
              <div class="btn-group">
              <a  href="{{route('ver_balance_general', $estado_financiero_1->id_estado_financiero)}}"><button type="button" class="btn btn-default"> Balance general</button></a>
              <a href="{{route('calcular_analisis_horizontal', $estado_financiero_1->id_estado_financiero)}}"><button type="button" class="btn btn-theme"> Análisis horizontal</button></a>
              <a href="{{route('calcular_analisis_vertical', $estado_financiero_1->id_estado_financiero)}}"><button type="button" class="btn btn-default"> Análisis vertical</button></a>
              </div>
            <div style="padding-left:10%; padding-top:5%; padding-bottom:3%;"> 
            
              
              </div>
            <div style="text-align:center;">
              <h3 class="mb">{{$estado_financiero_1->empresa->nombre_empresa}}</h3>
              <h4 class="mb">ANÁLISIS HORIZONTAL</h4>
              <h4>Del {{date('j F, Y', strtotime($estado_financiero_1->fecha_inicio))}} al {{date('j F, Y', strtotime($estado_financiero_1->fecha_final))}}</h4>
            </div>
                

              <form style="padding-left:15%; font-size:15px;" class="form-horizontal style-form" method="POST" action="{{route('guardar_detalle_estado_financiero')}}" style="padding:2%;">
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
                                <th><h4><strong>Razón</strong></h4></th>
                                <th><h4><strong>Variación absoluta</strong></h4></th>
                                <th><h4><strong>Variación relativa</strong></h4></th>
                                {{$estado_financiero_1}}
                                <br><br>
                                {{$razon_circulante}}
                                <br><br>
                                {{$prueba_acida}}
                                <br><br>

                            </tr>
                            </thead>
                            <tbody>
                            
                            </tbody>
                                
                        </table>
                        
                    </div>
                 
                </div>
                
              </div>
              
                <br>
            </section>
          </div>
          <!-- /col-md-12-->
        </div>
               
               </form>
            </div>
          </div>
          <!-- col-lg-12-->
        </div>


@endsection