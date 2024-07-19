<x-layout>
    <x-card class="p-10 max-w-lg mx-auto mt-24">
        <header class="text-center">
            <h2 class="text-2xl font-bold uppercase mb-1">
                Edit room 
            </h2>
            <p class="mb-4">Edit room for resrevation</p>
        </header>

        <form method="POST" action="/rooms/{{$room->id}}" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="mb-6">
                <label for="title" class="inline-block text-lg mb-2">Title</label>
                <input type="text" class="border border-gray-200 rounded p-2 w-full" name="title" value="{{$room->title}}" />
                @error('title')
                    <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                @enderror
            </div>


            <div class="mb-6">
                <label for="location" class="inline-block text-lg mb-2"> Location</label>
                <input type="text" class="border border-gray-200 rounded p-2 w-full" name="location"
                    placeholder="Example: Remote, Boston MA, etc" value="{{$room->location}}" />
                @error('location')
                    <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                @enderror
            </div>

            <div class="mb-6">
                <label for="pricePerNight" class="inline-block text-lg mb-2">Price per Night</label>
                <input type="number" class="border border-gray-200 rounded p-2 w-full" name="pricePerNight"  value="{{$room->pricePerNight}}"/>
                @error('pricePerNight')
                    <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                @enderror
            </div>

             <div class="mb-6">
                <label for="capacity" class="inline-block text-lg mb-2">Capacity of Guests</label>
                <input type="number" class="border border-gray-200 rounded p-2 w-full" name="capacity" value="{{$room->capacity}}"/>
                @error('capacity')
                    <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                @enderror
            </div>

        

            <div class="mb-6">
                <label for="tags" class="inline-block text-lg mb-2">
                    Ammenities (Comma Separated)
                </label>
                <input type="text" class="border border-gray-200 rounded p-2 w-full" name="amenities"
                    placeholder="Example: Laravel, Backend, Postgres, etc" value="{{$room->amenities}}" />
                @error('amenities')
                    <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                @enderror
            </div>

            <div class="mb-6">
                <label for="imageSrc" class="inline-block text-lg mb-2">
                    Room Image
                </label>
                <input type="file" class="border border-gray-200 rounded p-2 w-full" name="imageSrc"  />
                 <img class="w-48 mr-6 mb-6"
                    src="{{ $room->imageSrc ? asset('storage/' . $room->imageSrc) : asset('/images/no-image.png') }}"
                    alt="" />
                  @error('imageSrc')
                    <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                @enderror
            </div>

            <div class="mb-6">
                <label for="description" class="inline-block text-lg mb-2">
                   Description
                </label>
                <textarea class="border border-gray-200 rounded p-2 w-full" name="description" rows="10"
                    placeholder="Include tasks, requirements, salary, etc" >
              {{$room->description}}"
                </textarea>
                @error('description')
                    <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                @enderror
            </div>

            <div class="mb-6">
                <button class="bg-black text-white rounded py-2 px-4 hover:bg-black">
                   Edit room
                </button>

                <a href="/" class="text-black ml-4"> Back </a>
            </div>
        </form>
    </x-card>
</x-layout>
