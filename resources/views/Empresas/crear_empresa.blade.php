@extends('layouts.app')

@section('content')

<h3><i class="fa fa-angle-right"></i> Empresa</h3>

        <!-- BASIC FORM ELELEMNTS -->
        <div class="row mt">
          <div class="col-lg-12">
            <div class="form-panel" style="padding:3%; font-size:15px;">
              <h4 class="mb"><i class="fa fa-angle-right"></i> Registro</h4>
              <br>
              <form class="form-horizontal style-form" method="POST" action="{{route('guardar_empresa')}}" style="padding-left:10%;">
               @csrf

                <div class="form-group">
                  <label class="col-sm-4 col-sm-2 control-label">Nombre </label>
                  <div class="col-sm-8">
                    <input type="text" class="form-control round-form" name="nombre_empresa" value="{{old('nombre_empresa')}}">
                    @foreach ($errors->get('nombre_empresa') as $mensaje)
                      <small style="color:#B42020;">{{ $mensaje }}</small>
                    @endforeach
                  </div>
                </div>

                <div class="form-group">
                  <label class="col-sm-4 col-sm-2 control-label">Descripción </label>
                  <div class="col-sm-8">
                    <input type="text" class="form-control round-form" name="descripcion" value="{{old('descripcion')}}">
                    @foreach ($errors->get('descripcion') as $mensaje)
                      <small style="color:#B42020;">{{ $mensaje }}</small>
                    @endforeach
                  </div>
                </div>

                <div class="form-group">
                  <label class="col-sm-4 col-sm-2 control-label">Tipo </label>
                  <div class="col-sm-8">
                  <select name="tipo_id" class="form-control round-form">
                    <option value="{{old('tipo_id')}}">--Seleccione el tipo de empresa--</option>
                    @foreach($tipos as $tipo)
                      <option value="{{$tipo->id}}">{{$tipo->tipo}}</option>
                    @endforeach
                  </select>
                  @foreach ($errors->get('tipo_id') as $mensaje)
                      <small style="color:#B42020;">{{ $mensaje }}</small>
                  @endforeach
                </div>
                </div>
                <br><br>
                <div class="form-group">
                    <div class="col-lg-offset-2 col-lg-10">
                      <button class="btn btn-theme">Guardar</button>
                      <a href="{{route('empresas')}}" class="btn btn-theme04"> Cancelar</a>
                    </div>
                </div>
                
              </form>
            </div>
          </div>
          <!-- col-lg-12-->
        </div>
        <br><br><br><br><br><br><br><br>

        @endsection