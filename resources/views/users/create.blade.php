@extends('layouts.app')  
@section('title')
Crear nuevo usuario
@endsection
@section('content')
<div>
    <h2 class="card-title"><b>Usuario nuevo</b></h2>
</div>
<div class="card-body col-12">
    <form class="form" method="post" action="{{ route('users.store') }}">
        @csrf
        <div class="card-body">
            
            <input required type="text" name="name" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" placeholder="{{ __('Nombre') }}">
            <br>
            
            <input required type="email" name="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" placeholder="{{ __('Correo electrónico') }}">
            <br>
            
            <input required type="password" name="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" placeholder="{{ __('Contraseña') }}">
            
            <br>
            <input required type="password" name="password_confirmation" class="form-control" placeholder="{{ __('Confirmar contraseña') }}">
            
            <br>
            <select required class="form-control" id="rol" name="rol">
                <option value="" selected disabled hidden>Seleccione un rol *</option>
                @foreach ($roles as $rol)
                <option style="color: black !important;">{{ $rol->name }}</option>
                @endforeach
            </select>    
            
        </div>
        <br> 
        <div class="card-footer text-right">
            <button type="submit" class="btn btn-primary">{{ __('Crear usuario nuevo') }}</button>
        </div>
    </form>
</div>
</div>
@endsection