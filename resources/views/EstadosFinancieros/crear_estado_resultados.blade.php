@extends('layouts.app')

@section('content')

<h3><i class="fa fa-angle-right"></i> Estado de resultados</h3>

        <!-- BASIC FORM ELELEMNTS -->
        <div class="row mt">
          <div class="col-lg-12">
            <div class="form-panel" style="padding-left:15%; font-size:15px;">
              <h4 class="mb"><i class="fa fa-angle-right"></i> {{$empresa->nombre_empresa}}: Registro de estado de resultados</h4>
              <form class="form-horizontal style-form" method="POST" action="{{route('guardar_detalle_estado_financiero')}}" style="padding:2%;">
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
                                <th><h4><strong>Código</strong></h4></th>
                               

                            </tr>
                            </thead>
                            <tbody>
                            
                            @foreach($cuentas as $cuenta)
                            <tr>
                                <div><input type="text"  name="id_estado_financiero[]" value="{{ $estado_financiero->id_estado_financiero}}" hidden></div>
                                <input type="text"  name="cuenta[]" value="{{ $cuenta->cuenta->nombre_cuenta }}" hidden>
                                @if($cuenta->cuenta->nombre_cuenta == 'INGRESOS' || $cuenta->cuenta->nombre_cuenta == 'GASTOS')
                                <td name=><h4><strong>{{$cuenta->cuenta->nombre_cuenta}}</strong></h4></td>
                                <td><input type="text" class="form-control round-form" name="saldo[]" placeholder="Monto en $"></td>
                                @else
                                <td>{{$cuenta->cuenta->nombre_cuenta}}</td>
                                <td><input type="text" class="form-control round-form" name="saldo[]" placeholder="Monto en $"></td>
                                @endif
                                

                            </tr>
                            @endforeach
                            </tbody>
                        </table>
                        
                    </div>
                 
                </div>
                
              </div>
              <div class="form-group">
                    <div class="col-lg-offset-2 col-lg-10">
                      <button class="btn btn-theme">Guardar</button>
                      <button class="btn btn-theme04">Cancelar</button>
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