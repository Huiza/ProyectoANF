<!DOCTYPE html>
<html lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <title>Reporte estado de resultados</title>
    
</head>

<body>
    <header style="padding:5%; font-family:Arial, Helvetica, sans-serif; mrgin:5%; text-align:justify;" >
        <div style="text-align:center; line-height: 0.1;">
            <h4>{{$estado_financiero->empresa->nombre_empresa}}</h4> 
            <h5>ESTADO DE RESULTADOS</h5>
            <h5>Del {{$fecha_inicio}} al {{$fecha_final}}</h5>
        </div>

        <hr>
    </header>
    <main>
        <div>
            <table class="table table-striped" align="justify">
                <thead class="table-dark">
                    <tr>
                        <th scope="col">Cuenta</th>
                        <th scope="col">Monto</th>
                        
                    </tr>
                </thead>
               <tbody>
               @foreach($estado_resultados as $cuenta)
                            <tr>
                                
                              @if($cuenta->cuenta == 'INGRESOS' || $cuenta->cuenta == 'GASTOS')
                              <td><h3><strong>{{$cuenta->cuenta}}</strong></h3></td>
                              
                              @else
                              <td><p>{{$cuenta->cuenta}}</h4></p>
                              <td><p><strong>${{$cuenta->saldo}}</strong></p></td>
                              @endif
                             
                                
                            </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </main>
</body>