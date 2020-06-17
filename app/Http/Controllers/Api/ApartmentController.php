<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Apartment;
use Illuminate\Support\Facades\DB;


class ApartmentController extends Controller
{
    public function getAll() {
        // $apartments = Apartment::all()->where('published', 1);
        $apt_services = DB::select('SELECT * FROM apartment_service');
        // $services = Service::all();
        // $services = $apartments[0]->services();

        // dd($services);

        return response()->json($apt_services);
    }
}
