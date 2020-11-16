@extends('layouts.app_auth')

@section('content')
    <div id="login-page">
        <div class="container">
            <form class="form-login" method="POST" action="{{ route('login') }}">
                @csrf
                <h2 class="form-login-heading"><b>Iniciar sesión</b></h2>
                <div class="login-wrap">
                    <div class="form-group row">
                        <div class="col-md-12">
                            <input id="email" type="email" class="form-control @error('email') is-invalid @enderror"
                                name="email" value="{{ old('email') }}" required autocomplete="email" autofocus
                                placeholder="Correo electrónico">

                            @error('email')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                    </div>
                    <br>
                    <div class="form-group row">
                        <div class="col-md-12 text-center">
                            <input id="password" type="password"
                                class="form-control @error('password') is-invalid @enderror" name="password" required
                                autocomplete="current-password" placeholder="Contraseña">

                            @error('password')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                            
                        </div>
                    </div>

                    <div class="form-group row mb-0 text-center">
                        <div class="col-md-12">
                            <button type="submit" class="btn btn-theme btn-block">
                                                          <i class=" fa fa-lock"></i>
                                <b>{{ __('INICIAR SESIÓN') }}</b>
                            </button>

                            <hr>

                            <div class="registration">
                                ¿Aún no tienes una cuenta?<br />
                                <a class="" href="{{ route('register') }}">
                                    Regístrate
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
    @endsection
