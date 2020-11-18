<!DOCTYPE html>
<html lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <title>Reporte Análisis Vertical</title>
    
</head>

<body>
    <header style="padding:5%; font-family:Arial, Helvetica, sans-serif; mrgin:5%; text-align:justify;" >
        <div style="text-align:center; line-height: 0.1;">
            <h4>{{$estado_financiero->empresa->nombre_empresa}}</h4> 
            <h5>ANÁLISIS VERTICAL</h5>
            <h5>Del {{$fecha_inicio}} al {{$fecha_final}}</h5>
        </div>

        <hr>
    </header>
    <main>
        <div>
            <table class="table table-striped" align="justify">
                <thead class="table-dark">
                    <tr>
                        <th><h4><strong>Cuenta</strong></h4></th>
                        <th><h4><strong>Monto</strong></h4></th>
                        <th><h4><strong>Análisis Vertical</strong></h4></th>
                    </tr>
                </thead>
               <tbody>
                @for($i=0;$i<count($balance);$i++)
                <tr>

                    @if($balance[$i]->cuenta == 'ACTIVO' || $balance[$i]->cuenta == 'PASIVO' ||$balance[$i]->cuenta == 'PATRIMONIO' ||$balance[$i]->cuenta == 'INGRESOS' ||$balance[$i]->cuenta == 'GASTOS')
                    <td><h3><strong>{{$balance[$i]->cuenta}}</strong></h3></td>

                    @else
                    <td><h4>{{$balance[$i]->cuenta}}</h4></td>
                    <td><h4><strong>${{$balance[$i]->saldo}}</strong></h4></td>
                    <td><h4><strong>{{$porcentaje_vertical[$i]}} %</strong></h4></td>
                    
                    @endif
                </tr>
                @endfor
                </tbody>
            </table>
        </div>
    </main>
</body>