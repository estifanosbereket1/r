
    
<x-layout>
@include('partials._hero')
@include('partials._search')


<div class="flex">
<x-filters/>

<div class="lg:grid lg:grid-cols-2 gap-2 space-y-4 md:space-y-0 mx-4">
@unless (count($rooms)==0)
    

@foreach ($rooms as $room)

<x-listing-card :room="$room"/>
    
@endforeach

@else
<p>No listings available</p>
@endunless
</div>

</div>



<div class="mt-6 p-4">
    {{$rooms->links()}}
</div>

</x-layout>