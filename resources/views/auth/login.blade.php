@extends('layouts.auth')

@section('content')
    <p class="login-box-msg">Iniciar sesión</p>
    <form action="/login" method="post">

        {!! csrf_field() !!}

        <div class="form-group has-feedback {{ $errors->has('email') ? 'has-error' : '' }}">
            <input type="email" name="email" class="form-control" value="{{ old('email') }}" placeholder="Correo" required />
            <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
            @foreach ($errors->get('email') as $error)
                <p class="help-block">{{ $error }}</p>
            @endforeach
        </div>

        <div class="form-group has-feedback">
            <input type="password" name="password" class="form-control" placeholder="Contraseña" required />
            <span class="glyphicon glyphicon-lock form-control-feedback"></span>
        </div>

        <div class="row">
            <div class="col-xs-7">
                <div class="checkbox icheck">
                    <label>
                        <input type="checkbox">
                        Recordarme
                    </label>
                </div>
            </div>
            <div class="col-xs-5">
                <button type="submit" class="btn btn-primary btn-block btn-flat">Ingresar</button>
            </div>
        </div>
    </form>

    <a href="{{ url('password/reset') }}">
        ¿Olvidó su contraseña?
    </a>
@endsection
