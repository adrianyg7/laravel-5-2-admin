@extends('layouts.admin')

@section('content')
    <section class="content-header">
        <h1>
            Roles
            <small>Lista de Roles</small>
        </h1>
        {!! app('App\Services\Breadcrumb')->make() !!}
    </section>
    <section class="content">
        <div class="box box-primary">
            <div class="box-header">

                @can ('admin.roles.create')
                <a
                    href="{{ route('admin.roles.create') }}"
                    class="btn btn-xs btn-success"
                >
                    <i class="fa fa-plus"></i>
                    Nuevo Rol
                </a>
                @endcan

            </div>
            <div class="box-body">

                <table class="table table-bordered table-striped table-hover data-table">
                    <thead>
                        <tr>
                            <th>Nombre</th>
                            <th>Descripción</th>
                            <th>Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($roles as $role)
                            <tr>
                                <td>{{ $role->name }}</td>
                                <td>{{ $role->description }}</td>
                                <td>

                                    @can ('admin.roles.show')
                                    <a
                                        href="{{ route('admin.roles.edit', [$role]) }}"
                                        class="btn btn-xs btn-info"
                                        title="Editar"
                                    >
                                        <i class="fa fa-pencil"></i>
                                    </a>
                                    @endcan

                                    @can ('admin.roles.show')
                                    <a
                                        href="{{ route('admin.roles.destroy', [$role]) }}"
                                        class="btn btn-xs btn-danger"
                                        title="Eliminar"
                                        data-swal
                                        data-swal-token="{{ csrf_token() }}"
                                        data-swal-record="{{ $role->name }}"
                                    >
                                        <i class="fa fa-trash"></i>
                                    </a>
                                    @endcan
                                    
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
                
            </div>
        </div>
    </section>
@endsection
