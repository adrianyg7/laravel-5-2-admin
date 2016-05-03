@extends('layouts.auth')

@section('content')
    <p class="login-box-msg">Restablecer Contraseña</p>
    
    <form action="/password/reset" method="post">

        {!! csrf_field() !!}
        <input type="hidden" name="token" value="{{ $token }}">

        <div class="form-group has-feedback {{ $errors->has('email') ? 'has-error' : '' }}">
            <input type="email" name="email" class="form-control" value="{{ old('email') }}" placeholder="Correo" required />
            <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
            @foreach ($errors->get('email') as $error)
                <p class="help-block">{{ $error }}</p>
            @endforeach
        </div>

        <div class="form-group has-feedback {{ $errors->has('password') ? 'has-error' : '' }}">
            <input type="password" name="password" class="form-control" placeholder="Contraseña" required />
            <span class="glyphicon glyphicon-lock form-control-feedback"></span>
            @foreach ($errors->get('password') as $error)
                <p class="help-block">{{ $error }}</p>
            @endforeach
        </div>

        <div class="form-group has-feedback">
            <input type="password" name="password_confirmation" class="form-control" placeholder="Repetir Contraseña" required />
            <span class="glyphicon glyphicon-lock form-control-feedback"></span>
        </div>

        <div class="row">
            <div class="col-xs-12 text-right">
                <button type="submit" class="btn btn-primary btn-flat">Restablecer</button>
            </div>
        </div>
    </form>
@endsection
