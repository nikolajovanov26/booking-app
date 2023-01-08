<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Booking;
use App\Models\BookingStatus;
use Illuminate\Support\Facades\Auth;

class BookingController extends Controller
{
    public function index()
    {
        return view('bookings', [
            'bookings' => Booking::where('user_id', Auth::user()->id)->get()
        ]);
    }

    public function cancel(Booking $booking)
    {
        if ($booking->bookingStatus->isCancellable) {
            $booking->booking_status_id = BookingStatus::firstWhere('name', BookingStatus::CANCELED)->id;
            $booking->save();
        }

        return view('bookings', [
            'bookings' => Booking::where('user_id', Auth::user()->id)->get()
        ]);
    }
}
