@props(['room'])

<x-card>
    <div class="flex ">
        <img class="hidden w-48 mr-6 md:block"
            src="{{ $room->imageSrc ? asset('storage/' . $room->imageSrc) : asset('/images/no-image.png') }}"
            alt="" />
        <div>
            <h3 class="text-2xl">
                <a href="/rooms/{{ $room->id }}">{{ $room->title }}</a>
            </h3>
            <div class="text-xl font-bold mb-4">$ {{ $room->pricePerNight }}</div>
            <x-listing-tags :tagsCsv="$room->amenities" />
            <div class="text-lg mt-4">
                <i class="fa-solid fa-location-dot"></i> {{ $room->location }}
            </div>
            
        </div>
    </div>
</x-card>
