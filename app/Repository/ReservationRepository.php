<?php

namespace App\Repository;

use App\Models\Booking;
use App\Models\BookingStatus;
use App\Models\Country;
use App\Models\Image;
use App\Models\Property;
use App\Models\PropertyStatus;
use App\Models\PropertyType;
use App\Models\Room;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class ReservationRepository
{
    public function reservation(Room $room, array $data)
    {
        $this->saveBooking($room, $data);
    }

    public function stripeReservation(Room $room, $data)
    {
        //
    }

    private function saveBooking(Room $room, array $data): void
    {
        Booking::create([
            'user_id' => Auth::user()->id,
            'property_id' => $room->property_id,
            'room_id' => $room->id,
            'booking_status_id' => BookingStatus::firstWhere('name', 'pay-at-property')->id,
            'nights' => $data['nights'],
            'price' => $data['price'],
            'date_from' => $data['date_from'],
            'date_to' => $data['date_to']
        ]);
    }
}
