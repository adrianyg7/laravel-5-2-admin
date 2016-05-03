@extends('layouts.master')

@section('title')
    <title>{{ config('constants.project-title') }}</title>
@endsection

@push('styles')
    {!! HTML::style('css/admin.css') !!}
@endpush

@section('body-class', 'hold-transition skin-blue-light sidebar-mini')

@section('body')
    <div class="wrapper">

        @include('layouts.partials.header')
        @include('layouts.partials.side-bar')

        <div class="content-wrapper">
            @yield('content')
        </div>

        @include('layouts.partials.footer')
    </div>
@endsection

@push('scripts')
    @include('back-vars')
    {!! HTML::script('js/admin.js') !!}
    <script>
        Helpers.iCheck();
        Helpers.dataTables();
        Helpers.deleteSwal();
        Helpers.flashMessaging();
        Helpers.requiredFields();
        Helpers.select2();
    </script>
@endpush
