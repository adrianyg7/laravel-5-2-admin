@inject('userFiller', 'App\Fillers\UserFiller')

{!! BSForm::open([
    'model' => $user,
    'store' => 'admin.users.store',
    'update' => 'admin.users.update'
]) !!}

    {!! BSForm::text('first_name', 'Nombre', null, ['required']) !!}

    {!! BSForm::text('last_name', 'Apellidos', null, ['required']) !!}

    {!! BSForm::email('email', 'E-mail', null, ['required']) !!}

    @if ( ! $user->exists )
        {!! BSForm::password('password', 'Contraseña', ['required']) !!}
    @endif

    {!! BSForm::select(
        'roles_list[]', 
        'Roles', 
        $userFiller->roles(), 
        $user->roles->lists('id')->all(), 
        [
            'required',
            'multiple',
            'class' => 'select2'
        ]
    ) !!}

    {!! BSForm::submit('Guardar') !!}

{!! BSForm::close() !!}
