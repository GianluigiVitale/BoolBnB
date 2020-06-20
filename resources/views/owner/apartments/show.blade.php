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

                {{-- @dd($page->tags->count()) --}}
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
            <div class="col-md-8 col-md-offset-2">
                <div id="dropin-container"></div>
                <button id="submit-button">Verifica metodo di pagamento</button>
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
                            console.log('ciaooo');
                        } else {
                            alert('Payment failed');
                        }
                    }, 'json');
                });
            });
        });
    </script>
@endsection
