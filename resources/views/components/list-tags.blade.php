@props(['csvTags'])

@php
    $tags = explode("|", $csvTags);
@endphp

<ul class="flex shrink wrap">
    @foreach ($tags as $t)
    <li
    class="flex items-center justify-center bg-black text-white rounded-xl py-1 px-3 mr-2 text-xs"
>
    <a href="/?tag={{$t}}">{{$t}}</a>
    </li>
    @endforeach
</ul>