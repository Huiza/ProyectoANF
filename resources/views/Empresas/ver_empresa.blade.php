@extends('layouts.app')

@section('content')

        <div class="row mt">
          <div class="col-lg-12">
            <div class="row content-panel">
              <div class="col-md-4 profile-text mt mb centered">
                <div class="right-divider hidden-sm hidden-xs">
                  <h4 style="color:black;">{{$empresa->codigo}}</h4>
                  <h6 style="color:grey;">CÓDIGO</h6>
                  <h4 style="color:black;">{{$empresa->tipo->tipo}}</h4>
                  <h6 style="color:grey;">RUBRO</h6>
            
                </div>
              </div>
              <!-- /col-md-4 -->
              <div class="col-md-4 profile-text">
                <h3 style="color:black;">{{$empresa->nombre_empresa}}</h3>
                <h6 style="color:grey;">Empresa</h6>
                <p style="color:black;">{{$empresa->descripcion}}</p>
                <br>
                <a href="{{route('editar_empresa', $empresa->id)}}" class="btn btn-default"><i class="fa fa-pencil"></i> Editar</a>
                @if(count($catalogo)==0)
                <a href="{{route('crear_catalogo', $empresa->id)}}" class="btn btn-info"><i class="fa fa-book"></i> Agregar catálogo</a>
                @endif
            </div>

            <div class="col-md-4 centered">
                
                  <p>
                  <a href="{{route('nuevo_balance_general', $empresa->id)}}" class="btn btn-theme03"><i class="fa fa-plus"></i> Balance general</a>
                  <a href="{{route('editar_empresa', $empresa->id)}}" class="btn btn-theme02"><i class="fa fa-plus"></i> Estado de resultados</a>
                  </p>
               
              </div>
             
              <!-- /col-md-4 -->
            </div>
            <!-- /row -->
          </div>
          <!-- /col-lg-12 -->
          <div class="col-lg-12 mt">
            <div class="row content-panel">
              <div class="panel-heading">
                <ul class="nav nav-tabs nav-justified">
                  
                  <li class="active">
                    <a data-toggle="tab" href="#contact" class="contact-map">Contact</a>
                  </li>
                  <li>
                    <a data-toggle="tab" href="#edit">Edit Profile</a>
                  </li>
                  <li>
                    <a data-toggle="tab" href="#catalogo">Catálogo</a>
                  </li>
                </ul>
              </div>
              <!-- /panel-heading -->
              <div class="panel-body">
                <div class="tab-content">
                  <div id="catalogo" class="tab-pane active" style="padding-left:6%;">
                    <div class="row">
                      <div class="col-md-12">
                        <h3> </h3>

                        <div class="col-md-11">
                        @if(count($catalogo)>0)
                        <table class="table table-hover">
                            <h4><i class="fa fa-angle-right"></i> Catálogo de cuentas</h4>
                            <hr>
                            <thead>
                            <tr>
                                <th><h4><strong>Código de cuenta</strong></h4></th>
                                <th><h4><strong>Cuenta</strong></h4></th>
                            </tr>
                            </thead>
                            <tbody>
                            
                            @foreach($catalogo as $cuenta)
                            <tr>
                                @if($cuenta->cuenta->nombre_cuenta == 'ACTIVO' || $cuenta->cuenta->nombre_cuenta == 'PASIVO' || $cuenta->cuenta->nombre_cuenta == 'PATRIMONIO' || $cuenta->cuenta->nombre_cuenta == 'INGRESOS' || $cuenta->cuenta->nombre_cuenta == 'GASTOS' || $cuenta->cuenta->nombre_cuenta == 'CUENTA LIQUIDADORA O DE CIERRE' || $cuenta->cuenta->nombre_cuenta == 'CUENTAS DE MEMORANDUM DEUDORAS' || $cuenta->cuenta->nombre_cuenta == 'CUENTAS DE MEMORANDUM DEUDORAS')
                                <td><h4><strong>{{$cuenta->codigo_cuenta}}</strong></h4></td>
                                <td><h4><strong>{{$cuenta->cuenta->nombre_cuenta}}</strong></h4></td>
                                @else
                                <td>{{$cuenta->codigo_cuenta}}</td>
                                <td>{{$cuenta->cuenta->nombre_cuenta}}</td>
                                @endif

                            </tr>
                            @endforeach
                            @else
                            <p>No se ha creado el cátalogo aún</p>
                            @endif
                            </tbody>
                        </table>
                        
                    </div>
   
                </div>
                      
                </div>
                    <!-- /OVERVIEW -->
                </div>
                  <!-- /tab-pane -->
                  <div id="contact" class="tab-pane">
                    <div class="row">
                      <div class="col-md-6">
                        <div id="map"></div>
                      </div>
                      <!-- /col-md-6 -->
                      <div class="col-md-6 detailed">
                        <h4>Location</h4>
                        <div class="col-md-8 col-md-offset-2 mt">
                          <p>
                            Postal Address<br/> PO BOX 12988, Sutter Ave<br/> Brownsville, New York.
                          </p>
                          <br>
                          <p>
                            Headquarters<br/> 844 Sutter Ave,<br/> 9003, New York.
                          </p>
                        </div>
                        <h4>Contacts</h4>
                        <div class="col-md-8 col-md-offset-2 mt">
                          <p>
                            Phone: +33 4898-4303<br/> Cell: 48 4389-4393<br/>
                          </p>
                          <br>
                          <p>
                            Email: hello@dashiotheme.com<br/> Skype: UseDashio<br/> Website: http://Alvarez.is
                          </p>
                        </div>
                      </div>
                      <!-- /col-md-6 -->
                    </div>
                    <!-- /row -->
                  </div>
                  <!-- /tab-pane -->
                  <div id="edit" class="tab-pane">
                    <div class="row">
                      <div class="col-lg-8 col-lg-offset-2 detailed">
                        <h4 class="mb">Personal Information</h4>
                        <form role="form" class="form-horizontal">
                          <div class="form-group">
                            <label class="col-lg-2 control-label"> Avatar</label>
                            <div class="col-lg-6">
                              <input type="file" id="exampleInputFile" class="file-pos">
                            </div>
                          </div>
                          <div class="form-group">
                            <label class="col-lg-2 control-label">Company</label>
                            <div class="col-lg-6">
                              <input type="text" placeholder=" " id="c-name" class="form-control">
                            </div>
                          </div>
                          <div class="form-group">
                            <label class="col-lg-2 control-label">Lives In</label>
                            <div class="col-lg-6">
                              <input type="text" placeholder=" " id="lives-in" class="form-control">
                            </div>
                          </div>
                          <div class="form-group">
                            <label class="col-lg-2 control-label">Country</label>
                            <div class="col-lg-6">
                              <input type="text" placeholder=" " id="country" class="form-control">
                            </div>
                          </div>
                          <div class="form-group">
                            <label class="col-lg-2 control-label">Description</label>
                            <div class="col-lg-10">
                              <textarea rows="10" cols="30" class="form-control" id="" name=""></textarea>
                            </div>
                          </div>
                        </form>
                      </div>
                      <div class="col-lg-8 col-lg-offset-2 detailed mt">
                        <h4 class="mb">Contact Information</h4>
                        <form role="form" class="form-horizontal">
                          <div class="form-group">
                            <label class="col-lg-2 control-label">Address 1</label>
                            <div class="col-lg-6">
                              <input type="text" placeholder=" " id="addr1" class="form-control">
                            </div>
                          </div>
                          <div class="form-group">
                            <label class="col-lg-2 control-label">Address 2</label>
                            <div class="col-lg-6">
                              <input type="text" placeholder=" " id="addr2" class="form-control">
                            </div>
                          </div>
                          <div class="form-group">
                            <label class="col-lg-2 control-label">Phone</label>
                            <div class="col-lg-6">
                              <input type="text" placeholder=" " id="phone" class="form-control">
                            </div>
                          </div>
                          <div class="form-group">
                            <label class="col-lg-2 control-label">Cell</label>
                            <div class="col-lg-6">
                              <input type="text" placeholder=" " id="cell" class="form-control">
                            </div>
                          </div>
                          <div class="form-group">
                            <label class="col-lg-2 control-label">Email</label>
                            <div class="col-lg-6">
                              <input type="text" placeholder=" " id="email" class="form-control">
                            </div>
                          </div>
                          <div class="form-group">
                            <label class="col-lg-2 control-label">Skype</label>
                            <div class="col-lg-6">
                              <input type="text" placeholder=" " id="skype" class="form-control">
                            </div>
                          </div>
                          <div class="form-group">
                            <div class="col-lg-offset-2 col-lg-10">
                              <button class="btn btn-theme" type="submit">Save</button>
                              <button class="btn btn-theme04" type="button">Cancel</button>
                            </div>
                          </div>
                        </form>
                      </div>
                      <!-- /col-lg-8 -->
                    </div>
                    <!-- /row -->
                  </div>
                  <!-- /tab-pane -->
                </div>
                <!-- /tab-content -->
              </div>
              <!-- /panel-body -->
            </div>
            <!-- /col-lg-12 -->
          </div>
          <!-- /row -->
        </div>
        <!-- /container -->
 
        <br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>
@endsection

