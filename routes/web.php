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

Route::get('listings/create', [ListingController::class, "create"])->middleware("auth");

Route::get('listings/{list}/edit', [ListingController::class, "edit"])->where("list", "[0-9]+")->middleware("auth");

Route::post('listings/', [ListingController::class, "store"])->middleware("auth");

Route::put('listings/{list}', [ListingController::class, "update"])->where("list", "[0-9]+")->middleware("auth");

Route::get('listings/manage', [ListingController::class, "manage"])->middleware("auth");

Route::delete('listings/{list}', [ListingController::class, "destroy"])->where("list", "[0-9]+")->middleware("auth");


//users
Route::get("/users/sign-up", [UserController::class, "create"])->middleware("guest");

Route::get("/users/login", [UserController::class, "login"])->name("login")->middleware("guest");

Route::post("/users/login", [UserController::class, "authenticate"])->middleware("guest");

Route::post("/users", [UserController::class, "store"]);

Route::post("/users/logout", [UserController::class, "logout"])->middleware("auth");
