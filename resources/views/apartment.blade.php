@extends('layouts.layout')
@section('titolo')
    HomePage | BoolBnB
@endsection

@section('body')
       @include('partials.header')

        <div class="container gv-show">
            <div class="row justify-content-center">
                <div class="col-md-12">
                    @if ($apartment->published == 1)
                        <h1>{{$apartment->title}}</h1>
                        <div class="gv-content">
                            <img class="img-fluid col-md-6" src="{{asset('storage/'. $apartment->image)}}" alt="{{$apartment->title}}">
                            <iframe class="col-md-6" src="https://maps.google.com/maps?q={{$apartment->latitude}},{{$apartment->longitude}}&output=embed"></iframe>
                        </div>
                        <p>{{$apartment->number_rooms}} rooms • {{$apartment->number_beds}} bedrooms • {{$apartment->number_bathrooms}} bathrooms • {{$apartment->sqmt}} sqmt</p>
                        <div class="gv-infoapartment">
                            <h4>Services</h4>
                            @foreach ($apartment->services as $service)
                                <span>{{$service->service_name}}</span>
                                <span>•</span>
                            @endforeach
                        </div>
                    @endif
                </div>
            </div>
        </div>
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-12 gv-message-section">
                    <h4>Send a Message to the Owner</h4>
                    {{-- <div class="card"> --}}
                        <form action="{{route('messages.store')}}" method="post">
                            @csrf
                            @method('POST')
                            <div class="form-group">
                                <label for="email">Email</label>
                                <input type="text" name="email" class="form-control" value="{{(!empty($user_email)) ? $user_email : old('email')}}">
                            </div>
                            @error('email')
                                <div class="alert alert-danger">{{$message}}</div>
                            @enderror
                            <div class="form-group">
                                <label for="message">Message</label>
                                <textarea class="form-control" name="message" rows="8" cols="80">{{old('message')}}</textarea>
                            </div>
                            @error('message')
                                <div class="alert alert-danger">{{$message}}</div>
                            @enderror
                            <input type="text" name="apartment_id" value="{{$apartment->id}}" style="display: none">
                            <input type="submit" value="Invia" class="btn btn-primary kp--btn">
                        </form>
                    {{-- </div> --}}
                </div>
            </div>
        </div>
       @include('partials.footer')

@endsection
@section('script')
    <script src="{{asset('js/app.js')}}" charset="utf-8"></script>
    <script src="https://kit.fontawesome.com/4aa4c430a6.js" crossorigin="anonymous"></script>
@endsection
