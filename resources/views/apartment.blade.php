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
            <iframe  width="100%" height="500" src="https://maps.google.com/maps?q={{$apartment->latitude}},{{$apartment->longitude}}&output=embed"></iframe>

        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-8">
                    <div class="card">
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
                                <input type="text" name="message" class="form-control" value="{{old('message')}}">
                            </div>
                            @error('message')
                                <div class="alert alert-danger">{{$message}}</div>
                            @enderror
                            <input type="text" name="apartment_id" value="{{$apartment->id}}" style="display: none">
                            <input type="submit" value="Salva" class="btn btn-primary">
                        </form>
                    </div>
                </div>
            </div>
        </div>
       @include('partials.footer')

@endsection
@section('script')
    <script src="{{asset('js/app.js')}}" charset="utf-8"></script>
    <script src="https://kit.fontawesome.com/4aa4c430a6.js" crossorigin="anonymous"></script>
@endsection
