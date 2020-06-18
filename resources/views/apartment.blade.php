@extends('layouts.layout')
@section('titolo')
    HomePage | BoolBnB
@endsection

@section('body')
       @include('partials.header')

        @if ($apartment->published == 1)
            <h1>Title: {{$apartment->title}}</h1>
            <img class="img-fluid" src="{{asset('storage/'. $apartment->image)}}" alt="{{$apartment->title}}">
            <div>
              <h4>Services</h4>
              <ul>
              @foreach ($apartment->services as $service)
                <li>{{$service->service_name}}</li>
              @endforeach
              </ul>
            </div>
            <h4>Number of rooms: {{$apartment->number_rooms}}</h4>
            <h4>Number of beds: {{$apartment->number_beds}}</h4>
            <h4>Number of bathrooms: {{$apartment->number_bathrooms}}</h4>
            <h4>Sqmt: {{$apartment->sqmt}}</h4>
        @endif
        @if ($apartment->published == 0)
            <h1>Questo appartamento non è stato pubblicato</h1>
        @endif
            <iframe  width="100%" height="500" src="https://maps.google.com/maps?q={{$apartment->latitude}},{{$apartment->longitude}}&output=embed"></iframe>

       @include('partials.footer')

@endsection
@section('script')
    <script src="{{asset('js/app.js')}}" charset="utf-8"></script>
    <script src="https://kit.fontawesome.com/4aa4c430a6.js" crossorigin="anonymous"></script>
@endsection
