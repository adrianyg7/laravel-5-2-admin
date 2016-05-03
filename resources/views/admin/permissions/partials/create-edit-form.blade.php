{!! BSForm::open([
    'model' => $permission, 
    'store' => 'admin.permissions.store', 
    'update' => 'admin.permissions.update'
]) !!}

    {!! BSForm::text('name', 'Nombre', null, ['required']) !!}

    {!! BSForm::text('description', 'Descripción', null, ['required']) !!}

    {!! BSForm::submit('Guardar') !!}

{!! BSForm::close() !!}
