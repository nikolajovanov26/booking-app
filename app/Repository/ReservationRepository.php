<?php

namespace App\Repository;

use App\Jobs\NewReservationJob;
use App\Jobs\ReservePropertyJob;
use App\Models\Booking;
use App\Models\BookingStatus;
use App\Models\PaymentMethod;
use App\Models\Room;
use App\Models\Transaction;
use App\Models\TransactionStatus;
use Illuminate\Support\Facades\Auth;

class ReservationRepository
{
    public function reservation(Room $room, array $data)
    {
        $booking = $this->saveBooking($room, $data, 'reserved');
        $this->sendMail($booking);
    }

    public function stripeReservation(Room $room, array $data)
    {
        return $this->saveBooking($room, $data, 'pending');
    }

    private function saveBooking(Room $room, array $data, string $status): Booking
    {
        return Booking::create([
            'user_id' => Auth::user()->id,
            'property_id' => $room->property_id,
            'room_id' => $room->id,
            'booking_status_id' => BookingStatus::firstWhere('name', $status)->id,
            'payment_method_id' => PaymentMethod::firstWhere('name', $data['paymentMethod'])->id,
            'nights' => $data['nights'],
            'price' => $data['price'],
            'date_from' => $data['date_from'],
            'date_to' => $data['date_to']
        ]);
    }

    private function saveTransaction(Room $room, array $data)
    {
        Transaction::create([
            'owner_id' => $room->property->owner->id,
            'customer_id' => Auth::user()->id,
            'property_id' => $room->property_id,
            'room_id' => $room->id,
            'transaction_status_id' => TransactionStatus::firstWhere('name', 'paid')->id,
            'total' => $data['price'],
        ]);
    }

    private function sendMail(Booking $booking)
    {
        NewReservationJob::dispatch($booking)->onQueue('emails');
        ReservePropertyJob::dispatch($booking)->onQueue('emails');
    }
}
