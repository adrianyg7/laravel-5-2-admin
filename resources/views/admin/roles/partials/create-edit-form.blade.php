@inject('roleFiller', 'App\Fillers\RoleFiller')

{!! BSForm::open([
    'model' => $role, 
    'store' => 'admin.roles.store', 
    'update' => 'admin.roles.update'
]) !!}

    {!! BSForm::text('name', 'Nombre', null, ['required']) !!}

    {!! BSForm::text('description', 'Descripción', null, ['required']) !!}

    <div class="form-group ">
        <label class="control-label {{ config('bootstrap_form.left_column_class') }}">
            &nbsp;
        </label>
        <div class="{{ config('bootstrap_form.right_column_class') }}">
            {!! $roleFiller->permissionsTree($role->permissions) !!}
        </div>
    </div>

    {!! BSForm::submit('Guardar') !!}

{!! BSForm::close() !!}
