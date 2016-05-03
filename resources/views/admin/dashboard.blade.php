@extends('layouts.admin')

@section('content')
    <section class="content-header">
        <h1>
            Dashboard
        </h1>
        {!! app('App\Services\Breadcrumb')->make() !!}
    </section>
    <section class="content">
        <div class="box box-primary">
            <div class="box-header">
                <h3 class="box-title">
                    Dashboard
                </h3>
            </div>
            <div class="box-body">

                
                
            </div>
        </div>
    </section>
@endsection
