<!DOCTYPE html>
<html class="h-100" lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{env('APP_NAME')}}</title>
    <link href="{{asset('css/bootstrap.min.css')}}" rel="stylesheet">
    <!-- Custom styles for this template -->
    <link href="{{asset('css/cover.css')}}" rel="stylesheet">
    <meta name="csrf-token" content="{{ csrf_token() }}">
</head>
<body class="d-flex h-auto text-center text-bg-dark">
<div class="container d-flex w-100 h-100 p-3 mx-auto flex-column">
    @include('jobboard.layouts.components.header')
    @yield('content')
    @include('jobboard.layouts.components.footer')
</div>
</body>
</html>
