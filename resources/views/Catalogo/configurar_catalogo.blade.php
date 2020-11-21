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
              <form class="form-horizontal style-form" method="POST" action="{{route('guardar_configuracion_catalogo', $empresa->id)}}" style="padding:2%;">
              @method('PUT')
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
                                <th><h4><strong>Código</strong></h4></th>
                                

                            </tr>
                            </thead>
                            <tbody>
                          
                            
                            @foreach($catalogo as $cuenta)
                            <tr>
                                
                                @if($cuenta->cuenta->nombre_cuenta == 'ACTIVO' || $cuenta->cuenta->nombre_cuenta == 'PASIVO' || $cuenta->cuenta->nombre_cuenta == 'PATRIMONIO' || $cuenta->cuenta->nombre_cuenta == 'INGRESOS' || $cuenta->cuenta->nombre_cuenta == 'GASTOS' || $cuenta->cuenta->nombre_cuenta == 'ACTIVO CORRIENTE' || $cuenta->cuenta->nombre_cuenta == 'ACTIVO NO CORRIENTE' || $cuenta->cuenta->nombre_cuenta == 'PASIVO CORRIENTE' || $cuenta->cuenta->nombre_cuenta == 'PASIVO NO CORRIENTE')
                                <td><h4><strong>{{$cuenta->cuenta->nombre_cuenta}}</strong></h4></td>
                                <td><input type="text" class="form-control round-form" name="codigo_cuenta[]" value="{{old('codigo_cuenta')}}"></td>
                                
                                @else
                                <td>{{$cuenta->cuenta->nombre_cuenta}}</td>
                                
                                <td><input type="text" class="form-control round-form" name="codigo_cuenta[]" value="{{old('codigo_cuenta')}}" required></td>
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