<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Auth::routes();
//rotte dell'admin
Route::prefix('owner')
->name('owner.')
->namespace('Owner')
->middleware('auth')
->group(function(){
    Route::get('/', 'UserController@index')->name('index');
    Route::resource('apartments', 'ApartmentController');
});

// Rotta d'entrata in cui ricercare un appartamento
Route::get('/', 'ApartmentController@indexPublished')->name('welcome');
Route::get('/{id}', 'ApartmentController@show')->name('apartment');

// Dashboard
Route::get('/home', 'HomeController@index')->name('home');



// Route::post('/upload', function (Request $request) {
//     $request->image->store('images');
//     // dd($request->hasFile('image'));
//     return 'uploaded';
// });

// Route::get('/', function () {
//     return view('welcome');
// });


//
