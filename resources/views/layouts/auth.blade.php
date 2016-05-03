@extends('layouts.master')

@section('title')
    <title>{{ config('constants.project-title') }}</title>
@endsection

@push('styles')
    {!! HTML::style('css/auth.css') !!}
@endpush

@section('body-class', 'hold-transition login-page')

@section('body')
    <div class="login-box">
        <div class="login-logo">
            <img src="{{ asset('img/logo-lg.png') }}" class="logo-lg" />
        </div>
        <div class="login-box-body">
            @yield('content')
        </div>
    </div>
@endsection

@push('scripts')
    {!! HTML::script('js/auth.js') !!}
    <script>
        Helpers.iCheck();
    </script>
@endpush
