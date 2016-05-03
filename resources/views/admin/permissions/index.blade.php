@extends('layouts.admin')

@section('content')
    <section class="content-header">
        <h1>
            Permisos
            <small>Lista de Permisos</small>
        </h1>
        {!! app('App\Services\Breadcrumb')->make() !!}
    </section>
    <section class="content">
        <div class="box box-primary">
            <div class="box-header">

                @can ('admin.permissions.create')
                <a
                    href="{{ route('admin.permissions.create') }}"
                    class="btn btn-xs btn-success"
                >
                    <i class="fa fa-plus"></i>
                    Nuevo Permiso
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
                        @foreach ($permissions as $permission)
                            <tr>
                                <td>{{ $permission->name }}</td>
                                <td>{{ $permission->description }}</td>
                                <td>

                                    @can ('admin.permissions.show')
                                    <a
                                        href="{{ route('admin.permissions.edit', [$permission]) }}"
                                        class="btn btn-xs btn-info"
                                        title="Editar"
                                    >
                                        <i class="fa fa-pencil"></i>
                                    </a>
                                    @endcan

                                    @can ('admin.permissions.show')
                                    <a
                                        href="{{ route('admin.permissions.destroy', [$permission]) }}"
                                        class="btn btn-xs btn-danger"
                                        title="Eliminar"
                                        data-swal
                                        data-swal-token="{{ csrf_token() }}"
                                        data-swal-record="{{ $permission->description }}"
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
