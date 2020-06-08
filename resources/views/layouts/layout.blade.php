<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('titolo')</title>
    <link rel="stylesheet" href="{{asset('css/app.css')}}">
    @yield('bootstrap')
</head>
<body>
@include('partials.header')
@include('partials.main')
@include('partials.footer')
</body>
@yield('script')
{{-- scripts --}}
</html>
