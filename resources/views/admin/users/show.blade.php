@extends('layouts.admin')

@section('content')
    <section class="content-header">
        <h1>
            Usuario
        </h1>
        {!! app('App\Services\Breadcrumb')->make() !!}
    </section>
    <section class="content">
        <div class="box box-primary">
            <div class="box-header">
                <h3 class="box-title">
                    {{ $user->present()->full_name }}
                </h3>
            </div>
            <div class="box-body">

                <div class="row">
                    <strong class="col-xs-3 text-right">Nombre:</strong>
                    <div class="col-xs-9">{{ $user->first_name }}</div>
                </div>
                <div class="row">
                    <strong class="col-xs-3 text-right">Apellidos:</strong>
                    <div class="col-xs-9">{{ $user->last_name }}</div>
                </div>
                <div class="row">
                    <strong class="col-xs-3 text-right">E-mail:</strong>
                    <div class="col-xs-9">{{ $user->email }}</div>
                </div>
                <div class="row">
                    <strong class="col-xs-3 text-right">Roles:</strong>
                    <div class="col-xs-9">{{ $user->present()->roles }}</div>
                </div>
                
            </div>
        </div>

        @if (auth()->id() == $user->id)
        <div class="box box-info">
            <div class="box-header">
                <h3 class="box-title">
                    Cambiar Contraseña
                </h3>
            </div>
            <div class="box-body">

                {!! BSForm::open([
                    'model' => $user,
                    'update' => 'admin.users.update-password'
                ]) !!}

                    {!! BSForm::password('old_password', 'Contraseña Actual', ['required']) !!}

                    {!! BSForm::password('new_password', 'Nueva Contraseña', ['required']) !!}

                    {!! BSForm::submit('Guardar') !!}

                {!! BSForm::close() !!}
                
            </div>
        </div>
        @endif

    </section>
@endsection
