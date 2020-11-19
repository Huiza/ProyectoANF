@extends('layouts.app')

@section('content')
  <!-- /row -->
  <div class="row content-panel" style="padding-top:5%;">
          <br><br><br>
        
<div class="row" style="padding-left:30%;">
          <div class="col-lg-12">
            <br>
         
            <!-- end dmbox -->
            <div class="col-lg-6 col-md-4 col-sm-12">
              <div class="dmbox">
                <div class="service-icon">
                  <a class="" href="{{route('empresas')}}"><i class="dm-icon fa fa-bar-chart-o fa-5x"></i></a>
                </div>
                <h4>Análisis financiero</h4>
              </div>
            </div>

            </div>
            </div>

            <div class="row" style="padding-left:30%;">
            <div class="col-lg-12" style="padding-top:15%;">
            <br>
           
            <div class="col-lg-6 col-md-4 col-sm-12">
              <div class="dmbox">
                <div class="service-icon">
                  <a class="" href="{{route('calculadora_ratios')}}"><i class="dm-icon fa fa-table fa-5x"></i></a>
                </div>
                <h4>Calculadora de ratios financieros</h4>
              </div>
            </div>
            <!-- end dmbox -->
           
            <!-- end dmbox -->
            </div>
            </div>
            <br><br><br><br>
    </div>
   
    @endsection
