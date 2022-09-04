<?php

namespace App\Http\Controllers;

use App\Models\Listing;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class ListingController extends Controller
{   
    // Return all listings
    public function index(Request $request){
        $q = ["tag" => $request->tag, "search" => $request->search];
        return view("listings/index", ["gigs" => Listing::latest()->filter($q)->paginate(6)]);
    }

    //Return a single Listing
    public function show(Listing $list){

        return view("listings/show", ["gig" => $list]);
    }

    //show create form
    public function create(){

        return view("listings/create");
    }

    //adds new listing to database
    public function store(Request $request){
        $validForm = $request->validate([
            "title" => "required",
            "company" => ["required", Rule::unique("listings", "company")],
            "location" => "required",
            "email" => ["required", "email"],
            "description" => "required",
            "tags" => "required",
            "website" => "required",
        ]);

        $validForm["tags"] = preg_replace("/\s*,/", "|", strtolower($validForm["tags"]));

        Listing::create($validForm);

        return redirect('/')->with("listed", "Listing Stored");
    }
}
