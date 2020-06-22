@extends('layouts.layout')
@section('title')
    HomePage | BoolBnB
@endsection

@section('body')
       @include('partials.header')
       @include('partials.main')
       @include('partials.footer')
@endsection
@section('script')
    <script src="{{asset('js/app.js')}}" charset="utf-8"></script>
    <script src="https://kit.fontawesome.com/4aa4c430a6.js" crossorigin="anonymous"></script>
@endsection
