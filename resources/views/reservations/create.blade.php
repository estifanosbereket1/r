

<x-layout>
    <x-card class="p-10 max-w-lg mx-auto mt-24">
        <header class="text-center">
            <h2 class="text-2xl font-bold uppercase mb-1">
                Confirm Reservation
            </h2>
            <p class="mb-4">Review and confirm your reservation details</p>
        </header>

        <form method="POST" action="{{ url('/reservations/confirm') }}" enctype="multipart/form-data">
            @csrf
            <input type="hidden" name="room_id" value="{{ $room->id }}">

            <div class="mb-6">
                <label for="title" class="inline-block text-lg mb-2">Title</label>
                <input type="text" class="border border-gray-200 rounded p-2 w-full" name="title" value="{{ $room->title }}" readonly />
            </div>

            <div class="mb-6">
                <label for="location" class="inline-block text-lg mb-2">Location</label>
                <input type="text" class="border border-gray-200 rounded p-2 w-full" name="location" value="{{ $room->location }}" readonly />
            </div>

            <div class="mb-6">
                <label for="pricePerNight" class="inline-block text-lg mb-2">Price per Night</label>
                <input type="number" class="border border-gray-200 rounded p-2 w-full" name="pricePerNight" value="{{ $room->pricePerNight }}" readonly />
            </div>

            <div class="mb-6">
                <label for="capacity" class="inline-block text-lg mb-2">Capacity of Guests</label>
                <input type="number" class="border border-gray-200 rounded p-2 w-full" name="capacity" value="{{ $room->capacity }}" readonly />
            </div>

            <div class="mb-6">
                <label for="startdate" class="inline-block text-lg mb-2">Start Date</label>
                <input type="text" class="border border-gray-200 rounded p-2 w-full" name="start_date" value="{{ $startdate }}" readonly />
            </div>

            <div class="mb-6">
                <label for="enddate" class="inline-block text-lg mb-2">End Date</label>
                <input type="text" class="border border-gray-200 rounded p-2 w-full" name="end_date" value="{{ $enddate }}" readonly />
            </div>

            <div class="mb-6">
                <label for="total_price" class="inline-block text-lg mb-2">Total Price</label>
                <input type="text" class="border border-gray-200 rounded p-2 w-full" name="total_price" value="${{ $total_price }}" readonly />
            </div>

            <div class="mb-6">
                <label for="amenities" class="inline-block text-lg mb-2">Amenities</label>
                <input type="text" class="border border-gray-200 rounded p-2 w-full" name="amenities" value="{{ $room->amenities }}" readonly />
            </div>

            <div class="mb-6">
                <label for="description" class="inline-block text-lg mb-2">Description</label>
                <textarea class="border border-gray-200 rounded p-2 w-full" name="description" rows="10" readonly>{{ $room->description }}</textarea>
            </div>

            <div class="mb-6">
                <button type="submit" class="bg-blue-500 text-white rounded py-2 px-4 hover:bg-blue-700">
                    Confirm Reservation
                </button>
                <a href="/" class="text-black ml-4">Back</a>
            </div>
        </form>
    </x-card>
</x-layout>
