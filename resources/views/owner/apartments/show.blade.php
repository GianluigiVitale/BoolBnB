@php
    use Illuminate\Support\Facades\Storage;
@endphp

@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-12">
                <h2>{{$apartment->title}}</h2>
                <small>Last Modified: {{$apartment->updated_at}}</small>

                @if($apartment->services->count() > 0)
                    <div>
                        <h4>Services</h4>
                        <ul>
                            @foreach ($apartment->services as $service)
                                <li>{{$service->service_name}}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <img class="img-fluid" src="{{asset('storage/'. $apartment->image)}}" alt="{{$apartment->title}}">
            </div>
            <div class="col-12">
                <h2>Received Messages</h2>
                @foreach ($apartment->messages as $message)
                    <div class="message">
                        <h3>{{$message->email}}</h3>
                        <p>{{$message->message}}</p>
                    </div>
                @endforeach
            </div>
        </div>
    </div>

    <div class="container">
        <div class="row">
            <div class="col-12">
                <form action="{{route('owner.apartments.sponsorship')}}" method="post">
                    @csrf
                    @method('POST')
                    <input type="text" name="apartment_id" value="{{$apartment->id}}" style="display: none">
                    <div class="form-group">
                        @foreach ($packages as $package)
                            <div class="form-check">
                                <input name="package_id" type="radio" value="{{$package->id}}" checked>
                                <label for="package_id">Sponsorizza per {{$package->sponsorship_cost}}€ - {{$package->sponsorship_duration}} ore</label>
                            </div>
                        @endforeach
                    </div>

                    <div class="form-group">
                        <div id="dropin-container"></div>
                        <button id="submit-button">Verifica metodo di pagamento</button>
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
