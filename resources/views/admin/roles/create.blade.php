@extends('layouts.admin')

@section('content')
    <section class="content-header">
        <h1>
            Rol
        </h1>
        {!! app('App\Services\Breadcrumb')->make() !!}
    </section>
    <section class="content">
        <div class="box box-primary">
            <div class="box-header">
                <h3 class="box-title">
                    <i class="fa fa-plus"></i>
                    Nuevo Rol
                </h3>
            </div>
            <div class="box-body">

                @include('admin.roles.partials.create-edit-form')

            </div>
        </div>
    </section>
@endsection
