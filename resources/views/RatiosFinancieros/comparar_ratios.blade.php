@extends('layouts.app')

@section('content')


<h3><i class="fa fa-angle-right"></i> ANÁLISIS HORIZONTAL</h3>
        <!-- BASIC FORM ELELEMNTS -->
        <div class="row mt">
          <div class="col-lg-12">
            <div class="form-panel" >
                     
            <div style="text-align:center; padding-top:5%; padding-bottom:3%;">
              
              
                <div class="task-content" style="padding-left:15%; font-size:15px;" >
              
            
                <div class="row">
                      <div class="col-md-12">
                      
                        <div class="col-md-10">
                      
                        <table class="table table-hover">
                           
                            <hr>
                          
                            <tbody>
                            <tr><td><h4><strong>Razones de liquidez</strong></h4></td></tr>
                            @foreach ($empresas as $empresa)
                                {{$empresa}}
                            @endforeach
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