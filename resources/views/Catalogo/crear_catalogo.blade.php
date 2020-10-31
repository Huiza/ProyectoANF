@extends('layouts.app')

@section('content')

<h3><i class="fa fa-angle-right"></i> Catálogo</h3>

        <!-- BASIC FORM ELELEMNTS -->
        <div class="row mt">
          <div class="col-lg-12">
            <div class="form-panel" style="padding:3%; font-size:15px;">
              <h4 class="mb"><i class="fa fa-angle-right"></i> {{$empresa->nombre_empresa}} : Registro de catálogo</h4>
              <br>
              <form class="form-horizontal style-form" method="POST" action="{{route('guardar_empresa')}}" style="padding-left:10%;">
               @csrf

               @foreach($cuentas_mayores as $cm)
                   <h4><strong>{{$cm->nombre_cuenta}}</strong></h4>
                   @foreach($cuentas_primarias as $cp)
                   <h5><strong>{{$cp->nombre_subcuenta_primaria}}</strong></h5>
                   @foreach($cuentas_secundarias as $cs)
                   <h6><strong>{{$cs->nombre_subcuenta_secundaria}}</strong></h6>
                   @foreach($cuentas_terciarias as $ct)
                   <p>{{$ct->nombre_subcuenta_terciaria}}</p>
                   @foreach($cuentas_cuaternarias as $cc)
                   <p>{{$ct->nombre_subcuenta_cuaternaria}}</hp>
                   @foreach($cuentas_quinarias as $cq)
                   <p>{{$ct->nombre_subcuenta_quinaria}}</hp>
                   @endforeach
                   @endforeach
                   @endforeach
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