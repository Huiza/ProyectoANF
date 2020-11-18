<!DOCTYPE html>
<html lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <title>Reporte de comparación de razones financieras</title>
    
</head>

<body>
    <header style="padding:5%; font-family:Arial, Helvetica, sans-serif; mrgin:5%; text-align:justify;" >
        <div style="text-align:center; line-height: 0.1;">
            <h4>{{$estado_financiero->empresa->nombre_empresa}}</h4> 
            <h5>COMPARACIÓN DE RAZONES FINANCIERAS</h5>
            <h5>Del {{$fecha_inicio}} al {{$fecha_final}}</h5>
        </div>

        <hr>
    </header>
    <main>
        <div>
            <table class="table table-striped" align="justify">
                <hr>
                <tr>
                            <td><h4><strong>Razones financieras</strong></h4></td>
                            <td><h4><strong>Promedio del sector {{$empresa->tipo->tipo}}</strong></h4></td>
                            <td><h4><strong>Ratios {{$empresa->nombre_empresa}}</strong></h4></td>
                    </tr>
                <tbody>
                    <tr>
                            <td><h4><strong>Razones de liquidez</strong></h4></td>
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
                            <td><h4><strong>Razones de actividad</strong></h4></td>
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
                            <td><h4><strong>Razones de apalancamiento</strong></h4></td>
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
                            <td><h4><strong>Razones de rentabilidad</strong></h4></td>
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