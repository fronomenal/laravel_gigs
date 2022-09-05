@extends("layout")

@php
    $gig->tags = str_replace("|", ", ", $gig->tags);
@endphp

@section("content")
<x-card class="p-10 max-w-lg mx-auto mt-24">
  <header class="text-center">
    <h2 class="text-2xl font-bold uppercase mb-1">Edit Gig </h2>
    <p>Make an update to the current gig:</p>
    <p class="mb-4"><b>{{$gig->title}}</b></p>
  </header>

  <form action="/listings/{{$gig->id}}" method="post" enctype="multipart/form-data">
    @csrf
    @method("PUT")
    <div class="mb-6">
      <label for="title" class="inline-block text-lg mb-2" >Job Title</label>
      <input type="text" class="border border-gray-200 rounded p-2 w-full" name="title" id="title" value="{{$gig->title}}" placeholder="Example: Senior Laravel Developer"/>
    </div>
    <div class="mb-6">
      <label for="location" class="inline-block text-lg mb-2" >Job Location</label>
      <input type="text" class="border border-gray-200 rounded p-2 w-full" name="location" id="location" value="{{$gig->location}}" placeholder="Example: Remote, Boston MA, etc" />
    </div>
    <div class="mb-6"> 
      <label for="email" class="inline-block text-lg mb-2" >Contact Email</label>
      <input type="email" class="border border-gray-200 rounded p-2 w-full" name="email" id="location" value="{{$gig->email}}"/>
      @error("email")
        <p class="text-red-500 text-xs mt-1">{{$message}}</p>
      @enderror
    </div>
    <div class="mb-6"> 
      <label for="website" class="inline-block text-lg mb-2"> Website/Application URL </label>
      <input type="text" class="border border-gray-200 rounded p-2 w-full" name="website" id="website" value="{{$gig->website}}" />
    </div>
    <div class="mb-6"> 
      <label for="tags" class="inline-block text-lg mb-2"> Tags (Comma Separated) </label>
      <input type="text" class="border border-gray-200 rounded p-2 w-full" name="tags" id="tags" value="{{$gig->tags}}" placeholder="Example: Laravel, Backend, Postgres, etc"/>
    </div>
    <div class="mb-6"> 
      <label for="description" class="inline-block text-lg mb-2" > Job Description </label>
      <textarea class="border border-gray-200 rounded p-2 w-full" name="description" id="description" id="tags" rows="10" placeholder="Include tasks, requirements, salary, etc">{{$gig->description}}</textarea>
    </div>
    <div class="mb-6"> 
      <button class="bg-laravel text-white rounded py-2 px-4 hover:bg-black"> Update Gig  </button>
      <a href="/" class="text-black ml-4"> Back </a>
    </div>
  </form>
</x-card>

@endsection