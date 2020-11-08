@extends('layouts.app')

@section('content')

<h3><i class="fa fa-angle-right"></i> Estado financiero</h3>

        <!-- BASIC FORM ELELEMNTS -->
        <div class="row mt">
          <div class="col-lg-12">
            <div class="form-panel" style="padding:3%; font-size:15px;">
              <h4 class="mb"><i class="fa fa-angle-right"></i> {{$empresa->nombre_empresa}} : Registro de estado financiero</h4>
              <br>
              <form class="form-horizontal style-form" method="POST" action="{{route('guardar_estado_financiero')}}" style="padding-left:10%;">
               @csrf
                <div class="form-group" hidden>
                  <label class="col-sm-4 col-sm-2 control-label">Código </label>
                  <div class="col-sm-8">
                    <input type="text" class="form-control round-form" name="id_empresa" value="{{$empresa->id}}">
                  </div>
                </div>
                
                <div class="form-group">
                  <label class="col-sm-8 col-sm-2 control-label">Período</label>
                  <div class="col-md-8">
                    <div class="input-group input-large" data-date="01/01/2014">
                      <input type="text" class="form-control dpd1" name="fecha_inicio">
                      <span class="input-group-addon">A</span>
                      <input type="text" class="form-control dpd2" name="fecha_final">
                    </div>
                    <span class="help-block">Seleccione un rango</span>
                  </div>
                </div>
                
                <div class="form-group">
                  <label class="col-sm-4 col-sm-2 control-label">Tipo </label>
                  <div class="col-sm-8">
                  <select name="id_tipo_estado_financiero" class="form-control round-form">
                    <option>--Seleccione el tipo de estado--</option>
                    @foreach($tipo_estados as $tipo)
                      <option value="{{$tipo->id_tipo_estado_financiero}}">{{$tipo->tipo_estado_financiero}}</option>
                    @endforeach
                  </select>
                 
                </div>
                </div>
                <br><br>
                <div class="form-group">
                    <div class="col-lg-offset-2 col-lg-10">
                      <button class="btn btn-theme04">Cancelar</button>
                      <button class="btn btn-theme">Siguiente</button>
                    </div>
                </div>
                
              </form>
            </div>
          </div>
          <!-- col-lg-12-->
        </div>
        
        @endsection