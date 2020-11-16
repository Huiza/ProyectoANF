@extends('layouts.app')

@section('content')



<h3><i class="fa fa-angle-right"></i> GRÁFICOS COMPARACIÓN DE RATIOS</h3>
        <!-- BASIC FORM ELELEMNTS -->
        <div class="row mt">
          <div class="col-lg-12">
            <div class="form-panel" >

            <div class="btn-group btn-group-justified">
                <div class="btn-group">
                <a href="{{route('calcular_ratios_financieros', $estado_financiero->id_estado_financiero)}}"><button type="button" class="btn btn-default"> Razones financieras</button></a>
                </div>
                <div class="btn-group">
                <a href="{{route('comparar_ratios_financieros', $estado_financiero->id_estado_financiero)}}"><button type="button" class="btn btn-default"> Comparación razones financieras</button></a>
                </div>
            </div>
            <br><br><br><br>
            <div style="text-align:center;">
              <h3 class="mb">{{$estado_financiero->empresa->nombre_empresa}}</h3>
              <h4 class="mb">GRÁFICOS COMPARACIÓN DE RATIOS</h4>
              <h4>{{date('j F, Y', strtotime($estado_financiero->fecha_inicio))}} - {{date('j F, Y', strtotime($estado_financiero->fecha_final))}}</h4>
            </div>
            
              <div class="panel-body" style="padding-left:15%; font-size:15px;">
                <div class="task-content">

                <div class="row">
                      <div class="col-md-12">
                        <h3> </h3>

                        <div class="col-md-12">
                        <div id="razones_liquidez"></div> <br>
                        <div id="btn-group">
                          <button class="button button-blue" id="none">Sin formato</button>
                          <button class="button button-blue" id="decimal">Formato decimal</button>
                        </div> <br> <br>
                        <div id="razones_actividad"></div> <br> <br>
                        <div id="btn-group">
                          <button class="button button-blue" id="none">Sin formato</button>
                          <button class="button button-blue" id="decimal">Formato decimal</button>
                        </div> <br> <br>
                        <div id="razones_apalancamiento"></div> <br> <br>
                        <div id="btn-group">
                          <button class="button button-blue" id="none">Sin formato</button>
                          <button class="button button-blue" id="decimal">Formato decimal</button>
                        </div> <br> <br>
                        <div id="razones_rentabilidad"></div> <br> <br>
                        <div id="btn-group">
                          <button class="button button-blue" id="none">Sin formato</button>
                          <button class="button button-blue" id="decimal">Formato decimal</button>
                        </div>
                    </div>
                 
                </div>
                
              </div>
            
             
           
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
          ['Razones', '{{$empresa->nombre_empresa}}', 'Promedio Sector {{$empresa->tipo->tipo}}'],
          @for($i=0; $i<count($razones_liquidez);$i++)
          ['{{$razones_liquidez[$i]->nombre_ratio}}',{{$razones_liquidez[$i]->calculo_ratio}}, {{$ratios_liquidez_promedio[$i]->promedio}}],
         @endfor
        ]);

        var options = {
          chart: {
            title: 'RAZONES DE LIQUIDEZ',
            subtitle: '',
          },
          bars: 'horizontal', // Required for Material Bar Charts.
          hAxis: {format: 'decimal'},
          height: 400,
          colors: ['#58d68d', '#5dade2']
        };

        var chart = new google.charts.Bar(document.getElementById('razones_liquidez'));

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
          ['Razones', '{{$empresa->nombre_empresa}}', 'Promedio Sector {{$empresa->tipo->tipo}}'],
          @for($i=0; $i<count($razones_actividad);$i++)
          ['{{$razones_actividad[$i]->nombre_ratio}}',{{$razones_actividad[$i]->calculo_ratio}}, {{$ratios_actividad_promedio[$i]->promedio}}],
         @endfor
        ]);

        var options = {
          chart: {
            title: 'RAZONES DE ACTIVIDAD',
            subtitle: '',
          },
          bars: 'horizontal', // Required for Material Bar Charts.
          hAxis: {format: 'decimal'},
          height: 400,
          colors: ['#58d68d', '#5dade2']
        };

        var chart = new google.charts.Bar(document.getElementById('razones_actividad'));

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
          ['Razones', '{{$empresa->nombre_empresa}}', 'Promedio Sector {{$empresa->tipo->tipo}}'],
          @for($i=0; $i<count($razones_apalancamiento);$i++)
          ['{{$razones_apalancamiento[$i]->nombre_ratio}}',{{$razones_apalancamiento[$i]->calculo_ratio}}, {{$ratios_apalancamiento_promedio[$i]->promedio}}],
         @endfor
        ]);

        var options = {
          chart: {
            title: 'RAZONES DE APALANCAMIENTO',
            subtitle: '',
          },
          bars: 'horizontal', // Required for Material Bar Charts.
          hAxis: {format: 'decimal'},
          height: 400,
          colors: ['#58d68d', '#5dade2']
        };

        var chart = new google.charts.Bar(document.getElementById('razones_apalancamiento'));

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
          ['Razones', '{{$empresa->nombre_empresa}}', 'Promedio Sector {{$empresa->tipo->tipo}}'],
          @for($i=0; $i<count($razones_rentabilidad);$i++)
          ['{{$razones_rentabilidad[$i]->nombre_ratio}}',{{$razones_rentabilidad[$i]->calculo_ratio}}, {{$ratios_rentabilidad_promedio[$i]->promedio}}],
         @endfor
        ]);

        var options = {
          chart: {
            title: 'RAZONES DE RENTABILIDAD',
            subtitle: '',
          },
          bars: 'horizontal', // Required for Material Bar Charts.
          hAxis: {format: 'decimal'},
          height: 400,
          colors: ['#58d68d', '#5dade2']
        };

        var chart = new google.charts.Bar(document.getElementById('razones_rentabilidad'));

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