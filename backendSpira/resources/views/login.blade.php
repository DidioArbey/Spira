@extends('auth')

@section('title', 'Login')
@section('content')

{{-- @section('page-style')
    <link rel="stylesheet" href="{{ asset('assets/css/users/login.css') }}">
@stop --}}



<div class="row container-body">

        <div class="form-login">
            <p class="h1_p">INICIAR SESIÓN</p>
        </div>

        <form class="card auth_form" method="POST" action="{{ route('user.login') }}">
            @csrf
            <div class="col-12">
                <div class="form-control-label">
                    <label for="email">Email</label>
                    <div class="form-group">
                        <input name="email" type="text" id="email" class="form-control"
                            placeholder="Ingrese su correo electronico">
                    </div>
                </div>

                <div class="form-control-label">
                    <label for="password">Contraseña</label>
                    <div class="form-group">
                        <input name="password" type="password" id="password" class="form-control" placeholder="Ingrese su contraseña">
                    </div>

                </div>
                <br>
                {{-- <div class="form-control-label">
                    <label><a href="{{ route('password.forgot') }}" class="forget">¿Olvidaste tu
                            contraseña?</a></label>
                </div> --}}
                {{-- @if ($errors->any())
                    @foreach ($errors->all() as $error)
                        <div>{{ $error }}</div>
                    @endforeach
                @endif --}}
            </div>
            <button class="btn btn-login">Iniciar sesión</button>
        </form>

</div>
@stop
