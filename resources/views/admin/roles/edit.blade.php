@extends('layouts.admin')

@section('content')
    <section class="content-header">
        <h1>
            Rol
            <small>{{ $role->name }}</small>
        </h1>
        {!! app('App\Services\Breadcrumb')->make() !!}
    </section>
    <section class="content">
        <div class="box box-primary">
            <div class="box-header">
                <h3 class="box-title">
                    <i class="fa fa-pencil"></i>
                    Editar Rol
                </h3>
            </div>
            <div class="box-body">

                @include('admin.roles.partials.create-edit-form')

            </div>
        </div>
    </section>
@endsection
