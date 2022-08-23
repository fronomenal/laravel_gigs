@extends("layout")


@section('content')

<h1>Single Listing</h1>

<section>
    <h2>{{$gig["title"]}}</h2>
</section>
<p>{{$gig["description"]}}</p>
    
@endsection