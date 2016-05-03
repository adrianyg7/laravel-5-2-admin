@extends('layouts.admin')

@section('content')
    <section class="content-header">
        <h1>
            Usuarios
            <small>Lista de Usuarios</small>
        </h1>
        {!! app('App\Services\Breadcrumb')->make() !!}
    </section>
    <section class="content">
        <div class="box box-primary">
            <div class="box-header">

                @can ('admin.users.create')
                <a
                    href="{{ route('admin.users.create') }}"
                    class="btn btn-xs btn-success"
                >
                    <i class="fa fa-plus"></i>
                    Nuevo Usuario
                </a>
                @endcan

            </div>
            <div class="box-body">

                <table class="table table-bordered table-striped table-hover data-table">
                    <thead>
                        <tr>
                            <th>Nombre</th>
                            <th>E-mail</th>
                            <th>Roles</th>
                            <th>Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($users as $user)
                            <tr>
                                <td>{{ $user->present()->full_name }}</td>
                                <td>{{ $user->email }}</td>
                                <td>{{ $user->present()->roles }}</td>
                                <td>
                                
                                    @can ('admin.users.show')
                                    <a
                                        href="{{ route('admin.users.show', [$user]) }}"
                                        class="btn btn-xs btn-default"
                                        title="Ver"
                                    >
                                        <i class="fa fa-eye"></i>
                                    </a>
                                    @endcan

                                    @can ('admin.users.edit')
                                    <a
                                        href="{{ route('admin.users.edit', [$user]) }}"
                                        class="btn btn-xs btn-info"
                                        title="Editar"
                                    >
                                        <i class="fa fa-pencil"></i>
                                    </a>
                                    @endcan

                                    @can ('admin.users.destroy')
                                    <a
                                        href="{{ route('admin.users.destroy', [$user]) }}"
                                        class="btn btn-xs btn-danger"
                                        title="Eliminar"
                                        data-swal
                                        data-swal-token="{{ csrf_token() }}"
                                        data-swal-record="{{ $user->present()->full_name }}"
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
