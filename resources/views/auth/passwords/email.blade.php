@extends('layouts.auth')

@section('content')
    <p class="login-box-msg">Recuperar Contraseña</p>
    
    @if (session('status'))
        <div class="text-info">
            {{ session('status') }}
        </div>
    @else
        <form action="/password/email" method="post">

            {!! csrf_field() !!}

            <div class="form-group has-feedback {{ $errors->has('email') ? 'has-error' : '' }}">
                <input type="email" name="email" class="form-control" value="{{ old('email') }}" placeholder="Correo" required />
                <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
                @foreach ($errors->get('email') as $error)
                    <p class="help-block">{{ $error }}</p>
                @endforeach
            </div>

            <div class="row">
                <div class="col-xs-12 text-right">
                    <button type="submit" class="btn btn-primary btn-flat">Recuperar</button>
                </div>
            </div>
        </form>
    @endif
@endsection
