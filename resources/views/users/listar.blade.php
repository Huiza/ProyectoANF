@extends('layouts.app')  
@section('title')
Permisos por usuario
@endsection
@section('content')
<div class="row">
    <div class="col-md-6">
        <div>
            <div>
                <div>
                    <h4 class="card-title text-center"><b>Permisos asignados</b></h4>
                </div>
                <div> 
                    <table width='100%' class="table">
                        @foreach ($permisos_usuario as $permiso)
                        <tr>   
                            <td>
                            </td>                  
                            <td id="$permiso->id">
                                {{$permiso->name}}
                            </td>
                            <td>
                                <form id="eliminarPermiso{{$permiso->id}}" method="post" action="{{route ('permission.destroy')}}">
                                    @csrf
                                    <input hidden name="id_permiso" value="{{$permiso->id}}">
                                    <input hidden name="id_usuario" value="{{$user->id}}">
                                    &nbsp;&nbsp;
                                    <button  class="btn btn-danger">Eliminar</button>
                                </form>
                                
                            </td>
                        </tr>
                        
                        @endforeach
                    </table>                   
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-6">
        <div>
            <div>
                <div>
                    <h4 class="card-title text-center"><b>Disponibilidad de permisos</b></h4>
                </div>
                <div>
                    <table width='100%' class="table">
                        @foreach ($permisos as $permiso)
                        
                        <tr  id="p{{$permiso->id}}" onMouseOver="ResaltarFila('p{{$permiso->id}}');" onMouseOut="RestablecerFila('p{{$permiso->id}}', '')" onClick="añadirPermiso({{ $permiso->id }});" >
                            <td></td>
                            <td>
                                {{$permiso->name}}
                            </td>
                            <td>
                                <form id="añadirPermiso{{$permiso->id}}" method="post" action="{{route('permission.store')}}">
                                    @csrf
                                    <input hidden name="id_permiso" value="{{$permiso->id}}">
                                    <input hidden name="id_usuario" value="{{$user->id}}">
                                    &nbsp;&nbsp;
                                    <button class="btn btn-facebook">Asignar</button>
                                </form>
                                
                            </td>
                        </tr>
                        
                        @endforeach
                    </table>
                    
                </div>
            </div>
        </div>
    </div>
</div>
@endsection