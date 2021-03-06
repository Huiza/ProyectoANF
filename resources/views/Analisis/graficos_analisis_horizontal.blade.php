@extends('layouts.app')

@section('content')



<h3><i class="fa fa-angle-right"></i> GRÁFICOS ANÁLISIS HORIZONTAL
  <a href="{{route('ver_empresa', $estado_financiero->empresa->id)}}" style="float: right;"><button type="button" class="btn btn-default">Regresar</button></a>
</h3>
        <!-- BASIC FORM ELELEMNTS -->
        <div class="row mt">
          <div class="col-lg-12">
            <div class="form-panel" >

            <div class="btn-group btn-group-justified">
                <div class="btn-group">
                <a href="{{route('ver_balance_general', $estado_financiero->id_estado_financiero)}}"><button type="button" class="btn btn-default"> 
                @if($estado_financiero->id_tipo_estado_financiero==1)
                Balance general
                @else
                Estado de resultados
                @endif
                </button></a>
                </div>
                <div class="btn-group">
                <a href="{{route('calcular_analisis_horizontal', $estado_financiero->id_estado_financiero)}}"><button type="button" class="btn btn-default"> Análisis horizontal</button></a>
                </div>
                <div class="btn-group">
                <a href="{{route('calcular_analisis_vertical', $estado_financiero->id_estado_financiero)}}"><button type="button" class="btn btn-default"> Análisis vertical</button></a>
                </div>
               
              </div>
            <br><br><br><br>
            <div style="text-align:center;">
              <h3 class="mb">{{$estado_financiero->empresa->nombre_empresa}}</h3>
              <h4 class="mb">GRÁFICOS ANÁLISIS HORIZONTAL</h4>
              <h4>Del {{date('j F, Y', strtotime($estado_financiero_anterior->fecha_inicio))}} - {{date('j F, Y', strtotime($estado_financiero_anterior->fecha_final))}}</h4>
              <h4>Al {{date('j F, Y', strtotime($estado_financiero->fecha_inicio))}} - {{date('j F, Y', strtotime($estado_financiero->fecha_final))}}</h4>
            </div>
            
              <div class="panel-body" style="padding-left:15%; font-size:15px;">
                <div class="task-content">

                <div class="row">
                      <div class="col-md-10">
                        <h3> </h3>

                        <div class="col-md-10">
                       @if($estado_financiero->id_tipo_estado_financiero==1)
                        <div id="grafico_activos"></div> <br>
                        <div id="btn-group">
                          <button class="button button-blue" id="none">Sin formato</button>
                          <button class="button button-blue" id="decimal">Formato decimal</button>
                        </div> <br> <br>
                        <div id="grafico_pasivos"></div> <br>
                        <div id="btn-group">
                          <button class="button button-blue" id="none">Sin formato</button>
                          <button class="button button-blue" id="decimal">Formato decimal</button>
                        </div> <br> <br>
                        <div id="grafico_patrimonio"></div> <br>
                        <div id="btn-group">
                          <button class="button button-blue" id="none">Sin formato</button>
                          <button class="button button-blue" id="decimal">Formato decimal</button>
                        </div>
                        @else
                        <div id="grafico_ingresos"></div> <br>
                        <div id="btn-group">
                          <button class="button button-blue" id="none">Sin formato</button>
                          <button class="button button-blue" id="decimal">Formato decimal</button>
                        </div>
                        <div id="grafico_gastos"></div> <br>
                        <div id="btn-group">
                          <button class="button button-blue" id="none">Sin formato</button>
                          <button class="button button-blue" id="decimal">Formato decimal</button>
                        </div>
                      @endif
                    </div>
                 
                </div>
                
              </div>
            
              {{$estado_financiero->id_tipo_estado_financiero}}
           
                <br>
            </section>
          </div>
          <!-- /col-md-12-->
        </div>
        
                              
         
            </div>
          </div>
          <!-- col-lg-12-->


    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript">
    
      google.charts.load('current', {'packages':['bar']});
      google.charts.setOnLoadCallback(drawChart);

      function drawChart() {
        var data = google.visualization.arrayToDataTable([
          ['Cuenta', '{{date('j F, Y', strtotime($estado_financiero_anterior->fecha_inicio))}} - {{date('j F, Y', strtotime($estado_financiero_anterior->fecha_final))}}', '{{date('j F, Y', strtotime($estado_financiero->fecha_inicio))}} - {{date('j F, Y', strtotime($estado_financiero->fecha_final))}}'],
          @for($i=1; $i<$indice_activos;$i++)
          @if($balance[$i]->cuenta != 'Activo corriente' && $balance[$i]->cuenta != 'Activo no corriente')
          ['{{$balance[$i]->cuenta}}',{{$balance[$i]->saldo}}, {{$balance_anterior[$i]->saldo}}],
          @endif
         @endfor
        ]);

        var options = {
          chart: {
            title: 'CUENTAS DEL ACTIVO',
            subtitle: '',
          },
          bars: 'horizontal', // Required for Material Bar Charts.
          hAxis: {format: 'decimal'},
          height: 400,
          colors: ['#2980b9', '#e74c3c']
        };

        var chart = new google.charts.Bar(document.getElementById('grafico_activos'));

        chart.draw(data, google.charts.Bar.convertOptions(options));

        var btns = document.getElementById('btn-group');

        btns.onclick = function (e) {

          if (e.target.tagName === 'BUTTON') {
            options.hAxis.format = e.target.id === 'none' ? '' : e.target.id;
            chart.draw(data, google.charts.Bar.convertOptions(options));
          }
        }
      }
    </script>


    <script type="text/javascript">
    
      google.charts.load('current', {'packages':['bar']});
      google.charts.setOnLoadCallback(drawChart);

      function drawChart() {
        var data = google.visualization.arrayToDataTable([
          ['Cuenta', '{{date('j F, Y', strtotime($estado_financiero_anterior->fecha_inicio))}} - {{date('j F, Y', strtotime($estado_financiero_anterior->fecha_final))}}', '{{date('j F, Y', strtotime($estado_financiero->fecha_inicio))}} - {{date('j F, Y', strtotime($estado_financiero->fecha_final))}}'],
          @for($i=$indice_activos+2; $i<$indice_pasivos;$i++)
          @if($balance[$i]->cuenta != 'Pasivo corriente' && $balance[$i]->cuenta != 'Pasivo no corriente')
          ['{{$balance[$i]->cuenta}}',{{$balance[$i]->saldo}}, {{$balance_anterior[$i]->saldo}}],
          @endif
         @endfor
        ]);

        var options = {
          chart: {
            title: 'CUENTAS DEL PASIVO',
            subtitle: '',
          },
          bars: 'horizontal', // Required for Material Bar Charts.
          hAxis: {format: 'decimal'},
          height: 400,
          colors: ['#2980b9', '#e74c3c']
        };

        var chart = new google.charts.Bar(document.getElementById('grafico_pasivos'));

        chart.draw(data, google.charts.Bar.convertOptions(options));

        var btns = document.getElementById('btn-group');

        btns.onclick = function (e) {

          if (e.target.tagName === 'BUTTON') {
            options.hAxis.format = e.target.id === 'none' ? '' : e.target.id;
            chart.draw(data, google.charts.Bar.convertOptions(options));
          }
        }
      }
    </script>


    <script type="text/javascript">
    
      google.charts.load('current', {'packages':['bar']});
      google.charts.setOnLoadCallback(drawChart);

      function drawChart() {
        var data = google.visualization.arrayToDataTable([
          ['Cuenta', '{{date('j F, Y', strtotime($estado_financiero_anterior->fecha_inicio))}} - {{date('j F, Y', strtotime($estado_financiero_anterior->fecha_final))}}', '{{date('j F, Y', strtotime($estado_financiero->fecha_inicio))}} - {{date('j F, Y', strtotime($estado_financiero->fecha_final))}}'],
          @for($i=$indice_pasivos+2; $i<count($balance)-1;$i++)
          ['{{$balance[$i]->cuenta}}',{{$balance[$i]->saldo}}, {{$balance_anterior[$i]->saldo}}],
         @endfor
        ]);

        var options = {
          chart: {
            title: 'CUENTAS DEL PATRIMONIO',
            subtitle: '',
          },
          bars: 'horizontal', // Required for Material Bar Charts.
          hAxis: {format: 'decimal'},
          height: 400,
          colors: ['#2980b9', '#e74c3c']
        };

        var chart = new google.charts.Bar(document.getElementById('grafico_patrimonio'));

        chart.draw(data, google.charts.Bar.convertOptions(options));

        var btns = document.getElementById('btn-group');

        btns.onclick = function (e) {

          if (e.target.tagName === 'BUTTON') {
            options.hAxis.format = e.target.id === 'none' ? '' : e.target.id;
            chart.draw(data, google.charts.Bar.convertOptions(options));
          }
        }
      }
    </script>


    <script type="text/javascript">
    
      google.charts.load('current', {'packages':['bar']});
      google.charts.setOnLoadCallback(drawChart);

      function drawChart() {
        var data = google.visualization.arrayToDataTable([
          ['Cuenta', '{{date('j F, Y', strtotime($estado_financiero_anterior->fecha_inicio))}} - {{date('j F, Y', strtotime($estado_financiero_anterior->fecha_final))}}', '{{date('j F, Y', strtotime($estado_financiero->fecha_inicio))}} - {{date('j F, Y', strtotime($estado_financiero->fecha_final))}}'],
          @for($i=1; $i<$indice_ingresos;$i++)
          ['{{$balance[$i]->cuenta}}',{{$balance[$i]->saldo}}, {{$balance_anterior[$i]->saldo}}],
         @endfor
        ]);

        var options = {
          chart: {
            title: 'CUENTAS INGRESOS',
            subtitle: '',
          },
          bars: 'horizontal', // Required for Material Bar Charts.
          hAxis: {format: 'decimal'},
          height: 400,
          colors: ['#2980b9', '#e74c3c']
        };

        var chart = new google.charts.Bar(document.getElementById('grafico_ingresos'));

        chart.draw(data, google.charts.Bar.convertOptions(options));

        var btns = document.getElementById('btn-group');

        btns.onclick = function (e) {

          if (e.target.tagName === 'BUTTON') {
            options.hAxis.format = e.target.id === 'none' ? '' : e.target.id;
            chart.draw(data, google.charts.Bar.convertOptions(options));
          }
        }
      }
    </script>

    <script type="text/javascript">
    
      google.charts.load('current', {'packages':['bar']});
      google.charts.setOnLoadCallback(drawChart);

      function drawChart() {
        var data = google.visualization.arrayToDataTable([
          ['Cuenta', '{{date('j F, Y', strtotime($estado_financiero_anterior->fecha_inicio))}} - {{date('j F, Y', strtotime($estado_financiero_anterior->fecha_final))}}', '{{date('j F, Y', strtotime($estado_financiero->fecha_inicio))}} - {{date('j F, Y', strtotime($estado_financiero->fecha_final))}}'],
          @for($i=$indice_ingresos+2; $i<count($balance)-1;$i++)
          ['{{$balance[$i]->cuenta}}',{{$balance[$i]->saldo}}, {{$balance_anterior[$i]->saldo}}],
         @endfor
        ]);

        var options = {
          chart: {
            title: 'CUENTAS DE GASTOS',
            subtitle: '',
          },
          bars: 'horizontal', // Required for Material Bar Charts.
          hAxis: {format: 'decimal'},
          height: 400,
          colors: ['#2980b9', '#e74c3c']
        };

        var chart = new google.charts.Bar(document.getElementById('grafico_gastos'));

        chart.draw(data, google.charts.Bar.convertOptions(options));

        var btns = document.getElementById('btn-group');

        btns.onclick = function (e) {

          if (e.target.tagName === 'BUTTON') {
            options.hAxis.format = e.target.id === 'none' ? '' : e.target.id;
            chart.draw(data, google.charts.Bar.convertOptions(options));
          }
        }
      }
    </script>
  
  
  <body>
    

@endsection