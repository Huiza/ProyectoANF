@extends('layouts.app')
@section('title')
Usuarios
@endsection
@section('content')
<div>
    <div class="row">
        <div class="col-sm-9 text-left">
            <h2 class="card-title"><b>Usuarios</b></h2>
        </div>
        <div class="col-sm-3 text-right">
            <a role="button" class="btn btn-primary" href="{{ route('users.create')  }}">
                Crear nuevo usuario
            </a>
        </div>
    </div>
    <hr>
    <div>
        <div class="table-responsive">
            <table class="table">
                <thead>
                    <tr>
                        <th>Nombre</th>
                        <th>Correo electrónico</th>
                        <th class="text-center"></th>
                        
                    </tr>
                </thead>
                <tbody>
                    @foreach ($data as $use) 
                    <tr> 
                        <td>
                            {{$use->name}}
                        </td>                    
                        <td id="{{$use->id}}" onMouseOver="ResaltarFila({{$use->id}});" onMouseOut="RestablecerFila({{$use->id}}, '')" onClick="CrearEnlace('{{ route('users.show', $use->id)}}');">
                            {{$use->email}}
                        </td>
                        <form method="POST" id="formulario{{$use->id}}" action="{{route('users.destroy', $use->id)}}" >
                            <td class="text-right">
                                
                                <a title="Configurar permisos" type="button" href="{{ route('permission.index', $use->id)}}" class="btn btn-success">
                                    Permisos
                                </a>
                                <a type="button" href="{{ route('users.edit', $use->id)}}" class="btn btn-warning">
                                    Editar
                                </a>
                                
                                @csrf
                                @method('DELETE')
                                <button type="button" onClick="confirmar({{$use->id}})" class="btn btn-danger">
                                    Eliminar
                                </button> 
                                
                            </td>
                        </form>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>

@endsection