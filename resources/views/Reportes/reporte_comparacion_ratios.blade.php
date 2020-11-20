<!DOCTYPE html>
<html lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <title>Reporte de comparación de razones financieras</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>
</head>

<body>
    <header style="padding:5%; font-family:Arial, Helvetica, sans-serif; mrgin:5%; text-align:justify;" >
        <div style="text-align:center; line-height: 0.1;">
            <p><strong>{{$estado_financiero->empresa->nombre_empresa}}</strong></p> 
            <p><strong>COMPARACIÓN DE RAZONES FINANCIERAS</strong></p>
            <p><strong>Del {{$fecha_inicio}} al {{$fecha_final}}</strong></p>
        </div>
        <hr>
    </header>
    <main>
        <div class="col-md-10">
            <table class="table table-sm" align="justify">
                <hr>
                <tr>
                            <td><p><strong>Razones financieras</strong></p></td>
                            <td><p><strong>Promedio del sector {{$empresa->tipo->tipo}}</strong></h4></td>
                            <td><p><strong>Ratios {{$empresa->nombre_empresa}}</strong></p></td>
                    </tr>
                <tbody>
                    <tr>
                            <td><p><strong>Razones de liquidez</strong></p></td>
                    </tr>
                
                
                @for ($i=0; $i<count($ratios_liquidez_promedio);$i++)
                <tr>
                    <td>{{$ratios_liquidez_promedio[$i]->nombre_ratio}}</td>
                    <td><strong>{{$ratios_liquidez_promedio[$i]->promedio}}</strong></td>
                    @if($razones_liquidez[$i]->calculo_ratio > $ratios_liquidez_promedio[$i]->promedio)
                    <td><span class="badge bg-success"><strong>{{$razones_liquidez[$i]->calculo_ratio}}</strong> </span></td>
                    @endif
                    @if($razones_liquidez[$i]->calculo_ratio == $ratios_liquidez_promedio[$i]->promedio)
                    <td><span class="badge bg-warning"><strong>{{$razones_liquidez[$i]->calculo_ratio}}</strong> </span></td>
                    @endif
                    @if($razones_liquidez[$i]->calculo_ratio < $ratios_liquidez_promedio[$i]->promedio)
                    <td><span class="badge bg-important"><strong>{{$razones_liquidez[$i]->calculo_ratio}}</strong> </span></td>
                    @endif
                </tr>   
                @endfor

                    <tr>
                            <td><p><strong>Razones de actividad</strong></p></td>
                    </tr>
                
                
                @for ($i=0; $i<count($ratios_actividad_promedio);$i++)
                <tr>
                    <td>{{$ratios_actividad_promedio[$i]->nombre_ratio}}</td>
                    <td><strong>{{$ratios_actividad_promedio[$i]->promedio}}</strong></td>
                    @if($razones_actividad[$i]->calculo_ratio > $ratios_actividad_promedio[$i]->promedio)
                    <td><span class="badge bg-success"><strong>{{$razones_actividad[$i]->calculo_ratio}}</strong> </span></td>
                    @endif
                    @if($razones_actividad[$i]->calculo_ratio == $ratios_actividad_promedio[$i]->promedio)
                    <td><span class="badge bg-warning"><strong>{{$razones_actividad[$i]->calculo_ratio}}</strong> </span></td>
                    @endif
                    @if($razones_actividad[$i]->calculo_ratio < $ratios_actividad_promedio[$i]->promedio)
                    <td><span class="badge bg-important"><strong>{{$razones_actividad[$i]->calculo_ratio}}</strong> </span></td>
                    @endif
                </tr>   
                @endfor

                <tr>
                            <td><p><strong>Razones de apalancamiento</strong></p></td>
                    </tr>
                
                
                @for ($i=0; $i<count($ratios_apalancamiento_promedio);$i++)
                <tr>
                    <td>{{$ratios_apalancamiento_promedio[$i]->nombre_ratio}}</td>
                    <td><strong>{{$ratios_apalancamiento_promedio[$i]->promedio}}</strong></td>
                    @if($razones_apalancamiento[$i]->calculo_ratio > $ratios_apalancamiento_promedio[$i]->promedio)
                    <td><span class="badge bg-success"><strong>{{$razones_apalancamiento[$i]->calculo_ratio}}</strong> </span></td>
                    @endif
                    @if($razones_apalancamiento[$i]->calculo_ratio == $ratios_apalancamiento_promedio[$i]->promedio)
                    <td><span class="badge bg-warning"><strong>{{$razones_apalancamiento[$i]->calculo_ratio}}</strong> </span></td>
                    @endif
                    @if($razones_apalancamiento[$i]->calculo_ratio < $ratios_apalancamiento_promedio[$i]->promedio)
                    <td><span class="badge bg-important"><strong>{{$razones_apalancamiento[$i]->calculo_ratio}}</strong> </span></td>
                    @endif
                </tr>   
                @endfor

                <tr>
                            <td><p><strong>Razones de rentabilidad</strong></p></td>
                    </tr>
                
                
                @for ($i=0; $i<count($ratios_rentabilidad_promedio);$i++)
                <tr>
                    <td>{{$ratios_rentabilidad_promedio[$i]->nombre_ratio}}</td>
                    <td><strong>{{$ratios_rentabilidad_promedio[$i]->promedio}}</strong></td>
                    @if($razones_rentabilidad[$i]->calculo_ratio > $ratios_rentabilidad_promedio[$i]->promedio)
                    <td><span class="badge bg-success"><strong>{{$razones_rentabilidad[$i]->calculo_ratio}}</strong> </span></td>
                    @endif
                    @if($razones_rentabilidad[$i]->calculo_ratio == $ratios_rentabilidad_promedio[$i]->promedio)
                    <td><span class="badge bg-warning"><strong>{{$razones_rentabilidad[$i]->calculo_ratio}}</strong> </span></td>
                    @endif
                    @if($razones_rentabilidad[$i]->calculo_ratio < $ratios_rentabilidad_promedio[$i]->promedio)
                    <td><span class="badge bg-important"><strong>{{$razones_rentabilidad[$i]->calculo_ratio}}</strong> </span></td>
                    @endif
                    @endfor
                </tr>   
                </tbody>
            </table>
        </div>
    </main>
</body>