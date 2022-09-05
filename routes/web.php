<?php

use App\Http\Controllers\ListingController;
use App\Http\Controllers\UserController;
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



Route::get('/', [ListingController::class, "index"]);

//listings

Route::get('listings/{list}', [ListingController::class, "show"])->where("list", "[0-9]+");

Route::get('listings/create', [ListingController::class, "create"]);

Route::get('listings/{list}/edit', [ListingController::class, "edit"])->where("list", "[0-9]+");

Route::post('listings/', [ListingController::class, "store"]);

Route::put('listings/{list}', [ListingController::class, "update"])->where("list", "[0-9]+");

Route::delete('listings/{list}', [ListingController::class, "destroy"])->where("list", "[0-9]+");


//users
Route::get("/users/sign-up", [UserController::class, "create"]);

Route::get("/users/login", [UserController::class, "login"]);

Route::post("/users/login", [UserController::class, "authenticate"]);

Route::post("/users", [UserController::class, "store"]);

Route::post("/users/logout", [UserController::class, "logout"]);
