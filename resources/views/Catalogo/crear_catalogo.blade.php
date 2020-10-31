@extends('layouts.app')

@section('content')

<h3><i class="fa fa-angle-right"></i> Catálogo</h3>

        <!-- BASIC FORM ELELEMNTS -->
        <div class="row mt">
          <div class="col-lg-12">
            <div class="form-panel" style="padding:3%; font-size:15px;">
              <h4 class="mb"><i class="fa fa-angle-right"></i> {{$empresa->nombre_empresa}} : Registro de catálogo</h4>
              <form class="form-horizontal style-form" method="POST" action="{{route('guardar_empresa')}}" style="padding:5%;">
               @csrf

               @foreach($cuentas_mayores as $cm)
                   <h3><strong>{{$cm->nombre_cuenta}}</strong></h3>
                   <hr>
                   @foreach($cm->cuentaPrimaria as $cp)
                   <h4><strong>{{$cp->nombre_subcuenta_primaria}}</strong></h4>
                   @foreach($cp->cuentaSecundaria as $cs)
                   <h5><strong>{{$cs->nombre_subcuenta_secundaria}}</strong></h5>
                   @foreach($cs->cuentaTerciaria as $ct)
                   <h6><strong>{{$ct->nombre_subcuenta_terciaria}}</strong></h6>
                   @foreach($ct->cuentaCuaternaria as $cc)
                   <h6><strong>{{$cc->nombre_subcuenta_cuaternaria}}</strong></h6>
                   @foreach($cc->cuentaQuinaria as $cq)
                   <h6><strong>{{$cq->nombre_subcuenta_quinaria}}</strong></h6>
                   @endforeach
                   @endforeach
                   @endforeach
                   <hr>
                   @endforeach
                   @endforeach
               
               @endforeach
                   
              
               </form>
            </div>
          </div>
          <!-- col-lg-12-->
        </div>
        <br><br><br><br><br><br><br><br>

@endsection