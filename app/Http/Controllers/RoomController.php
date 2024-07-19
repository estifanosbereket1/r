<?php

namespace App\Http\Controllers;

use App\Models\Room;
use Illuminate\Http\Request;

class RoomController extends Controller
{
    //
    // show all
    public function index(Request $request)
    {
        
        return view('rooms.index', [
            'rooms' => Room::latest()->filter($request->all())->paginate(4),
        ]);
    }

   

    public function show(Room $room)
    {
        $reservations = $room->reservations()->select('start_date', 'end_date')->get();

        // If there are no reservations, don't set the reservedDates variable
        if ($reservations->isNotEmpty()) {
            $reservedDates = $reservations
                ->map(function ($reservation) {
                    $startDate = new \DateTime($reservation->start_date);
                    $endDate = new \DateTime($reservation->end_date);
                    $period = new \DatePeriod($startDate, new \DateInterval('P1D'), $endDate->modify('+1 day'));

                    $dates = [];
                    foreach ($period as $date) {
                        $dates[] = $date->format('Y-m-d');
                    }

                    return $dates;
                })
                ->flatten()
                ->toArray();

            return view('rooms.show', [
                'room' => $room,
                'reservedDates' => $reservedDates,
            ]);
        }

        return view('rooms.show', ['room' => $room]);
    }

    //create form

    public function create()
    {
        return view('rooms.create');
    }

    public function store(Request $request)
    {
        // dd($request->all());
        $formFields = $request->validate([
            'title' => 'required',
            'pricePerNight' => ['required'],
            'location' => 'required',
            'amenities' => 'required',
            'description' => 'required',
            'capacity' => 'required',
        ]);

        if ($request->hasFile('imageSrc')) {
            $formFields['imageSrc'] = $request->file('imageSrc')->store('imageSrc', 'public');
        }

        $formFields['user_id'] = auth()->id();

        // dd($formFields);

        Room::create($formFields);

        return redirect('/')->with('message', 'Listing Created');
    }

    public function edit(Room $room)
    {
        return view('rooms.edit', ['room' => $room]);
    }

    public function update(Request $request, Room $room)
    {
        $formFields = $request->validate([
            'title' => 'required',
            'pricePerNight' => ['required'],
            'location' => 'required',
            'amenities' => 'required',
            'description' => 'required',
            'capacity' => 'required',
        ]);

        if ($request->hasFile('imageSrc')) {
            $formFields['imageSrc'] = $request->file('imageSrc')->store('imageSrc', 'public');
        }

        $room->update($formFields);
        return back()->with('message', 'Listing Updated');
    }

    public function destroy(Room $room)
    {
        $room->delete();
        return redirect('/')->with('message', 'Listing Deleted Sucessfully');
    }
    //   public function manage (){
    //     dd(auth()->user());
    //     return view ('rooms.manage', ['rooms'=>auth()->user()->room()->get()]);
    // }

    // In your controller
    // In your controller (e.g., RoomController)
    public function manage()
    {
        $user = auth()->user(); // Retrieve the authenticated user
        $rooms = Room::where('user_id', $user->id)->get(); // Retrieve the rooms for the authenticated user

        return view('rooms.manage', ['rooms' => $rooms]);
    }
}

// general objective
// alignment
// mention on the over-view the
// this is not scope ???????? deliverable ,
// wbs flow
// cleaning staff not needed
// one activity diagram for one use case 
// design class method return type
// state chart
// component diagram
// deployment diagram

