@extends('layouts.app')

@section('content')


<h3><i class="fa fa-angle-right"></i> ANÁLISIS HORIZONTAL</h3>
        <!-- BASIC FORM ELELEMNTS -->
        <div class="row mt">
          <div class="col-lg-12">
            <div class="form-panel" >
                     
            <div style="text-align:center; padding-top:5%; padding-bottom:3%;">
            <h3 class="mb">{{$estado_financiero->empresa->nombre_empresa}}</h3>
                <h4 class="mb">COMPARACIÓN DE RAZONES FINANCIERAS</h4>
                <h4>Del {{date('j F, Y', strtotime($estado_financiero->fecha_inicio))}} al {{date('j F, Y', strtotime($estado_financiero->fecha_final))}}</h4>
              
                <div class="task-content" style="padding-left:10%; font-size:15px;" >
                <div style="text-align:center;">
                
                </div>
                <br><br>
                <div class="row">
                      <div class="col-md-12">
                      
                        <div class="col-md-10">
                      
                        <table class="table table-hover">
                           
                            <td><h4><strong>Razones financieras</strong></h4></td>
                            <td><h4><strong>Promedio a nivel de empresas (de tipo{{$empresa->tipo->tipo}})</strong></h4></td>
                            <td><h4><strong>Ratios del período</strong></h4></td
                          
                            <tbody>
                                <tr>
                                        <td><h4><strong>Razones de liquidez</strong></h4></td>
                                </tr>
                            
                            <tr>
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
                            
                            <tr>
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
                            
                            <tr>
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
                            
                            <tr>
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
                            </tr>   
                            @endfor

                           
                            </tr>
                            </tbody>
                             
                        </table>
                      
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
        </div>


@endsection