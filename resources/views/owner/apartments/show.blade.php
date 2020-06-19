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
@endsection
