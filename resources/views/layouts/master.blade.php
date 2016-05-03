<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, minimum-scale=1, maximum-scale=1">
        @yield('title')
        @stack('styles')
        @include('layouts.partials.ie8-support')
    </head>
    <body class="@yield('body-class')">
        @yield('body')
        @stack('scripts')
    </body>
</html>
