@extends('layouts.app')

@section('content')



<h3><i class="fa fa-angle-right"></i> GRÁFICOS ANÁLISIS VERTICAL</h3>
        <!-- BASIC FORM ELELEMNTS -->
        <div class="row mt">
          <div class="col-lg-12">
            <div class="form-panel" >

            <div class="btn-group btn-group-justified">
                <div class="btn-group">
                <a href="{{route('ver_balance_general', $estado_financiero->id_estado_financiero)}}"><button type="button" class="btn btn-default"> Balance general</button></a>
                </div>
                <div class="btn-group">
                <a href="{{route('calcular_analisis_horizontal', $estado_financiero->id_estado_financiero)}}"><button type="button" class="btn btn-default"> Análisis horizontal</button></a>
                </div>
                <div class="btn-group">
                <a href="{{route('calcular_analisis_vertical', $estado_financiero->id_estado_financiero)}}"><button type="button" class="btn btn-default"> Análisis vertical</button></a>
                </div>
                <div class="btn-group">
                <a href="{{route('calcular_ratios_financieros', $estado_financiero->id_estado_financiero)}}"><button type="button" class="btn btn-default"> Razones financieras</button></a>
                </div>
              </div>
            <br><br><br><br>
            <div style="text-align:center;">
              <h3 class="mb">{{$estado_financiero->empresa->nombre_empresa}}</h3>
              <h4 class="mb">GRÁFICOS ANÁLISIS VERTICAL</h4>
              <h4>Del {{date('j F, Y', strtotime($estado_financiero->fecha_inicio))}} al {{date('j F, Y', strtotime($estado_financiero->fecha_final))}}</h4>
            </div>
            
              <div class="panel-body" style="padding-left:15%; font-size:15px;">
                <div class="task-content">

                <div class="row">
                      <div class="col-md-12">
                        <h3> </h3>

                        <div class="col-md-10">
                        <div id="activos" style="width: 900px; height: 500px;" ></div>
                        <div id="pasivos" style="width: 900px; height: 500px;" ></div>
                        <div id="patrimonio" style="width: 900px; height: 500px;" ></div>
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
      google.charts.load("current", {packages:["corechart"]});
      google.charts.setOnLoadCallback(drawChart);
      function drawChart() {
        var data = google.visualization.arrayToDataTable([
          ['cuentas', 'Porcentaje'],
        @for($i=0; $i<$indice_activos;$i++)
          ['{{$balance[$i]->cuenta}}',{{$balance[$i]->saldo}}],
         @endfor
        ]);

        var options = {
          title: 'PROPORCIÓN DE CUENTAS DEL ACTIVO',
          pieHole: 0.4,
        };

        var chart = new google.visualization.PieChart(document.getElementById('activos'));
        chart.draw(data, options);
      }
      
    </script>

    <script type="text/javascript">
      google.charts.load("current", {packages:["corechart"]});
      google.charts.setOnLoadCallback(drawChart);
      function drawChart() {
        var data = google.visualization.arrayToDataTable([
          ['cuentas', 'Porcentaje'],
        @for($i=$indice_activos+1; $i<$indice_pasivos; $i++)
          ['{{$balance[$i]->cuenta}}',{{$balance[$i]->saldo}}],
         @endfor
        ]);

        var options = {
          title: 'PROPORCIÓN DE CUENTAS DEL PASIVO',
          pieHole: 0.4,
        };

        var chart = new google.visualization.PieChart(document.getElementById('pasivos'));
        chart.draw(data, options);
      }
      
    </script>

    <script type="text/javascript">
      google.charts.load("current", {packages:["corechart"]});
      google.charts.setOnLoadCallback(drawChart);
      function drawChart() {
        var data = google.visualization.arrayToDataTable([
          ['cuentas', 'Porcentaje'],
        @for($i=$indice_pasivos+1; $i<count($balance)-1; $i++)
          ['{{$balance[$i]->cuenta}}',{{$balance[$i]->saldo}}],
         @endfor
        ]);

        var options = {
          title: 'PROPORCIÓN DE CUENTAS DEL PATRIMONIO',
          pieHole: 0.4,
        };

        var chart = new google.visualization.PieChart(document.getElementById('patrimonio'));
        chart.draw(data, options);
      }
      
    </script>
  
  
  <body>
    

@endsection