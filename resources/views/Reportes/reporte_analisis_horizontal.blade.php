<!DOCTYPE html>
<html lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <title>Reporte Análisis Horizontal</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>
</head>

<body>
    <header style="padding:5%; font-family:Arial, Helvetica, sans-serif; mrgin:5%; text-align:justify;" >
        <div style="text-align:center; line-height: 0.1;">
            <p><strong>{{$estado_financiero->empresa->nombre_empresa}}</strong></p> 
            <p><strong>ANÁLISIS HORIZONTAL</strong></p>
            <p><strong>Del {{$fecha_inicio}} al {{$fecha_final}}</strong></p>
        </div>
        <hr>
    </header>
    <main>
        <div class="col-md-10">
            <table class="table table-sm" align="justify">
                <thead class="table-active">
                    <tr height="1.5">
                        <th></th>
                        <th><p><strong>{{date('j F, Y', strtotime($estado_financiero_anterior->fecha_inicio))}} al <br>{{date('j F, Y', strtotime($estado_financiero_anterior->fecha_final))}}</strong></p></th>
                        <th><p><strong>{{date('j F, Y', strtotime($estado_financiero->fecha_inicio))}} al <br>{{date('j F, Y', strtotime($estado_financiero->fecha_final))}}</strong></p></th>
                        <th><p><strong>Variación absoluta</strong></p></th>
                        <th><p><strong>Variación relativa</strong></p></th>
                    </tr>
                </thead>
               <tbody>
                @for($i=0;$i<count($balance);$i++)
                <tr>

                  @if($balance[$i]->cuenta == 'ACTIVO' || $balance[$i]->cuenta == 'PASIVO' ||$balance[$i]->cuenta == 'PATRIMONIO' |$balance[$i]->cuenta == 'INGRESOS' |$balance[$i]->cuenta == 'GASTOS')
                  <td><p><strong>{{ucfirst(strtolower($balance[$i]->cuenta))}}</strong></p></td>

                  @else
                  <td><p>{{$balance[$i]->cuenta}}</p></td>
                  <td><p><strong>${{$balance[$i]->saldo}}</strong></p></td>
                  <td><p><strong>${{$balance_anterior[$i]->saldo}}</strong></p></td>
                  <td><p><strong>${{$variacion_absoluta[$i]}}</strong></p></td>
                  <td><p><strong>{{$variacion_relativa[$i]}}%</strong></p></td>
                  @endif


                </tr>
                @endfor
                </tbody>
            </table>
        </div>
    </main>
</body>