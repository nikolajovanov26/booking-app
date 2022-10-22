<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\SearchFilterRequest;
use App\Models\Booking;
use Illuminate\Support\Facades\Auth;

class BookingController extends Controller
{
    public function index(SearchFilterRequest $request)
    {
        $bookings = Booking::with('property.country', 'property.owner', 'room.roomType', 'user');

        if ($request->get('search')) {
            $bookings->whereRelation('property', 'name', 'like', '%' . $request->get('search') . '%');
        }

        return view('admin.bookings', [
            'bookings' => $bookings->get()
        ]);
    }
}
