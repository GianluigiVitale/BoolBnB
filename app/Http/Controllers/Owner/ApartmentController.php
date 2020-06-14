<?php

namespace App\Http\Controllers\Owner;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
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
        $apartments = Apartment::all();

        return view('owner.apartments.index', compact('apartments'));
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

        // $data['image'] = Storage::disk('public')->put('images', $data['image']);

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
        // return view('welcome');

        return redirect()->route('owner.apartments.show', $apartment->id);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $apartment = Apartment::findOrFail($id);

        return view('owner.apartments.show', compact('apartment'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $apartment = Apartment::findOrFail($id);
        $services = Service::all();

        return view('owner.apartments.edit', compact('apartment', 'services'));
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
        $data = $request->all();
        $apartment = Apartment::findOrFail($id);
        $userId = Auth::id();
        $author = $apartment->user_id;

        if ($userId != $author) {
            abort('404');
        }

        $data['image'] = $request->image->store('images');

        // $data['image'] = Storage::disk('public')->put('images', $data['image']);

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

        if ($validator->fails() || empty($data['services'])) {
            return redirect()->back()
            ->withErrors($validator)
            ->withInput();
        }


        $apartment->fill($data);

        $updated = $apartment->update();
        if (!$updated) {
            return redirect()->back();
        }

        $apartment->services()->sync($data['services']);
        // dd($apartment);
        // return view('welcome');

        return redirect()->route('owner.apartments.show', $apartment->id);
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
