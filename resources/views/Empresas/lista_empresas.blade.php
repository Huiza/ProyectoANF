@extends('layouts.app')

@section('content')
<div class="row mt">
          <div class="col-md-1s2">
            <div class="content-panel" style="padding:3%;">

            <a href="{{route('crear_empresa')}}"><button type="button" class="btn btn-round btn-default"> <i class="fa fa-plus"></i> Agregar</button></a>
            <br><br>
              <table class="table table-striped table-advance table-hover" >

              <div class="col-10">
                <form method="GET" action="{{route('buscar_empresa')}}">
                <div class="input-group">
                  <input type="text" class="form-control" name="busqueda" placeholder="Nombre de la empresa">
                  <span class="input-group-btn">
                    <button type="submit" class="btn btn-primary"> <i class="fa fa-search"></i> </button>
                  </span>
                </div>       
                </form>
              </div>

                <br><br>
                <h4><i class="fa fa-angle-right"></i> Empresas registradas</h4>
                <hr>
                <thead>
                  <tr>
                    <!--th><i class="fa fa-code-fork"></i> Código</th-->
                    <th><i class="fa fa-building-o"></i> Empresa</th>
                    <th class="hidden-phone"><i class="fa fa-question-circle"></i> Descripción</th>
                    <th><i class="fa fa-bookmark"></i> Tipo</th>
                    <th></th>
                  </tr>
                </thead>
                <tbody>
                  @foreach($empresas as $empresa)
                  <tr>
                      <td>{{$empresa->nombre_empresa}}</td>
                      <td>{{$empresa->descripcion}}</td>
                      <td>{{$empresa->tipo->tipo}}</td>
                      
                      <td>
                        <a href="{{route('ver_empresa', $empresa->id)}}" class="btn btn-info"><i class="fa fa-indent"></i> Consultar</a>
                      </td>
                      <td>
                        <a href="{{route('editar_empresa', $empresa->id)}}" class="btn btn-default"><i class="fa fa-pencil"></i> </a>
                      </td>
                      <td>
                      <form method="POST" id="formulario{{$empresa->id}}" action="{{route('eliminar_empresa', $empresa->id)}}" >
                          @csrf
                          @method('DELETE')
                          <button type="button" onClick="confirmar({{$empresa->id}})" class="btn btn-danger notika-btn-danger"><span class="glyphicon glyphicon-trash"></span> </button>
                      </form>
                      </td>
                      
                      
                  </tr>
                  @endforeach
                </tbody>
              </table>
            </div>
            <!-- /content-panel -->
          </div>
          <!-- /col-md-12 -->
        </div>

@endsection

