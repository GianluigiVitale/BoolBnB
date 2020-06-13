<?php

namespace App\Http\Controllers\Owner;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Apartment;
use App\Service;


class ApartmentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
       $services = Service::all();
       return view('owner.apartments.create', compact('services'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $request->all();
        $data['image'] = $request->image->store('images');

        $validator = Validator::make($data, [
            'title' => 'required|string|max:50',
            'number_rooms' => 'required|integer|min:1',
            'number_beds' => 'required|integer|min:1',
            'number_bathrooms' => 'required|integer|min:1',
            'sqmt' => 'required|integer|min:1',
            'published' => 'required|boolean',
            'latitude' => 'required',
            'longitude' => 'required',
            'image' => 'required',
            'services.*' => 'exists:services,id'
        ]);

        if ($validator->fails()) {
            return redirect()->route('owner.apartments.create')
            ->withErrors($validator)
            ->withInput();
        }
        $apartment = new Apartment;
        $data['user_id'] = Auth::id();
        $apartment->fill($data);

        $saved = $apartment->save();
        if (!$saved) {
            abort('404');
        }

        $apartment->services()->attach($data['services']);
        // dd($apartment);
        return view('welcome');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
