<!DOCTYPE html>
<html lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <title>Reporte de razones financieras</title>
    
</head>

<body>
    <header style="padding:5%; font-family:Arial, Helvetica, sans-serif; mrgin:5%; text-align:justify;" >
        <div style="text-align:center; line-height: 0.1;">
            <h4>{{$estado_financiero->empresa->nombre_empresa}}</h4> 
            <h5>RAZONES FINANCIERAS</h5>
            <h5>Del {{$fecha_inicio}} al {{$fecha_final}}</h5>
        </div>

        <hr>
    </header>
    <main>
        <div>
            <table class="table table-striped" align="justify">
                <thead class="table-dark">
                </thead>
               <tbody>
                    <tr><td><h4><strong>Razones de liquidez</strong></h4></td></tr>
                    @foreach($razones_liquidez as $razon)     
                    <tr>
                        <td>{{$razon->nombre_ratio}}</td>
                        <td><strong>{{$razon->calculo_ratio}}</strong></td>
                    </tr>
                    @endforeach
            

                    <tr><td><h4><strong>Razones de actividad</strong></h4></td></tr>
                    @foreach($razones_actividad as $razon)     
                    <tr>
                        <td>{{$razon->nombre_ratio}}</td>
                        <td><strong>{{$razon->calculo_ratio}}</strong></td>
                    </tr>
                    @endforeach

                    <tr><td><h4><strong>Razones de apalancamiento</strong></h4></td></tr>
                    @foreach($razones_apalancamiento as $razon)     
                    <tr>
                        <td>{{$razon->nombre_ratio}}</td>
                        <td><strong>{{$razon->calculo_ratio}}</strong></td>
                    </tr>
                    @endforeach

                    <tr><td><h4><strong>Razones de rentabilidad</strong></h4></td></tr>
                    @foreach($razones_rentabilidad as $razon)     
                    <tr>
                        <td>{{$razon->nombre_ratio}}</td>
                        <td><strong>{{$razon->calculo_ratio}}</strong></td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </main>
</body>