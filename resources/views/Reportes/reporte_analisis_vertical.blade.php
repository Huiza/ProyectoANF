<!DOCTYPE html>
<html lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <title>Reporte Análisis Vertical</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>
</head>

<body>
    <header style="padding:5%; font-family:Arial, Helvetica, sans-serif; mrgin:5%; text-align:justify;" >
        <div style="text-align:center; line-height: 0.1;">
            <p><strong>{{$estado_financiero->empresa->nombre_empresa}}</strong></p> 
            <p><strong>ANÁLISIS VERTICAL</strong></p>
            <p><strong>Del {{$fecha_inicio}} al {{$fecha_final}}</strong></p>
        </div>
        <hr>
    </header>
    <main>
        <div class="col-md-10">
            <table class="table table-sm" align="justify">
                <thead class="table-active">
                    <tr>
                        <th><p><strong>Cuenta</strong></p></th>
                        <th><p><strong>Monto</strong></p></th>
                        <th><p><strong>Análisis Vertical</strong></p></th>
                    </tr>
                </thead>
               <tbody>
                @for($i=0;$i<count($balance);$i++)
                <tr>

                @if($balance[$i]->cuenta == 'ACTIVO' || $balance[$i]->cuenta == 'PASIVO' ||$balance[$i]->cuenta == 'PATRIMONIO' || $balance[$i]->cuenta == 'INGRESOS' || $balance[$i]->cuenta == 'GASTOS' $balance[$i]->cuenta == 'ACTIVO CORRIENTE' $balance[$i]->cuenta == 'ACTIVO NO CORRIENTE' $balance[$i]->cuenta == 'PASIVO CORRIENTE' $balance[$i]->cuenta == 'PASIVO NO CORRIENTE')
                    <td><p><strong>{{$balance[$i]->cuenta}}</strong></p></td>

                    @else
                    <td><p>{{$balance[$i]->cuenta}}</p></td>
                    <td><p><strong>${{$balance[$i]->saldo}}</strong></p></td>
                    <td><p><strong>{{$porcentaje_vertical[$i]}} %</strong></p></td>
                    
                    @endif
                </tr>
                @endfor
                </tbody>
            </table>
        </div>
    </main>
</body>