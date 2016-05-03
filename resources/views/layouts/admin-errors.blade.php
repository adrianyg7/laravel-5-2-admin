@extends('layouts.admin')

@section('content')
    <div class="row text-center">
        <div class="col-xs-6 col-xs-offset-3">
            <div class="alert alert-danger">
                @yield('error')
            </div>
            <div>

                @if (URL::previous() != URL::current())
                <a href="{{ URL::previous() }}" class="btn btn-lg btn-warning">
                    <i class="fa fa-arrow-left"></i>
                    Atrás
                </a>
                @endif

                <a href="{{ route('admin.dashboard') }}" class="btn btn-lg btn-info">
                    <i class="fa fa-dashboard"></i>
                    Inicio
                </a>
            </div>
        </div>
    </div>
@endsection
