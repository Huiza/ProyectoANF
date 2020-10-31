@extends('layouts.app')

@section('content')
<div class="row mt">
          <div class="col-md-12">
            <div class="content-panel" style="padding:3%;">
            <a href="{{route('crear_empresa')}}"><button type="button" class="btn btn-round btn-default"> <i class="fa fa-plus"></i> Agregar</button></a>
            <br><br>
              <table class="table table-striped table-advance table-hover" >
                <h4><i class="fa fa-angle-right"></i> Empresas registradas</h4>
                <hr>
                <thead>
                  <tr>
                    <th><i class="fa fa-bullhorn"></i> Código</th>
                    <th><i class="fa fa-bullhorn"></i> Empresa</th>
                    <th class="hidden-phone"><i class="fa fa-question-circle"></i> Descripción</th>
                    <th><i class="fa fa-bookmark"></i>Tipo</th>
                    <th></th>
                  </tr>
                </thead>
                <tbody>
                  @foreach($empresas as $empresa)
                  <tr>
                      <td>{{$empresa->codigo}}</td>
                      <td>{{$empresa->nombre_empresa}}</td>
                      <td>{{$empresa->descripcion}}</td>
                      <td>{{$empresa->tipo->tipo}}</td>
                      <td>
                        <a href="{{route('editar_empresa', $empresa->id)}}" class="btn btn-primary"><i class="fa fa-pencil"></i></a>
                      </td>
                      <td>
                        <a href="{{route('crear_catalogo', $empresa->id)}}" class="btn btn-info"><i class="fa fa-book"></i> Crear catálogo</a>
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
        <br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>
@endsection

