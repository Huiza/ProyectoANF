@extends('layouts.app')

@section('content')

<h3><i class="fa fa-angle-right"></i> Catálogo</h3>

        <!-- BASIC FORM ELELEMNTS -->
        <div class="row mt">
          <div class="col-lg-12">
            <div class="form-panel" style="padding:3%; font-size:15px;">
              <h4 class="mb"><i class="fa fa-angle-right"></i> {{$empresa->nombre_empresa}}: Registro de catálogo</h4>

              <div class="panel-body">
              <div class="col-md-12 alert alert-warning" >
                      <h5><strong> * Las cuentas seleccionadas son las cuentas mayores y las necesarias para calcular las razones financieras</strong></h5>
              </div>
              <form class="form-horizontal style-form" method="POST" action="{{route('guardar_catalogo')}}" style="padding:2%;">
               @csrf
           
              <div class="panel-body">
                <div class="task-content">

                <div class="row">
                      <div class="col-md-12">
                        <h3> </h3>

                        <div class="col-md-11">
                      
                        <table class="table table-hover">
                            <h4><i class="fa fa-angle-right"></i> Catálogo de cuentas</h4>
                            <hr>
                            <thead>
                            <tr>
                                <th><h4><strong>Cuenta</strong></h4></th>
                        
                                <th><h4><strong>Selección</strong></h4></th>

                            </tr>
                            </thead>
                            <tbody>
                          
                            
                            @foreach($cuentas as $cuenta)
                            <tr>
                                <div class="task-checkbox"><input type="text"  name="id_empresa[]" value="{{ $empresa->id }}" hidden></div>
                                @if($cuenta->nombre_cuenta == 'ACTIVO' || $cuenta->nombre_cuenta == 'PASIVO' || $cuenta->nombre_cuenta == 'PATRIMONIO' || $cuenta->nombre_cuenta == 'INGRESOS' || $cuenta->nombre_cuenta == 'GASTOS' || $cuenta->nombre_cuenta == 'ACTIVO CORRIENTE' || $cuenta->nombre_cuenta == 'ACTIVO NO CORRIENTE' || $cuenta->nombre_cuenta == 'PASIVO CORRIENTE' || $cuenta->nombre_cuenta == 'PASIVO NO CORRIENTE')
                                <td><h4><strong>{{$cuenta->nombre_cuenta}}</strong></h4></td>
                                
                                <td><input style="height: 25px; width: 25px;background-color: #eee; cursor: pointer;" type="checkbox" class="list-child" name="id_cuenta[]" value="{{ $cuenta->id_cuenta }}" checked></td>
                                @elseif($cuenta->cuenta_ratios == 1)
                                <td><strong>{{$cuenta->nombre_cuenta}}</strong></td>
                                
                                <td><input style="height: 25px; width: 25px;background-color: #eee; cursor: pointer;" type="checkbox" class="list-child" name="id_cuenta[]" value="{{ $cuenta->id_cuenta }}" checked></td>
                                @else
                                <td>{{$cuenta->nombre_cuenta}}</td>
                                
                                <td><input style="height: 25px; width: 25px;background-color: #eee; cursor: pointer;" type="checkbox" class="list-child" name="id_cuenta[]" value="{{ $cuenta->id_cuenta }}"></td>
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
                      <a href="{{route('ver_empresa', $empresa->id)}}" class="btn btn-theme04"> Cancelar</a>
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
        <br><br><br><br><br><br><br><br>

@endsection