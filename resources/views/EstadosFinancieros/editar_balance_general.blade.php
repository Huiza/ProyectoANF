@extends('layouts.app')

@section('content')

<h3><i class="fa fa-angle-right"></i> BALANCE GENERAL</h3>


        <!-- BASIC FORM ELELEMNTS -->
        <div class="row mt">
          <div class="col-lg-12">
            <div class="form-panel" >
           
             
            <div style="padding-left:10%; padding-top:5%; padding-bottom:3%;"> 
            <form method="post" enctype="multipart/form-data" action="{{route('actualizar_estado_financiero',$estado_actualizar->id_estado_financiero)}}">
              @method('PUT')
                @csrf

                <input type="file" name="estado_financiero">
                <br>
                <button class="btn btn-primary">Importar</button>
              </form>
              </div>
            <div style="text-align:center;">
              <h3 class="mb">{{$estado_actualizar->empresa->nombre_empresa}}</h3>
              <h4 class="mb">Balance general</h4>
              <h4>Del {{date('j F, Y', strtotime($estado_actualizar->fecha_inicio))}} al {{date('j F, Y', strtotime($estado_actualizar->fecha_final))}}</h4>
            </div>
                

              <form style="padding-left:15%; font-size:15px;" class="form-horizontal style-form" method="POST" action="{{route('actualizar_estado_financiero', $estado_actualizar->id_estado_financiero)}}" style="padding:2%;">
              @method('PUT')
                @csrf

           
                <div class="panel-body">
                <div class="task-content">

                <div class="row">
                      <div class="col-md-12">
                        <h3> </h3>
                 
                      </div>

                     
                      </div>

                        <div class="col-md-10">
                      
                        <table class="table table-hover">
                           
                            <hr>
                            <thead>
                            <tr>
                                <th><h4><strong>Cuenta</strong></h4></th>
                                <th><h4><strong>Código</strong></h4></th>
                               

                            </tr>
                            </thead>
                            <tbody>
                            @foreach($activos as $cuenta)
                            <tr>
                                @if($cuenta->cuenta == 'ACTIVO')
                                <td><h4><strong>{{$cuenta->cuenta}}</strong></h4></td>
                                <td hidden><input id="monto" type="text" class="form-control round-form" name="saldo[]" placeholder="Monto en $" value="0" ></td>
                                @elseif($cuenta->cuenta == 'ACTIVO CORRIENTE' || $cuenta->cuenta == 'ACTIVO NO CORRIENTE')
                                <td><h5><strong>{{$cuenta->cuenta}}</strong></h5></td>
                                <td hidden><input id="monto" type="text" class="form-control round-form" name="saldo[]" placeholder="Monto en $" value="0" ></td>
                                @elseif($cuenta->cuenta == 'TOTAL DE ACTIVOS')
                                <td><h5><strong>{{$cuenta->cuenta}}</strong></h5></td>
                                <td><input id="total_activos"  type="number" step="any"  class=" item form-control round-form" name="saldo[]" placeholder="Monto en $"  value="{{$cuenta->saldo}}" readonly></td>
                                @else
                                <td>{{$cuenta->cuenta}}</td>
                                <td><input onkeyup="calcular_activo()" type="number" step="any" class=" item form-control round-form monto_activo" name="saldo[]" placeholder="Monto en $" value="{{$cuenta->saldo}}" required></td>
                                @endif
                                <input type="text"  name="cuenta[]" value="{{ $cuenta->cuenta }}" hidden>
                                <div><input type="text"  name="id_estado_financiero[]" value="{{ $estado_actualizar->id_estado_financiero}}" hidden></div>
                            
                            </tr>

                            @endforeach
                            </tbody>
                                
                                
                            @foreach($pasivos as $cuenta)
                            <tr>
                                @if($cuenta->cuenta == 'PASIVO')
                                <td><h4><strong>{{$cuenta->cuenta}}</strong></h4></td>
                                <td hidden><input type="text" class="form-control round-form" name="saldo[]" placeholder="Monto en $" value="0" ></td>
                                @elseif($cuenta->cuenta == 'PASIVO  CORRIENTE' || $cuenta->cuenta == 'PASIVO NO CORRIENTE')
                                <td><h5><strong>{{$cuenta->cuenta}}</strong></h5></td>
                                <td hidden><input id="monto" type="text" class="form-control round-form" name="saldo[]" placeholder="Monto en $" value="0" ></td>
                                @elseif($cuenta->cuenta == 'TOTAL DE PASIVOS')
                                <td><h5><strong>{{$cuenta->cuenta}}</strong></h5></td>
                                <td><input id="total_pasivos"  type="number" step="any" class=" item form-control round-form" name="saldo[]" placeholder="Monto en $" value="{{$cuenta->saldo}}" readonly></td>
                                @else
                                <td>{{$cuenta->cuenta}}</td>
                                <td><input onkeyup="calcular_pasivo()" type="number" step="any" class="form-control round-form monto_pasivo" name="saldo[]" placeholder="Monto en $" value="{{$cuenta->saldo}}" required></td>
                                @endif
                                <input type="text"  name="cuenta[]" value="{{ $cuenta->cuenta }}" hidden>
                                <div><input type="text"  name="id_estado_financiero[]" value="{{ $estado_actualizar->id_estado_financiero}}" hidden></div>
                            </tr>
                            @endforeach
                            </tbody>
                                

                                
                            @foreach($patrimonio as $cuenta)
                            <tr>
                                @if($cuenta->cuenta == 'PATRIMONIO')
                                <td><h4><strong>{{$cuenta->cuenta}}</strong></h4></td>
                                <td hidden><input type="text" class="form-control round-form" name="saldo[]" placeholder="Monto en $" value="0" ></td>
                                @elseif($cuenta->cuenta == 'TOTAL PATRIMONIO')
                                <td><h5><strong>{{$cuenta->cuenta}}</strong></h5></td>
                                <td><input id="total_patrimonio"  type="number" step="any"  class=" item form-control round-form" name="saldo[]" placeholder="Monto en $" value="{{$cuenta->saldo}}" readonly></td>
                                @else
                                <td>{{$cuenta->cuenta}}</td>
                                <td><input onkeyup="calcular_patrimonio()" type="number" step="any" class="form-control round-form monto_patrimonio" name="saldo[]" placeholder="Monto en $" value="{{$cuenta->saldo}}" required></td>
                                @endif
                                <input type="text"  name="cuenta[]" value="{{ $cuenta->cuenta }}" hidden>
                                <div><input type="text"  name="id_estado_financiero[]" value="{{ $estado_actualizar->id_estado_financiero}}" hidden></div>
                            </tr>
                            @endforeach
                            </tbody>
                                
                        </table>


                        <div class="col-md-12 alert alert-warning" >
                          <strong>
                          <span>TOTAL ACTIVO = </span><span id="validacion_activo"></span>
                          <br>
                          <span>TOTAL PASIVO + PATRIMONIO = </span><span id="validacion_pasivo_patrimonio"></span>
                          </strong>
                          <br><br>
                          <p style="color: red" id="mensaje_validacion"></p>
                        </div>

                        <br><br><br>
                        
                    </div>
                                
                </div>
                
              </div>
              <div class="form-group">
                    <div class="col-lg-offset-2 col-lg-10">
                      <button class="btn btn-theme" id="boton_guardar" disabled>Guardar</button>
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
    
          <!-- col-lg-12-->
        </div>

<script>
function calcular_activo() {

var total = 0;
$(".monto_activo").each(function() {
  if (isNaN(parseFloat($(this).val()))) {
    total += 0;
  } else {
    total += parseFloat($(this).val());
  }
});
document.getElementById('total_activos').value = total;
document.getElementById('validacion_activo').innerHTML = total;
}


function calcular_pasivo() {

var total = 0;
$(".monto_pasivo").each(function() {
  if (isNaN(parseFloat($(this).val()))) {
    total += 0;
  } else {
    total += parseFloat($(this).val());
  }
});
document.getElementById('total_pasivos').value = total;
calcular_pasivo_patrimonio();
}


function calcular_patrimonio() {

var total = 0;
$(".monto_patrimonio").each(function() {
  if (isNaN(parseFloat($(this).val()))) {
    total += 0;
  } else {
    total += parseFloat($(this).val());
  }
});
document.getElementById('total_patrimonio').value = total;


calcular_pasivo_patrimonio();
}

function calcular_pasivo_patrimonio(){
  var total_activo = parseFloat(document.getElementById('total_activos').value);
  var total_pasivo_patrimonio = parseFloat(document.getElementById('total_pasivos').value) + parseFloat(document.getElementById('total_patrimonio').value);
  document.getElementById('validacion_pasivo_patrimonio').innerHTML = total_pasivo_patrimonio;

  if(total_activo != total_pasivo_patrimonio){
    document.getElementById('mensaje_validacion').innerHTML = 'EL TOTAL DE ACTIVOS ES DISTINTO DE TOTAL DE PASIVOS + PATRIMONIO. No se puede almacenar.';
    document.getElementById('boton_guardar').disabled = true;
  }
  else{
    document.getElementById('mensaje_validacion').innerHTML = '';
    document.getElementById('boton_guardar').disabled = false;
  }
}


</script>

@endsection