<!DOCTYPE html>
<html lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <title>Reporte de razones financieras</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>
</head>

<body>
    <header style="padding:5%; font-family:Arial, Helvetica, sans-serif; mrgin:5%; text-align:justify;" >
        <div style="text-align:center; line-height: 0.1;">
            <p><strong>{{$estado_financiero->empresa->nombre_empresa}}</strong></p> 
            <p><strong>RAZONES FINANCIERAS</strong></p>
            <p><strong>Del {{$fecha_inicio}} al {{$fecha_final}}</strong></p>
        </div>

        <hr>
    </header>
    <main>
        <div class="col-md-10">
            <table class="table table-sm" align="justify">
                <thead class="table-active">
                </thead>
               <tbody>
                    <tr><td><p><strong>Razones de liquidez</strong></p></td></tr>
                    @foreach($razones_liquidez as $razon)     
                    <tr>
                        <td>{{$razon->nombre_ratio}}</td>
                        <td><strong>{{$razon->calculo_ratio}}</strong></td>
                    </tr>
                    @endforeach
            

                    <tr><td><p><strong>Razones de actividad</strong></p></td></tr>
                    @foreach($razones_actividad as $razon)     
                    <tr>
                        <td>{{$razon->nombre_ratio}}</td>
                        <td><strong>{{$razon->calculo_ratio}}</strong></td>
                    </tr>
                    @endforeach

                    <tr><td><p><strong>Razones de apalancamiento</strong></p></td></tr>
                    @foreach($razones_apalancamiento as $razon)     
                    <tr>
                        <td>{{$razon->nombre_ratio}}</td>
                        <td><strong>{{$razon->calculo_ratio}}</strong></td>
                    </tr>
                    @endforeach

                    <tr><td><p><strong>Razones de rentabilidad</strong></p></td></tr>
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