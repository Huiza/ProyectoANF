@extends('layouts.app')

@section('content')

<h3><i class="fa fa-angle-right"></i> Balance general</h3>

        <!-- BASIC FORM ELELEMNTS -->
        <div class="row mt">
          <div class="col-lg-12">
            <div class="form-panel" >
            <div style="padding-left:10%; padding-top:5%; padding-bottom:3%;"> 
              
              </div>
            <div style="text-align:center;">
              <h3 class="mb">{{$estado_financiero->empresa->nombre_empresa}}</h3>
              <h4 class="mb">Balance general</h4>
              <h4>Del {{$estado_financiero->fecha_inicio}} al {{$estado_financiero->fecha_final}}</h4>
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
                                <th><h4><strong>Cuenta</strong></h4></th>
                                <th><h4><strong>Monto</strong></h4></th>
                               

                            </tr>
                            </thead>
                            <tbody>
                            
                            @foreach($estado_financiero->detallesEstado as $cuenta)
                            <tr>
                                
                              @if($cuenta->cuenta == 'ACTIVO' || $cuenta->cuenta == 'PASIVO' ||$cuenta->cuenta == 'PATRIMONIO')
                              <td><h3><strong>{{$cuenta->cuenta}}</strong></h3></td>
                              
                              @else
                              <td><h4>{{$cuenta->cuenta}}</h4></td>
                              <td><h4><strong>${{$cuenta->saldo}}</strong></h4></td>
                              @endif
                             
                                
                            </tr>
                            @endforeach
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