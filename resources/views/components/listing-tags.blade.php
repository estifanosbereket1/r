@props(['tagsCsv'])

@php

    $amenities =explode(",",$tagsCsv);
  
@endphp


<ul class="flex flex-wrap gap-3">
    @foreach ($amenities as $amenity)
        <li class="flex flex-wrap gap-2 items-center justify-center bg-black text-white rounded-xl py-1 px-3 mr-2 text-xs">
            <a href="/?amenity={{ $amenity }}">{{ $amenity }}</a>
        </li>
    @endforeach
</ul>
