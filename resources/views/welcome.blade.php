@extends('layouts.layout')
@section('titolo')
    HomePage | BoolBnB
@endsection
@section('body')
       @include('partials.header')
       @include('partials.main')
       <div class="container">
           <div class="row">
                   @foreach ($apartments as $apartment)
                       <div class="card apartment-card" style="width: 18rem;">
                            <img class="card-img-top" src="{{asset('storage/'. $apartment->image)}}" alt="{{$apartment->title}}">
                            <div class="card-body">
                                <h5 class="card-title">Appartamento {{$apartment->title}}</h5>
                                <p class="card-text">Descrizione appartamento {{$apartment->id}}</p>
                                <p class="latitude invisible">{{$apartment->latitude}}</p>
                                <p class="longitude invisible">{{$apartment->longitude}}</p>
                                <p class="id invisible">{{$apartment->id}}</p>
                            </div>
                        </div>
                   @endforeach
           </div>
       </div>
       @include('partials.footer')
@endsection
@section('script')
    <script src="{{asset('js/app.js')}}" charset="utf-8"></script>
    <script src="https://kit.fontawesome.com/4aa4c430a6.js" crossorigin="anonymous"></script>
@endsection
