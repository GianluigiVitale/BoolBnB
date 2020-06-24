<?php

namespace App\Http\Controllers\Owner;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;
use App\Apartment;
use App\Service;
use App\Package;
use App\Sponsorship;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;


class ApartmentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $userId = Auth::id();
        $apartments = Apartment::where('user_id', $userId)->get();


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
        //$data['image'] = $request->image->store('images');

        $data['image'] = Storage::disk('public')->put('images', $data['image']);

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
            return redirect()->route('owner.apartments.create')->with('failure', 'Apartment not added.')
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

        return redirect()->route('owner.apartments.show', $apartment->id)->with('success', 'Apartment Added.');
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
        $packages = Package::all();

        return view('owner.apartments.show', compact('apartment', 'packages'));
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

        //$data['image'] = $request->image->store('images');

        $data['image'] = Storage::disk('public')->put('images', $data['image']);

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
            return redirect()->back()->with('failure', 'Apartment not added.')
            ->withErrors($validator)
            ->withInput();
        }


        $apartment->fill($data);

        $updated = $apartment->update();
        if (!$updated) {
            return redirect()->back()->with('failure', 'Apartment not added.');
        }

        $apartment->services()->sync($data['services']);
        // dd($apartment);
        // return view('welcome');

        return redirect()->route('owner.apartments.show', $apartment->id)->with('success', 'Apartment Edited.');;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {

        $userId = Auth::id();
        $apartment = Apartment::findOrFail($id);
        if ($userId != $apartment->user_id) {
            abort('404');
        }

        //se abbiamo many to many dobbiamo cancellare record in tabella ponte
        $apartment->messages()->delete();
        $apartment->services()->detach();
        DB::table('sponsorships')->where('apartment_id', $apartment->id)->delete();
        $apartment->delete();

        return redirect()->back()->with('success', 'Aparment Deleted.');
    }

    public function sponsorship(Request $request)
    {
        $data = $request->all();
        $sponsor_duration = DB::table('packages')->where('id', $data['package_id'])->pluck('sponsorship_duration')->first();


        if (!isset($data['package_id'])) {
            return redirect()->back()->with('failure', 'Package not selected.');
        }

        $endDate = Carbon::now('Europe/Rome')->locale('it')->addHours($sponsor_duration)->format('Y-m-d, H:m:s');

        $check = DB::table('sponsorships')->where('apartment_id', $data['apartment_id'])->pluck('apartment_id')->first();

        if ($check !== null) {
            $existing_end_date = DB::table('sponsorships')->where('apartment_id', $data['apartment_id'])->pluck('sponsor_end')->first();
            // dd($existing_end_date);

            $new_end_date = Carbon::createFromDate($existing_end_date)->addHours($sponsor_duration);

            DB::table('sponsorships')->where('apartment_id', $data['apartment_id'])->update(array('sponsor_end' => $new_end_date));

            return redirect()->route('welcome')->with('success', 'Apartment sponsored.');
        }

        $data['sponsor_end'] = $endDate;

        $sponsor = new Sponsorship;
        $sponsor->fill($data);

        $saved = $sponsor->save();
        if (!$saved) {
            abort('404');
        }

        return redirect()->route('welcome')->with('success', 'Apartment sponsored.');
    }
}
