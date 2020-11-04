@extends('layouts.app')

@section('content')

<h3><i class="fa fa-angle-right"></i> Catálogo</h3>

        <!-- BASIC FORM ELELEMNTS -->
        <div class="row mt">
          <div class="col-lg-12">
            <div class="form-panel" style="padding:3%; font-size:15px;">
              <h4 class="mb"><i class="fa fa-angle-right"></i> {{$empresa->nombre_empresa}}: Registro de catálogo</h4>
              <form class="form-horizontal style-form" method="POST" action="{{route('guardar_catalogo')}}" style="padding:2%;">
               @csrf
            <div class="row mt">
          <div class="col-md-12">
            <section class="task-panel tasks-widget">
              <div class="panel-heading">
                <div class="pull-left">
                  <h5><i class="fa fa-tasks"></i> Seleccione las cuentas a utilizar, en orden</h5>
                </div>
                <br>
              </div>
              
              
              <div class="panel-body">
                <div class="task-content">
                  <ul class="task-list">
                  @foreach($cuentas as $cuenta)
                    <li>
                      <div class="task-title">
                        <span class="task-title-sp">{{$cuenta->nombre_cuenta}}</span>
                        <input type="checkbox" class="list-child" name="id_cuenta[]" value="{{ $cuenta->id_cuenta }}">
                        <div class="pull-right hidden-phone">
                          <div class="task-checkbox">
                          <input type="text"  name="id_empresa[]" value="{{ $empresa->id }}" hidden>
                          <div class="col-sm-10" style="display:flex;">
                          <input type="text" class="form-control round-form" name="codigo_cuenta[]" placeholder="Código de cuenta">
                          
                          </div>
                          
                          </div>
                        </div>
                      </div>
                    </li>
                    @endforeach
                   
                  </ul>
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
        <br><br><br><br><br><br><br><br>

@endsection