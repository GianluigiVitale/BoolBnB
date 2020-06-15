@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-12">
                <table>
                    <thead>
                        <tr>
                            {{-- <th>ID</th> --}}
                            <th>Title</th>
                            <th>Number of Rooms</th>
                            <th>Number of Beds</th>
                            <th>Number of Bathrooms</th>
                            <th>Square Meters</th>
                            <th>Published?</th>
                            <th>Latitude</th>
                            <th>Longitude</th>
                            <th>Tags</th>
                            <th>Date Created</th>
                            <th>Date Updated</th>
                            <th colspan="3">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($apartments as $apartment)
                           <tr>
                               {{-- <td>{{$$apartment->id}}</td> --}}
                               <td>{{$apartment->title}}</td>
                               <td>{{$apartment->number_rooms}}</td>
                               <td>{{$apartment->number_beds}}</td>
                               <td>{{$apartment->number_bathrooms}}</td>
                               <td>{{$apartment->sqmt}}</td>
                               <td>{{$apartment->published}}</td>
                               <td>{{$apartment->latitude}}</td>
                               <td>{{$apartment->longitude}}</td>
                               <td>{{$apartment->created_at}}</td>
                               <td>{{$apartment->updated_at}}</td>
                               <td><a class="btn btn-primary" href="{{route('owner.apartments.show', $apartment->id)}}">View</a></td>
                               <td><a class="btn btn-primary" href="{{route('owner.apartments.edit', $apartment->id)}}">Modify</a></td>
                               <td>
                                <form action="{{route('owner.apartments.destroy', $apartment->id)}}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <input class="btn btn-danger" type="submit" value="Delete">
                                  </form>
                                </td>
                           </tr> 
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection