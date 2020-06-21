<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Apartment;
use App\Service;
use App\User;
use App\Sponsorship;
use Illuminate\Support\Facades\DB;


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
        return view('welcome', compact('apartments'));
    }

    public function indexPublished()
    {
        $apartments = Apartment::where('published', 1)->get();
        $services = Service::all();

        return view('welcome', compact('apartments', 'services'));
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
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
        $user_logged = Auth::id();

        $user_email = DB::table('users')->where('id', $user_logged)->pluck('email')->first();

        if ($apartment->published == 0) {
            abort('404');
        } else {
            return view('apartment', compact('apartment', 'user_email'));
        }
    }

    // public function showPublished($id)
    // {
    //     $apartments = Apartment::where('published', 1)->get();
    //     return view('apartment', compact('apartments'));
    // }

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
