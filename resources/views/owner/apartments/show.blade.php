@php
    use Illuminate\Support\Facades\Storage;
@endphp
@extends('layouts.app')
@section('title')
    {{$apartment->title}}
@endsection
@include('partials.header')
@section('content')

    <div class="container gv-show">
        <div class="row justify-content-center">
            <div class="col-12">
                <h1>{{$apartment->title}}</h1>
                <div class="gv-content">
                    <div class="div-img">
                        <img class="img-fluid" src="{{asset('storage/'. $apartment->image)}}" alt="{{$apartment->title}}">
                    </div>
                    <iframe src="https://maps.google.com/maps?q={{$apartment->latitude}},{{$apartment->longitude}}&output=embed"></iframe>
                </div>
                <p>{{$apartment->number_rooms}} rooms • {{$apartment->number_beds}} bedrooms • {{$apartment->number_bathrooms}} bathrooms • {{$apartment->sqmt}} sqmt</p>
                @if($apartment->services->count() > 0)
                    <div class="gv-infoapartment">
                        <h4>Services</h4>
                        @foreach ($apartment->services as $service)
                            <span>{{$service->service_name}}</span>
                            <span>•</span>
                        @endforeach
                    </div>
                @endif
            </div>
            <div class="col-12 gv-messages">
                <h4>Received Messages</h4>
                <ul>
                    @if (count($apartment->messages) > 0)
                        @foreach ($apartment->messages as $message)
                            <li>
                                <div class="message">
                                    <h3>{{$message->email}}</h3>
                                    <p>{{$message->message}}</p>
                                </div>
                            </li>
                        @endforeach
                    @else
                        <div class="message">
                            <p>No messages to show</p>
                        </div>
                    @endif

                </ul>
            </div>
        </div>
    </div>

    <div class="container">
        <div class="row">
            <div class="col-12 gv-sponsorship">
                <h4>Sponsor Your Apartment</h4>
                <form action="{{route('owner.apartments.sponsorship')}}" method="post">
                    @csrf
                    @method('POST')
                    <input type="text" name="apartment_id" value="{{$apartment->id}}" style="display: none">
                    <div class="form-group">
                        @foreach ($packages as $package)
                            <div class="form-check">
                                <input name="package_id" type="radio" value="{{$package->id}}" checked>
                                <label for="package_id">Sponsor for {{$package->sponsorship_cost}}€ - {{$package->sponsorship_duration}} hours</label>
                            </div>
                        @endforeach
                    </div>

                    <div class="form-group">
                        <div id="dropin-container"></div>
                        <button class="btn btn-primary kp--btn" id="submit-button">Check payment method</button>
                    </div>
                </form>
            </div>
        </div>
    </div>


    <script>
        var button = document.querySelector('#submit-button');
        braintree.dropin.create({
            authorization: "sandbox_mfmy9pgq_frjwywz5p4yb7rgj",
            container: '#dropin-container'
        }, function (createErr, instance) {
            button.addEventListener('click', function () {
                instance.requestPaymentMethod(function (err, payload) {
                    $.get('{{route('payments.process')}}', {payload}, function (response) {
                        if (response.success) {
                            alert('Payment successfull');
                        } else {
                            alert('Payment failed');
                        }
                    }, 'json');
                });
            });
        });
    </script>
@endsection
