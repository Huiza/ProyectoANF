@extends('layouts.app')

@section('content')

<h3><i class="fa fa-angle-right"></i> Balance general</h3>

        <!-- BASIC FORM ELELEMNTS -->
        <div class="row mt">
          <div class="col-lg-12">
            <div class="form-panel" >
            <div style="padding-left:10%; padding-top:5%; padding-bottom:3%;"> 
                <form method="post" enctype="multipart/form-data" action="{{route('guardar_detalle_estado_financiero',$estado_financiero->id_estado_financiero)}}">
                @csrf

                <input type="file" name="estado_financiero">
                <br>
                <button class="btn btn-primary">Importar Balance General</button>
              </form>
              </div>
            <div style="text-align:center;">
              <h3 class="mb">{{$empresa->nombre_empresa}}</h3>
              <h4 class="mb">Balance general</h4>
              <h4>Del {{$estado_financiero->fecha_inicio}} al {{$estado_financiero->fecha_final}}</h4>
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
                                <th><h4><strong>Código</strong></h4></th>
                               

                            </tr>
                            </thead>
                            <tbody>
                            
                            @foreach($activos as $cuenta)
                            <tr>
                                @if($cuenta->cuenta->nombre_cuenta == 'ACTIVO')
                                <td name=><h4><strong>{{$cuenta->cuenta->nombre_cuenta}}</strong></h4></td>
                                <td hidden><input type="text" class="form-control round-form" name="saldo[]" placeholder="Monto en $" value="0" ></td>
                            
                                @else
                                <td>{{$cuenta->cuenta->nombre_cuenta}}</td>
                                <td><input type="number" step="any" class="form-control round-form" name="saldo[]" placeholder="Monto en $" required></td>
                                @endif
                                <input type="text"  name="cuenta[]" value="{{ $cuenta->cuenta->nombre_cuenta }}" hidden>
                                <div><input type="text"  name="id_estado_financiero[]" value="{{ $estado_financiero->id_estado_financiero}}" hidden></div>
                            </tr>
                            @endforeach
                            </tbody>
                                <td><strong>TOTAL DE ACTIVOS</strong></td>
                                <div><input type="text"  name="id_estado_financiero[]" value="{{ $estado_financiero->id_estado_financiero}}" hidden></div>
                                <input type="text"  name="cuenta[]" value="TOTAL DE ACTIVOS" hidden>
                                <td><input type="number" step="any" class="form-control round-form" name="saldo[]" placeholder="Monto en $" required></td>

                                
                            @foreach($pasivos as $cuenta)
                            <tr>
                                @if($cuenta->cuenta->nombre_cuenta == 'PASIVO')
                                <td name=><h4><strong>{{$cuenta->cuenta->nombre_cuenta}}</strong></h4></td>
                                <td hidden><input type="text" class="form-control round-form" name="saldo[]" placeholder="Monto en $" value="0" ></td>
                            
                                @else
                                <td>{{$cuenta->cuenta->nombre_cuenta}}</td>
                                <td><input type="number" step="any" class="form-control round-form" name="saldo[]" placeholder="Monto en $" required></td>
                                @endif
                                <input type="text"  name="cuenta[]" value="{{ $cuenta->cuenta->nombre_cuenta }}" hidden>
                                <div><input type="text"  name="id_estado_financiero[]" value="{{ $estado_financiero->id_estado_financiero}}" hidden></div>
                            </tr>
                            @endforeach
                            </tbody>
                                <td><strong>TOTAL DE PASIVOS</strong></td>
                                <div><input type="text"  name="id_estado_financiero[]" value="{{ $estado_financiero->id_estado_financiero}}" hidden></div>
                                <input type="text"  name="cuenta[]" value="TOTAL DE PASIVOS" hidden>
                                <td><input type="number" step="any" class="form-control round-form" name="saldo[]" placeholder="Monto en $" required></td>

                                
                            @foreach($patrimonio as $cuenta)
                            <tr>
                                @if($cuenta->cuenta->nombre_cuenta == 'PATRIMONIO')
                                <td name=><h4><strong>{{$cuenta->cuenta->nombre_cuenta}}</strong></h4></td>
                                <td hidden><input type="text" class="form-control round-form" name="saldo[]" placeholder="Monto en $" value="0" ></td>
                            
                                @else
                                <td>{{$cuenta->cuenta->nombre_cuenta}}</td>
                                <td><input type="number" step="any" class="form-control round-form" name="saldo[]" placeholder="Monto en $" required></td>
                                @endif
                                <input type="text"  name="cuenta[]" value="{{ $cuenta->cuenta->nombre_cuenta }}" hidden>
                                <div><input type="text"  name="id_estado_financiero[]" value="{{ $estado_financiero->id_estado_financiero}}" hidden></div>
                            </tr>
                            @endforeach
                            </tbody>
                                <td><strong>TOTAL DE PATRIMONIO</strong></td>
                                <div><input type="text"  name="id_estado_financiero[]" value="{{ $estado_financiero->id_estado_financiero}}" hidden></div>
                                <input type="text"  name="cuenta[]" value="TOTAL PATRIMONIO" hidden>
                                <td><input type="number" step="any" class="form-control round-form" name="saldo[]" placeholder="Monto en $" required></td>

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