@extends('layouts.layout')
@section('titolo')
    HomePage | BoolBnB
@endsection
@section('body')
       @include('partials.header')
       @include('partials.main')
       <div class="container">
           <div class="row">
                <h2>Featured apartments</h2>
                @foreach ($sponsorships as $sponsor)
                    @foreach ($apartments as $apartment)
                        @if ($apartment->id == $sponsor->apartment_id)
                            @php
                                date_default_timezone_set("Europe/Rome");
                                $today = date("Y-m-d H:i:s");
                            @endphp
                            @if ($sponsor->sponsor_end > $today)
                                <div class="card apartment-card" style="width: 18rem;">
                                    <a href="{{route('apartment', $apartment->id)}}" style="color: black">
                                        <img class="card-img-top" src="{{asset('storage/'. $apartment->image)}}" alt="{{$apartment->title}}">
                                        <div class="card-body">
                                            <h5 class="card-title">Appartamento {{$apartment->title}}</h5>
                                            <p class="card-text">Descrizione appartamento {{$apartment->id}}</p>
                                        </div>
                                        <div class="content invisible">
                                            <p class="latitude">{{$apartment->latitude}}</p>
                                            <p class="longitude">{{$apartment->longitude}}</p>
                                            <p class="id">{{$apartment->id}}</p>
                                            <p class="number_rooms">{{$apartment->number_rooms}}</p>
                                            <p class="number_beds">{{$apartment->number_beds}}</p>
                                        </div>
                                    </a>
                                </div>
                            @endif
                        @endif
                    @endforeach
                @endforeach
                <h2>Appartamenti</h2>
                <div class="apartments">
                    @foreach ($apartments as $apartment)
                        <div class="card apartment-card" style="width: 18rem;">
                            <a href="{{route('apartment', $apartment->id)}}" style="color: black">
                                <img class="card-img-top" src="{{asset('storage/'. $apartment->image)}}" alt="{{$apartment->title}}">
                                <div class="card-body">
                                    <h5 class="card-title">Appartamento {{$apartment->title}}</h5>
                                    <p class="card-text">Descrizione appartamento {{$apartment->id}}</p>
                                </div>
                                <div class="content invisible">
                                    <p class="latitude">{{$apartment->latitude}}</p>
                                    <p class="longitude">{{$apartment->longitude}}</p>
                                    <p class="id">{{$apartment->id}}</p>
                                    <p class="number_rooms">{{$apartment->number_rooms}}</p>
                                    <p class="number_beds">{{$apartment->number_beds}}</p>
                                    <p class="distance"></p>
                                </div>
                            </a>
                        </div>
                    @endforeach
                </div>
           </div>
       </div>
       @include('partials.footer')
@endsection
@section('script')
    <script src="{{asset('js/app.js')}}" charset="utf-8"></script>
@endsection
