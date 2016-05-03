@extends('layouts.master')

@push('styles')
    <link href="https://fonts.googleapis.com/css?family=Lato:100" rel="stylesheet" type="text/css" />
    {!! HTML::style('css/errors.css') !!}
@endpush

@section('body')
    <div class="container">
        <div class="content">
            @yield('content')
        </div>
    </div>
@endsection
