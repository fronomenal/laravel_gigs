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

    //show edit form
    public function edit(Listing $list){

        return view("listings/edit", ["gig" => $list]);
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

        if($request->hasFile("logo")){
            $validForm["logo"] = $request->file("logo")->store("logos", "public");
        }

        $validForm["tags"] = preg_replace("/\s*,/", "|", strtolower($validForm["tags"]));

        Listing::create($validForm);

        return redirect('/')->with("listed", "Listing Stored");
    }

    //updates listing on database
    public function update(Request $request, Listing $list){
        $request->validate([
            "email" => ["required", "email"],
        ]);

        $this->saveFields($request->input(), $list);


        return back()->with("listed", "Listing Updated");
    }

    //removes listing from database
    public function destroy(Listing $list){
        $list->delete();


        return redirect('/')->with("listed", "Listing Deleted");
    }

    //Saves only modified fields
    private function saveFields(array $input, Listing $list) {

        if( $input["title"] && $input["title"] != $list->title ){
            $list->title = $input["title"];
        }
        if( $input["location"] && $input["location"] != $list->location ){
            $list->location = $input["location"];
        }
        if( $input["website"] && $input["website"] != $list->website ){
            $list->website = $input["website"];
        }
        if( $input["email"] && $input["email"] != $list->email ){
            $list->email = $input["email"];
        }
        if( $input["tags"] && $input["tags"] != $list->tags ){
            $list->tags = preg_replace("/\s*,/", "|", strtolower($input["tags"]));
        }
        if( $input["description"] && $input["description"] != $list->description ){
            $list->description = $input["description"];
        }

        $list->save();
    }
}
