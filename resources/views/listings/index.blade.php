@extends("layout")


@section('content')

@include('partials._hero')

@include('partials._search')
    
<x-flash-listed />

<div class="bg-gray-50 border border-gray-200 rounded p-6 grid gap-1 lg:grid-cols-2">

@unless(count($gigs)==0)
@foreach ($gigs as $g)
    <x-list-card :list="$g" />
@endforeach

@else
<p>No Listings Available</p>
@endunless

</div>

@endsection