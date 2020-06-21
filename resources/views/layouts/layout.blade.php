<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- CSRF Token -->
<meta name="csrf-token" content="{{ csrf_token() }}">
<title>@yield('titolo')</title>
<link rel="stylesheet" href="{{asset('css/app.css')}}">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/leaflet/1/leaflet.css" />
<script src="https://cdn.jsdelivr.net/npm/places.js@1.19.0"></script>
<script src="https://cdn.jsdelivr.net/leaflet/1/leaflet.js"></script>
</head>
<body>
    @if ($message = Session::get('success'))
        <div class="alert alert-success">
            {{$message}}
        </div>
    @endif
    @if ($message = Session::get('failure'))
        <div class="alert alert-danger">
            {{$message}}
        </div>
    @endif
@yield('body')
</body>
@yield('script')
{{-- scripts --}}
</html>
