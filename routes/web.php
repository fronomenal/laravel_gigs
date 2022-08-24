<?php

use App\Models\Listing;
use Illuminate\Support\Facades\Route;

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

Route::get('/', function () {
    return view("listings", ["gigs" => Listing::all()]);
});

Route::get('list/{list}', function (Listing $list) {

    return view("listing", ["gig" => $list]);

})->where("list", "[0-9]+");
