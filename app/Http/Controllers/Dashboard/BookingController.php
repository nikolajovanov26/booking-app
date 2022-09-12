<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\Booking;
use Illuminate\Support\Facades\Auth;

class BookingController extends Controller
{
    public function index()
    {
        return view('dashboard.bookings', [
            'bookings' => Booking::where('user_id', Auth::user()->id)->get()
        ]);
    }
}
