<!-- resources/views/reservations/manage.blade.php -->
<x-layout>
    <div class="bg-gray-50 border border-gray-200 p-10 rounded">
        <header>
            <h1 class="text-3xl text-center font-bold my-6 uppercase">
                Manage Reservations
            </h1>
        </header>

        <table class="w-full table-auto rounded-sm">
            <tbody>
                @unless ($reservations->isEmpty())
                    @foreach ($reservations as $reservation)
                        <tr class="border-gray-300">
                            <td class="px-4 py-8 border-t border-b border-gray-300 text-lg">
                                <a href="/reservations/{{ $reservation->id }}">
                                    Reservation for Room ID: {{ $reservation->room_id }}
                                </a>
                            </td>
                            <td class="px-4 py-8 border-t border-b border-gray-300 text-lg">
                                {{ $reservation->start_date }} to {{ $reservation->end_date }}
                            </td>
                            <td class="px-4 py-8 border-t border-b border-gray-300 text-lg">
                                ${{ $reservation->total_price }}
                            </td>
                           
                            <td class="px-4 py-8 border-t border-b border-gray-300 text-lg">
                                <form action="/reservations/{{ $reservation->id }}" method="post">
                                    @csrf
                                    @method('DELETE')
                                    <button class="text-red-500"><i class="fa-solid fa-trash"></i> Delete</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                @else
                    <tr class="border-gray-300">
                        <td class="px-4 py-8 border-t border-b border-gray-300 text-lg">
                            <p class="text-center">No reservations found</p>
                        </td>
                    </tr>
                @endunless
            </tbody>
        </table>
    </div>
</x-layout>
