<div class="flex justify-start mx-3 ml-4 w-[30%]">
    <form action="/" method="GET" class="bg-white rounded-lg p-4">
        <!-- Price Range Filter -->
        <div class="mb-4">
            <label for="price" class="block text-gray-700 font-bold mb-2">Price Range</label>
            <input type="range" id="price" name="price" min="0" max="1000" step="10"
                value="{{ request('price', 500) }}" class="w-full" oninput="updatePriceDisplay(this.value)">
            <div class="flex justify-between text-gray-600 mt-2">
                <span>$0</span>
                <span id="price-display">${{ request('price', 500) }}</span>
                <span>$1000</span>
            </div>
        </div>

        <!-- Amenities Filter -->
        <div class="mb-4">
            <label class="block text-gray-700 font-bold mb-2">Amenities</label>
            <div class="flex flex-wrap">
                @php
                    $amenities = ['Wifi' => 'Wifi' ,'ac' => 'Air Conditioning', 'breakfast' => 'Breakfast', 'parking' => 'Parking'];
                    $selectedAmenities = is_array(request('amenities')) ? request('amenities') : explode(', ', request('amenities', ''));
                @endphp
                @foreach ($amenities as $key => $value)
                    <div class="mr-4 mb-2">
                        <input type="checkbox" id="{{ $key }}" name="amenities[]" value="{{ $value }}" class="mr-2"
                            @if(in_array($value, $selectedAmenities)) checked @endif>
                        <label for="{{ $key }}" class="text-gray-700">{{ $value }}</label>
                    </div>
                @endforeach
            </div>
        </div>

      

        <!-- Room Capacity Filter -->
        <div class="mb-4">
            <label for="capacity" class="block text-gray-700 font-bold mb-2">Capacity</label>
            <input type="number" id="capacity" name="capacity" min="1" class="w-full p-2 border rounded-lg"
                placeholder="Number of people" value="{{ request('capacity') }}">
        </div>

      

        <!-- Submit Button -->
        <div class="flex justify-end">
            <button type="submit" class="bg-blue-500 text-white font-bold py-2 px-4 rounded-lg hover:bg-blue-700">
                Filter
            </button>
        </div>
    </form>
</div>

<script>
    function updatePriceDisplay(value) {
        document.getElementById('price-display').innerText = `$${value}`;
    }
</script>
