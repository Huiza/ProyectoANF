@extends('layouts.app')

@section('content')
  <!-- /row -->
  <div class="row content-panel" style="padding-top:5%;">
          <br><br><br>
        
<div class="row" style="padding-left:30%;">
          <div class="col-lg-12">
            <br>
            <div class="col-lg-3 col-md-4 col-sm-12">
              <div class="dmbox">
                <div class="service-icon">
                  <a class="" href="{{route('empresas')}}"><i class="dm-icon fa fa-building o fa-5x"></i></a>
                </div>
                <h4>Empresas</h4>
                
              </div>
            </div>
            <!-- end dmbox -->
            <div class="col-lg-3 col-md-4 col-sm-12">
              <div class="dmbox">
                <div class="service-icon">
                  <a class="" href="faq.html#"><i class="dm-icon fa fa-table fa-5x"></i></a>
                </div>
                <h4>Estados financieros</h4>
              </div>
            </div>

            </div>
            </div>

            <div class="row" style="padding-left:30%;">
            <div class="col-lg-12" style="padding-top:10%;">
            <br>
           
            <div class="col-lg-3 col-md-4 col-sm-12">
              <div class="dmbox">
                <div class="service-icon">
                  <a class="" href="faq.html#"><i class="dm-icon fa fa-bar-chart-o fa-5x"></i></a>
                </div>
                <h4>Ratios financieros</h4>
              </div>
            </div>
            <!-- end dmbox -->
            <div class="col-lg-3 col-md-4 col-sm-12">
              <div class="dmbox">
                <div class="service-icon">
                  <a class="" href="faq.html#"><i class="dm-icon fa fa-file-text-o fa-5x"></i></a>
                </div>
                <h4>Reportes</h4>
            </div>
            <!-- end dmbox -->
            </div>
            </div>
           
    </div>
    <br><br><br><br><br><br>

    @endsection
