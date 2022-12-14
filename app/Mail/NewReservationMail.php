<?php

namespace App\Mail;

use App\Models\Booking;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class NewReservationMail extends Mailable
{
    use Queueable, SerializesModels;

    private $booking;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(Booking $booking)
    {
        $this->booking = $booking->load('property', 'room.roomType', 'bookingStatus');
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('mails.new-reservation', [
            'ownerName' => $this->booking->property->owner->fullName,
            'customerName' => $this->booking->user->fullName,
            'propertyName' => ucwords($this->booking->property->name),
            'roomId' => $this->booking->room->id,
            'roomName' => $this->booking->room->roomType->label,
            'paymentMethod' => $this->booking->paymentMethod->label,
            'price' => $this->booking->price,
            'nights' => $this->booking->nights,
            'dateFrom' => $this->booking->date_from,
            'dateTo' => $this->booking->date_to,
            'status' => $this->booking->bookingStatus->label,
            'phone' => $this->booking->user->profile->phone_number,
            'email' => $this->booking->user->email
        ])->subject('New Reservation');
    }
}
