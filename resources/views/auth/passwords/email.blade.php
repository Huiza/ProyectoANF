
@extends('layouts.app_auth')

@section('content')
    <div id="login-page">
        <div class="container">
            <form class="form-login" method="POST" action="{{ route('password.email') }}">
                @csrf
                <h2 class="form-login-heading"><b>Iniciar sesión</b></h2>
                <div class="login-wrap">
                    <div class="form-group row">
                        

                        <div class="col-md-12">
                            <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus placeholder="Correo electrónico">

                            @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>

                    <div class="form-group row mb-0">
                        <div class="col-md-12">
                            <button type="submit" class="btn btn-theme btn-block">
                                {{ __('Enviar correo de recuperación') }}
                            </button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    @endsection
