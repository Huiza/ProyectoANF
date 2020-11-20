@extends('layouts.app')

@section('content')

<h3><i class="fa fa-angle-right"></i> ESTADO DE RESULTADOS</h3>


        <!-- BASIC FORM ELELEMNTS -->
        <div class="row mt">
          <div class="col-lg-12">
            <div class="form-panel" >
            
            
            <div style="padding-left:10%; padding-top:5%; padding-bottom:3%;"> 
            <form method="post" enctype="multipart/form-data" action="{{route('guardar_detalle_estado_financiero',$estado_financiero->id_estado_financiero)}}">
                @csrf

                <input type="file" name="estado_financiero">
                <br>
                <button class="btn btn-primary">Importar Estado de Resultados</button>
            </form>
              </div>
            <div style="text-align:center;">
              <h3 class="mb">{{$estado_financiero->empresa->nombre_empresa}}</h3>
              <h4 class="mb">Registro de estado de resultados</h4>
              <h4>Del {{date('j F, Y', strtotime($estado_financiero->fecha_inicio))}} al {{date('j F, Y', strtotime($estado_financiero->fecha_final))}}</h4>
            </div>
                
              <form style="padding-left:15%; font-size:15px;" class="form-horizontal style-form" method="POST" action="{{route('guardar_detalle_estado_financiero', $estado_financiero->id_estado_financiero)}}" style="padding:2%;">
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
                                <th><h4><strong>Monto</strong></h4></th>
                               

                            </tr>
                            </thead>
                            <tbody>
                            
                            @foreach($ingresos as $cuenta)
                            <tr>
                                @if($cuenta->cuenta->nombre_cuenta == 'INGRESOS')
                                <td name=><h4><strong>{{$cuenta->cuenta->nombre_cuenta}}</strong></h4></td>
                                <td hidden><input type="text" class="form-control round-form" name="saldo[]" placeholder="Monto en $" value="0" ></td>
                            
                                @else
                                <td>{{$cuenta->cuenta->nombre_cuenta}}</td>
                                <td><input onkeyup="calcular_ingresos()" type="number" step="any" min="0" class="form-control round-form monto_ingresos" name="saldo[]" placeholder="Monto en $" required></td>
                               
                                @endif
                                <input type="text"  name="cuenta[]" value="{{ $cuenta->cuenta->nombre_cuenta }}" hidden>
                                <div><input type="text"  name="id_estado_financiero[]" value="{{ $estado_financiero->id_estado_financiero}}" hidden></div>
                            </tr>
                            @endforeach
                            </tbody>
                                <td><strong>TOTAL DE INGRESOS</strong></td>
                                <div><input type="text"  name="id_estado_financiero[]" value="{{ $estado_financiero->id_estado_financiero}}" hidden></div>
                                <input type="text"  name="cuenta[]" value="TOTAL DE INGRESOS" hidden>
                                <td><input id="total_ingresos" type="number" step="any" min="0" class="form-control round-form" name="saldo[]" placeholder="Monto en $" readonly></td>
                               

                                
                             
                                @foreach($gastos as $cuenta)
                            <tr>
                                @if($cuenta->cuenta->nombre_cuenta == 'GASTOS')
                                <td name=><h4><strong>{{$cuenta->cuenta->nombre_cuenta}}</strong></h4></td>
                                <td hidden><input type="text" class="form-control round-form" name="saldo[]" placeholder="Monto en $" value="0" ></td>
                            
                                @else
                                <td>{{$cuenta->cuenta->nombre_cuenta}}</td>
                                <td><input onkeyup="calcular_gastos()" type="number" step="any"  min="0" class="form-control round-form monto_gastos" name="saldo[]" placeholder="Monto en $" required></td>
                                @endif
                                <input type="text"  name="cuenta[]" value="{{ $cuenta->cuenta->nombre_cuenta }}" hidden>
                                <div><input type="text"  name="id_estado_financiero[]" value="{{ $estado_financiero->id_estado_financiero}}" hidden></div>
                            </tr>
                            @endforeach
                            </tbody>
                                <td><strong>TOTAL DE GASTOS</strong></td>
                                <div><input type="text"  name="id_estado_financiero[]" value="{{ $estado_financiero->id_estado_financiero}}" hidden></div>
                                <input type="text"  name="cuenta[]" value="TOTAL DE GASTOS" hidden>
                                <td><input id="total_gastos" type="number" step="any"  min="0" class="form-control round-form" name="saldo[]" placeholder="Monto en $" readonly></td>
                                
                              </tbody>

                              
                        </table>
                        
                    </div>
                 
                </div>
                
              </div>
              
                <br>
                <div class="form-group">
                    <div class="col-lg-offset-2 col-lg-10">
                      <button class="btn btn-theme">Guardar</button>
                      <a href="{{route('ver_empresa', $estado_financiero->empresa->id)}}" class="btn btn-theme04"> Cancelar</a>
                    </div>
                </div>
            </section>
          </div>
          <!-- /col-md-12-->
 
               
               </form>
            </div>
          </div>
          <!-- col-lg-12-->
        </div>

        <script>
function calcular_ingresos() {

var total = 0;
$(".monto_ingresos").each(function() {
  if (isNaN(parseFloat($(this).val()))) {
    total += 0;
  } else {
    total += parseFloat($(this).val());
  }
});
document.getElementById('total_ingresos').value = total;

}


function calcular_gastos() {

var total = 0;
$(".monto_gastos").each(function() {
  if (isNaN(parseFloat($(this).val()))) {
    total += 0;
  } else {
    total += parseFloat($(this).val());
  }
});
document.getElementById('total_gastos').value = total;
calcular_pasivo_patrimonio();
}
</script>
@endsection