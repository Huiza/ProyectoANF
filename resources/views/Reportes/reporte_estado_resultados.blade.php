<!DOCTYPE html>
<html lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <title>Reporte estado de resultados</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>
</head>

<body>
    <header style="padding:5%; font-family:Arial, Helvetica, sans-serif; mrgin:5%; text-align:justify;" >
        <div style="text-align:center; line-height: 0.1;">
            <p><strong>{{$estado_financiero->empresa->nombre_empresa}}</strong></p> 
            <p><strong>ESTADO DE RESULTADOS</strong></p>
            <p><strong>Del {{$fecha_inicio}} al {{$fecha_final}}</strong></p>
        </div>
        <hr>
    </header>
    <main>
        <div class="col-md-10">
            <table class="table table-sm" align="justify">
                <thead class="table-active">
                    <tr>
                        <th scope="col">Cuenta</th>
                        <th scope="col">Monto</th>
                        
                    </tr>
                </thead>
               <tbody>
               @foreach($estado_resultados as $cuenta)
                            <tr>
                                
                              @if($cuenta->cuenta == 'INGRESOS' || $cuenta->cuenta == 'GASTOS')
                              <td><p><strong>{{$cuenta->cuenta}}</strong></p></td>
                              
                              @else
                              <td><p>{{$cuenta->cuenta}}</h4></p>
                              <td><p><strong>${{ number_format($cuenta->saldo, 2)}}</strong></p></td>
                              @endif
                             
                                
                            </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </main>
</body>