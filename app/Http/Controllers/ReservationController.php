<?php

namespace App\Http\Controllers;

use App\Models\Reservations;
use App\Models\Room;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ReservationController extends Controller
{


public function index(){
    $user = auth()->user(); // Retrieve the authenticated user
        $reservations = Reservations::where('user_id', $user->id)->get(); // Retrieve the rooms for the authenticated user

        return view('reservations.index', ['reservations' => $reservations]);
}

    public function store(Request $request, $roomId)
    {
        // Validate and process the form data
    // dd($roomId);
        $validatedData = $request->validate([
            'start_date' => 'required|date',
            'end_date' => 'required|date|after_or_equal:startdate',
            'total_price' => 'required|numeric',
        ]);

        // Save the reservation or perform necessary actions
        // For now, we're just passing the data to the view
        // $room = Room::findOrFail($roomId);

        $validatedData['user_id'] = auth()->id();
        $validatedData['room_id'] = (int) $roomId;

        // dd($validatedData);


        Reservations::create($validatedData);

        return redirect('/')->with('success', 'Reservation created successfully.');

        // return view('reservations.create', [
        //     'startdate' => $validatedData['startdate'],
        //     'enddate' => $validatedData['enddate'],
        //     'total_price' => $validatedData['total_price'],
        //     'room' => $room,
        // ]);
    }

    // public function confirm(Request $request)
    // {
    //     // dd($request->all());
    //     // Validate the form data
    //     $validatedData = $request->validate([
    //         'room_id' => 'required|exists:room,id',
    //         'start_date' => 'required|date',
    //         'end_date' => 'required|date|after_or_equal:startdate',
    //         'total_price' => 'required|numeric',
    //     ]);

    //     $validatedData['user_id'] = auth()->id();

    //     dd($validatedData);
    //     // Create a new reservation
    //     $reservation = new Reservations();
    //     $reservation->room_id = $request->room_id;
    //     $reservation->user_id = Auth::id();
    //     $reservation->start_date = $request->startdate;
    //     $reservation->end_date = $request->enddate;
    //     $reservation->total_price = $request->total_price;
    //     $reservation->save();
    //     $validatedData['user_id'] = auth()->id();

    //     // Redirect or return a response
    //     return redirect('/')->with('success', 'Reservation created successfully.');
    // }
}
