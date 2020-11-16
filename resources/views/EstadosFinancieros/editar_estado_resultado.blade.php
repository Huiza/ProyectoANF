@extends('layouts.app')

@section('content')

<h3><i class="fa fa-angle-right"></i> Edición de Estado de resultados</h3>


        <!-- BASIC FORM ELELEMNTS -->
        <div class="row mt">
          <div class="col-lg-12">
            <div class="form-panel" >
            <div style="text-align:center;">
              <h3 class="mb">{{$estado_financiero->empresa->nombre_empresa}}</h3>
              <h4 class="mb">Estado de resultados</h4>
              <h4>Del {{date('j F, Y', strtotime($estado_financiero->fecha_inicio))}} al {{date('j F, Y', strtotime($estado_financiero->fecha_final))}}</h4>
            </div>
                

              <form style="padding-left:15%; font-size:15px;" class="form-horizontal style-form" method="POST" action="{{route('guardar_detalle_estado_financiero',$estado_financiero->id_estado_financiero)}}" style="padding:2%;">
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
                            
                            @foreach($balance as $cuenta)
                            <tr>
                            <td hidden><input type="text" class="form-control round-form" name="id_detalle_estados_financieros[]" placeholder="Monto en $" value="{{$cuenta->id_detalle_estados_financieros}}" ></td>  
                            <div hidden><input type="text"  name="cuenta[]" value="{{ $cuenta->cuenta}}" ></div> 
                            <div hidden><input type="text"  name="id_estado_financiero[]" value="{{ $estado_financiero->id_estado_financiero}}" ></div>
                              @if($cuenta->cuenta == 'INGRESOS' || $cuenta->cuenta == 'GASTOS')
                              <td><h3><strong>{{$cuenta->cuenta}}</strong></h3></td>
                              <td hidden><input type="text" class="form-control round-form" name="saldo[]" placeholder="Monto en $" value="0" ></td>
                              @else
                              <td><h4>{{$cuenta->cuenta}}</h4></td>
                                <td><input type="number" step="any" class="form-control round-form" name="saldo[]" placeholder="Monto en $" value="{{$cuenta->saldo}}" required></td>
                              @endif
                              
                             
                                
                            </tr>
                            @endforeach
                            </tbody>
                                
                        </table>
                        <div class="col-lg-offset-2 col-lg-10">
                      <button class="btn btn-theme">Guardar</button>
                      <a href="{{route('ver_empresa', $estado_financiero->empresa->id)}}" class="btn btn-theme04"> Cancelar</a>
                    </div>
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