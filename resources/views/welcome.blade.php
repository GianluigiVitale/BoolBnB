@extends('layouts.layout')
@section('title')
    HomePage | BoolBnB
@endsection

@section('body')
    @include('partials.header')
       @include('partials.main')
       <div class="container">
           <div class="row">
                <div class="col-12 text-center">
                    <h2>Filter By Services</h2>
                    <div class="bb-flex">
                        @foreach ($services as $service)
                        <div class="service-list" class="form-check ">
                           <input class="form-check-input " type="checkbox" value="{{$service->id}}" autocomplete="off" id="{{$service->service_name}}">
                           <label class="form-check-label " for="{{$service->service_name}}">{{$service->service_name}}</label>
                        </div>
                        @endforeach
                    </div>
                    @if (count($sponsorships) > 0)
                        <h2>Featured apartments</h2>
                        <p class="featured" style="display: none">No apartments found.</p>
                    @endif
                    <div class="apartmentss">
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
                                                    <h5 class="card-title">{{$apartment->title}}</h5>
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
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-12 text-center">
                    @if (count($apartments) > 0)
                        <h2>Apartments</h2>
                        <p id="cards-name" style="display: none">No apartments found.</p>
                    @endif
                    <div class="apartments">
                        @foreach ($apartments as $apartment)
                            <div class="card text-center apartment-card" style="width: 18rem;">
                                <a href="{{route('apartment', $apartment->id)}}" style="color: black">
                                    <img class="card-img-top" src="{{asset('storage/'. $apartment->image)}}" alt="{{$apartment->title}}">
                                    <div class="card-body">
                                        <h5 class="card-title">{{$apartment->title}}</h5>
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
       </div>
       @include('partials.footer')
@endsection
