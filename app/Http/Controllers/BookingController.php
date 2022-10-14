<?php

namespace App\Http\Controllers;

use App\Models\Booking;
use App\Models\Property;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class BookingController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth')->only('store');
    }

    public function index()
    {
        $bookings = Booking::with('user', 'property')->latest()->get();
        return view('admin.booking.index', ['bookings' => $bookings]);
    }


    public function store(Request $request, Property $property)
    {
        $request->validate([
            'bookingMessage' => 'required|max:200'
        ]);

        $booking = new Booking();

        $booking->user_id = Auth::user()->id;
        $booking->property_id = $property->id;
        $booking->message = $request->bookingMessage;
        $booking->status = 'pending';

        $booking->save();

        return back();
    }

    public function statusAccept(Booking $booking)
    {
        $booking->status = 'accept';
        $booking->save();
        return back();
    }

    public function statusReject(Booking $booking)
    {
        $booking->status = 'reject';
        $booking->save();
        return back();
    }

    public function destroy(Booking $booking)
    {
        $booking->delete();
        return back();
    }
}
