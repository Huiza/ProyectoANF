@extends('layouts.app')

@section('content')

        <div class="row mt">
          <div class="col-lg-12">
            <div class="row content-panel">
              <div class="col-md-4 profile-text mt mb centered">
                <div class="right-divider hidden-sm hidden-xs">
                  <h4 style="color:black;">{{$empresa->codigo}}</h4>
                  <!--h6 style="color:grey;">CÓDIGO</h6-->
                  <h4 style="color:black;">{{$empresa->tipo->tipo}}</h4>
                  <h6 style="color:grey;">RUBRO</h6>
            
                </div>
              </div>
              <!-- /col-md-4 -->
              <div class="col-md-4 profile-text">
                <h3 style="color:black;">{{$empresa->nombre_empresa}}</h3>
                <h6 style="color:grey;">Empresa</h6>
                <p style="color:black;">{{$empresa->descripcion}}</p>
                <br>
                <a href="{{route('editar_empresa', $empresa->id)}}" class="btn btn-default"><i class="fa fa-pencil"></i> Editar</a>
                @if(count($catalogo)==0)
                <a href="{{route('crear_catalogo', $empresa->id)}}" class="btn btn-primary"><i class="fa fa-book"></i> Agregar catálogo</a>
                @endif
                @if(count($catalogo)>0)
                <a href="{{route('crear_estado_financiero', $empresa->id)}}" class="btn btn-theme03"><i class="fa fa-plus"></i> Agregar estado financiero</a>
                @endif
        
              </div>

            </div>
            <!-- /row -->
        </div>
      </div>

       <!-- /col-lg-12 -->
       <div class="col-lg-12 mt">
            <div class="row content-panel">
              <div class="panel-heading">
                <ul class="nav nav-tabs nav-justified">
                  <li class="active">
                    <a data-toggle="tab" href="#balancegeneral">Balance general</a>
                  </li>
                  <li>
                    <a data-toggle="tab" href="#estadoresultados" class="contact-map">Estado de resultados</a>
                  </li>
                  <li>
                    <a data-toggle="tab" href="#catalogo">Catálogo</a>
                  </li>
                </ul>
              </div>
              <!-- /panel-heading -->
              <div class="panel-body">
                <div class="tab-content">
                  <div id="balancegeneral" class="tab-pane active">
                    <div class="row">
                    <div class="col-lg-10 col-lg-offset-1">
                  @if($balances_general)
                      <table class="table table-striped table-advance table-hover" >
                      <h4><i class="fa fa-angle-right"></i> Balances generales</h4>
                      <hr>
                  <thead>
                  <tr>
                    <th><i class="fa fa-calendar"></i> Fecha de inicio</th>
                    <th><i class="fa fa-calendar"></i> Fecha de fin</th>
                    
                    <th></th>
                  </tr>
                </thead>
                <tbody>
                  @foreach($balances_general as $bg)
                  <tr>
                      <td>{{date('j F, Y', strtotime($bg->fecha_inicio))}}</td>
                      <td>{{date('j F, Y', strtotime($bg->fecha_final))}}</td>
                      <td>
                        <a href="{{route('ver_balance_general', $bg->id_estado_financiero)}}" class="btn btn-info"><i class="fa fa-indent"></i> Consultar</a>
                      </td>
                      <td>
                        <a href="{{route('calcular_ratios_financieros', $bg->id_estado_financiero)}}" class="btn btn-warning"><i class="fa fa-bar-chart-o"></i> Razones financieras</a>
                      </td>
                      <td>
                        <a href="{{route('editar_estado_financiero', $bg->id_estado_financiero)}}" class="btn btn-default"><i class="fa fa-pencil"></i> </a>
                      </td>
                     
                      <td>
                        <form action="{{ route('eliminar_estado_financiero', $bg->id_estado_financiero)}}" method="post">
                          @method('DELETE')
                          @csrf
                          <input class="btn btn-danger" type="submit" value=""><i class="fa fa-pencil"></i>
                       </form>
                      </td>
                  </tr>
                  @endforeach
                </tbody>
              </table>
              @else
              <p> <strong> No se han registrado balances generales para {{$empresa->nombre_empresa}}</strong></p>
              @endif
                      </div>
                    
                      <!-- /col-md-6 -->
                    </div>
                    <!-- /OVERVIEW -->
                  </div>
                  <!-- /tab-pane -->
                  <div id="estadoresultados" class="tab-pane">
                  <div class="row">
                  <div class="col-lg-10 col-lg-offset-1">
                  @if($estados_resultados)
                      <table class="table table-striped table-advance table-hover" >
                      <h4><i class="fa fa-angle-right"></i> Estados de resultados</h4>
                      <hr>
                  <thead>
                  <tr>
                    <th><i class="fa fa-calendar"></i> Fecha de inicio</th>
                    <th><i class="fa fa-calendar"></i> Fecha de fin</th>
                    
                    <th></th>
                  </tr>
                </thead>
                <tbody>
                  @foreach($estados_resultados as $er)
                  <tr>
                      <td>{{date('j F, Y', strtotime($er->fecha_inicio))}}</td>
                      <td>{{date('j F, Y', strtotime($er->fecha_final))}}</td>
                      <td>
                        <a href="{{route('ver_estado_resultado', $er->id_estado_financiero)}}" class="btn btn-info"><i class="fa fa-indent"></i> Consultar</a>
                      </td>
                      <td>
                        <a href="{{route('editar_estado_financiero', $er->id_estado_financiero)}}" class="btn btn-default"><i class="fa fa-pencil"></i> </a>
                      </td>
                      <td>
                      <form method="POST" id="formulario{{$er->id_estado_financiero}}" action="{{route('eliminar_estado_financiero', $er->id_estado_financiero)}}" >
                          @csrf
                          @method('DELETE')
                          <button type="button" onClick="confirmar({{$er->id_estado_financiero}})" class="btn btn-danger notika-btn-danger"><span class="glyphicon glyphicon-trash"></span> </button>
                      </form>
                      </td>
                  </tr>
                  @endforeach
                </tbody>
              </table>
              @else
              <p> <strong> No se han registrado estados de resultado para {{$empresa->nombre_empresa}}</strong></p>
              @endif
                      </div>
                    
                      <!-- /col-md-6 -->
                    </div>
                    <!-- /row -->
                  </div>
                  <!-- /tab-pane -->
                  <div id="catalogo" class="tab-pane">
                    <div class="row">
                    <div class="col-lg-10 col-lg-offset-1">
                        <h4>Catálogo de cuentas</h4>
                        @if(count($catalogo)>0)
                        <table class="table table-hover">
                            <hr>
                            <thead>
                            <tr>
                                <th><h4><strong>Código de cuenta</strong></h4></th>
                                <th><h4><strong>Cuenta</strong></h4></th>
                            </tr>
                            </thead>
                            <tbody>
                            
                            @foreach($catalogo as $cuenta)
                            <tr>
                                @if($cuenta->cuenta->nombre_cuenta == 'ACTIVO' || $cuenta->cuenta->nombre_cuenta == 'PASIVO' || $cuenta->cuenta->nombre_cuenta == 'PATRIMONIO' || $cuenta->cuenta->nombre_cuenta == 'INGRESOS' || $cuenta->cuenta->nombre_cuenta == 'GASTOS' || $cuenta->cuenta->nombre_cuenta == 'CUENTA LIQUIDADORA O DE CIERRE' || $cuenta->cuenta->nombre_cuenta == 'CUENTAS DE MEMORANDUM DEUDORAS' || $cuenta->cuenta->nombre_cuenta == 'CUENTAS DE MEMORANDUM DEUDORAS')
                                <td><h4><strong>{{$cuenta->codigo_cuenta}}</strong></h4></td>
                                <td><h4><strong>{{$cuenta->cuenta->nombre_cuenta}}</strong></h4></td>
                                @else
                                <td>{{$cuenta->codigo_cuenta}}</td>
                                <td>{{$cuenta->cuenta->nombre_cuenta}}</td>
                                @endif

                            </tr>
                            @endforeach
                            @else
                            <p>No se ha creado el cátalogo aún</p>
                            @endif
                            </tbody>
                        </table>
                      </div>
                     
                    </div>
                    <!-- /row -->
                  </div>
                  <!-- /tab-pane -->
                </div>
                <!-- /tab-content -->
              </div>
              <!-- /panel-body -->
            </div>
            <!-- /col-lg-12 -->
          </div>
          <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
<script>
function confirmar(valor){
    //ruta.concat(variable,")}}");
    swal({
      title: "¿Eliminar estado financiero?",
      text: "Esta acción es irreversible.",
      icon: "warning",
      buttons: true,
      dangerMode: true,
    })
    .then((willDelete) => {
      if (willDelete) {
        swal("Estado financiero eliminada", {
          icon: "success",
        });
        document.getElementById("formulario"+valor).submit();
      } else {
        swal("Eliminación cancelada");
      }
    });
}

</script>     
@endsection

