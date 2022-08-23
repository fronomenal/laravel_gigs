@extends("layout")


@section('content')
    
<h1>All Listings</h1>

@unless(count($gigs)==0)
@foreach ($gigs as $g)
<section>
    <h2><a href="/{{$g["id"]}}">{{$g["title"]}}</a></h2>
</section>
<p>
    {{$g["description"]}}
</p>
@endforeach

@else
<p>No Listings Available</p>
@endunless

@endsection