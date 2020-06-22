@extends('layouts.app')
@section('title')
    Index | BoolBnB
@endsection
@include('partials.header')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-12 text-center">
                <h2>Your apartments</h2>
                <div class="apartments">
                    @foreach ($apartments as $apartment)
                        <div class="card text-center apartment-card" style="width: 18rem;">
                            <div class="kp--card-header">
                                <h5 class="card-title">{{$apartment->title}}</h5>
                                <img class="card-img-top" src="{{asset('storage/'. $apartment->image)}}" alt="{{$apartment->title}}">
                            </div>
                            <div class="card-btns">
                                <a class="btn btn-primary" href="{{route('owner.apartments.show', $apartment->id)}}">View</a>
                                <a class="btn btn-primary" href="{{route('owner.apartments.edit', $apartment->id)}}">Modify</a>
                                <form action="{{route('owner.apartments.destroy', $apartment->id)}}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <input class="btn btn-danger" type="submit" value="Delete">
                                </form>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
@endsection
