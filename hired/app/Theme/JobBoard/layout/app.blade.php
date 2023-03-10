@props([
    'heroText' => $heroText ?? false,
    'sloganText' => $sloganText ?? false
])
<!DOCTYPE html>
<html class="h-100" lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{env('APP_NAME')}}</title>
    <link href="{{asset('css/bootstrap.min.css')}}" rel="stylesheet">
    <link href="{{asset('css/font-awesome-6.3.0.min.css')}}" rel="stylesheet">
    <!-- Custom styles for this template -->
    <link href="{{asset('css/cover.css')}}" rel="stylesheet">
    <meta name="csrf-token" content="{{ csrf_token() }}">
</head>
<body class="d-flex h-auto min-vh-100 text-center text-bg-dark">
<div class="container d-flex w-100 h-100 p-3 mx-auto flex-column">
    <x-jobboard::layout.header :heroText="$heroText"
                               :sloganText="$sloganText"
    />
{{--    <div class="mb-4">--}}
        {{ $slot }}
{{--    </div>--}}
    <x-jobboard::layout.footer></x-jobboard::layout.footer>
</div>
<script src="{{asset('js/bootstrap.min.js')}}"></script>
<script src="{{asset('js/jquery-3.6.3.min.js')}}"></script>
<script src="{{asset('js/popper-2.11.6.min.js')}}"></script>
</body>
</html>
