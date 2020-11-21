@extends('layouts.app')

@section('content')

<h3><i class="fa fa-angle-right"></i> Edición de Estado de resultados</h3>


        <!-- BASIC FORM ELELEMNTS -->
        <div class="row mt">
          <div class="col-lg-12">
            <div class="form-panel" >
            <div style="text-align:center;">
            <br><br>
              <h3 class="mb">{{$estado_actualizar->empresa->nombre_empresa}}</h3>
              <h4 class="mb">Estado de resultados</h4>
              <h4>Del {{date('j F, Y', strtotime($estado_actualizar->fecha_inicio))}} al {{date('j F, Y', strtotime($estado_actualizar->fecha_final))}}</h4>
            </div>
                

              <form style="padding-left:15%; font-size:15px;" class="form-horizontal style-form" method="POST" action="{{route('actualizar_estado_financiero',$estado_actualizar->id_estado_financiero)}}" style="padding:2%;">
              @method('PUT')
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
                           
                            </tr>
                            <br><br>
                            
                            </thead>
                            <tbody>
                            
                            @foreach($ingresos as $cuenta)
                            <tr>
                                @if($cuenta->cuenta == 'INGRESOS')
                                <td><h4><strong>{{$cuenta->cuenta}}</strong></h4></td>
                                <td hidden><input id="monto" type="text" class="form-control round-form" name="saldo[]" placeholder="Monto en $" value="0" ></td>
                          
                                @elseif($cuenta->cuenta == 'TOTAL DE INGRESOS')
                                <td><h5><strong>{{$cuenta->cuenta}}</strong></h5></td>
                                <td><input id="total_ingresos"  type="number" step="any"  class=" item form-control round-form" name="saldo[]" placeholder="Monto en $"  value="{{$cuenta->saldo}}" readonly></td>
                                @else
                                <td>{{$cuenta->cuenta}}</td>
                                <td><input onkeyup="calcular_ingreso()" type="number" step="any" class=" item form-control round-form monto_ingreso" name="saldo[]" placeholder="Monto en $" value="{{$cuenta->saldo}}" required></td>
                                @endif
                                <input type="text"  name="cuenta[]" value="{{ $cuenta->cuenta }}" hidden>
                                <div><input type="text"  name="id_estado_financiero[]" value="{{ $estado_actualizar->id_estado_financiero}}" hidden></div>
                            
                            </tr>

                            @endforeach

                            @foreach($gastos as $cuenta)
                            <tr>
                                @if($cuenta->cuenta == 'GASTOS')
                                <td><h4><strong>{{$cuenta->cuenta}}</strong></h4></td>
                                <td hidden><input id="monto" type="text" class="form-control round-form" name="saldo[]" placeholder="Monto en $" value="0" ></td>
                          
                                @elseif($cuenta->cuenta == 'TOTAL DE GASTOS')
                                <td><h5><strong>{{$cuenta->cuenta}}</strong></h5></td>
                                <td><input id="total_gastos"  type="number" step="any"  class=" item form-control round-form" name="saldo[]" placeholder="Monto en $"  value="{{$cuenta->saldo}}" readonly></td>
                                @else
                                <td>{{$cuenta->cuenta}}</td>
                                <td><input onkeyup="calcular_gasto()" type="number" step="any" class=" item form-control round-form monto_gasto" name="saldo[]" placeholder="Monto en $" value="{{$cuenta->saldo}}" required></td>
                                @endif
                                <input type="text"  name="cuenta[]" value="{{ $cuenta->cuenta }}" hidden>
                                <div><input type="text"  name="id_estado_financiero[]" value="{{ $estado_actualizar->id_estado_financiero}}" hidden></div>
                            
                            </tr>

                            @endforeach
                            </tbody>
                            </tbody>
                                
                        </table>
                        <div class="col-lg-offset-2 col-lg-10">
                      <button class="btn btn-theme">Guardar</button>
                      <a href="{{route('ver_empresa', $estado_actualizar->empresa->id)}}" class="btn btn-theme04"> Cancelar</a>
                    </div>
                    </div>
                 
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
        <script>
function calcular_ingreso() {

var total = 0;
$(".monto_ingreso").each(function() {
  if (isNaN(parseFloat($(this).val()))) {
    total += 0;
  } else {
    total += parseFloat($(this).val());
  }
});
document.getElementById('total_ingresos').value = total;
}


function calcular_gasto() {

var total = 0;
$(".monto_gasto").each(function() {
  if (isNaN(parseFloat($(this).val()))) {
    total += 0;
  } else {
    total += parseFloat($(this).val());
  }
});
document.getElementById('total_gastos').value = total;
}


</script>

@endsection