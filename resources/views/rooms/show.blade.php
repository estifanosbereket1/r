

<x-layout>
    @include('partials._search')

    <div class="max-w-screen-lg mx-auto">
        <div class="flex flex-col gap-6">
            <x-heading>
                <div class="text-2xl font-bold">{{ $room->title }}</div>
                <div class="font-light text-neutral-500 mt-2">{{ $room->location }}</div>
            </x-heading>

            <x-imagecontainer>
                <img alt="image"
                    src="{{ $room->imageSrc ? asset('storage/' . $room->imageSrc) : asset('/images/images.jpeg') }}"
                    class="object-cover w-full h-full" />
            </x-imagecontainer>

            <div class="grid grid-cols-1 md:grid-cols-7 md:gap-10 mt-6">
                <div class="col-span-4 flex flex-col gap-8">
                    <div class="flex flex-col gap-2">
                        <div class="text-xl font-semibold flex flex-row items-center gap-2">
                            <div>Hosted by {{ auth()->user()->name }}</div>
                        </div>
                        <div class="flex flex-row items-center gap-4 font-light text-neutral-500">
                            <div>{{ $room->capacity }} guests</div>
                        </div>
                        <div class="text-xl font-bold mb-4">$ {{ $room->pricePerNight }} /night</div>
                    </div>
                    <hr />
                    <x-listing-tags :tagsCsv="$room->amenities" />
                    <hr />
                    <div class="text-lg font-light text-neutral-500">{{ $room->description }}</div>
                    <hr />
                </div>

                <div class="order-1 mb-10 md:order-last md:col-span-3">
                    <div class="bg-white rounded-lg shadow p-4">
                        <h2 class="text-xl font-bold mb-4">Select Dates</h2>
                        <form action="/reservations/rooms/{{ $room->id }}" method="POST">
                            @csrf
                            <div class="mb-4">
                                <label for="start_date" class="block text-gray-700 font-bold mb-2">Start Date</label>
                                <input type="text" id="start_date" name="start_date"
                                    class="w-full p-2 border rounded-lg" placeholder="Select start date">
                            </div>
                            <div class="mb-4">
                                <label for="end_date" class="block text-gray-700 font-bold mb-2">End Date</label>
                                <input type="text" id="end_date" name="end_date"
                                    class="w-full p-2 border rounded-lg" placeholder="Select end date">
                            </div>
                            <div class="mb-4">
                                <label class="block text-gray-700 font-bold mb-2">Total Price</label>
                                <div id="total-price" class="text-xl font-bold text-gray-800">$0</div>
                                <input type="hidden" id="total_price_input" name="total_price">
                            </div>
                            <button type="submit"
                                class="bg-blue-500 text-white font-bold py-2 px-4 rounded-lg hover:bg-blue-700">
                                Reserve
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const pricePerNight = {{ $room->pricePerNight }};
            @isset($reservedDates)
                const reservedDates = @json($reservedDates);
            @else
                const reservedDates = [];
            @endisset

            const startDatePicker = flatpickr("#start_date", {
                dateFormat: "Y-m-d",
                disable: reservedDates,
                onChange: function(selectedDates, dateStr, instance) {
                    const endDatePicker = flatpickr("#end_date", {
                        dateFormat: "Y-m-d",
                        minDate: dateStr,
                        disable: reservedDates,
                        onChange: calculateTotalPrice
                    });
                    endDatePicker.open();
                }
            });

            flatpickr("#end_date", {
                dateFormat: "Y-m-d",
                disable: reservedDates,
                onChange: calculateTotalPrice
            });

            function calculateTotalPrice() {
                const startDate = startDatePicker.selectedDates[0];
                const endDate = flatpickr("#end_date").selectedDates[0];
                if (startDate && endDate) {
                    const oneDay = 24 * 60 * 60 * 1000;
                    const diffDays = Math.round(Math.abs((endDate - startDate) / oneDay));
                    const totalPrice = diffDays * pricePerNight;
                    document.getElementById('total-price').textContent = `$${totalPrice}`;
                    document.getElementById('total_price_input').value = totalPrice;
                }
            }
        });
    </script>
</x-layout>
