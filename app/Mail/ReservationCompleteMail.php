<?php

namespace App\Mail;

use App\Models\Booking;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class ReservationCompleteMail extends Mailable
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
        return $this->view('mails.reservation-complete', [
            'customerName' => $this->booking->user->fullName,
            'propertyName' => ucwords($this->booking->property->name),
            'roomName' => $this->booking->room->roomType->label,
            'paymentMethod' => $this->booking->paymentMethod->label,
            'nights' => $this->booking->nights,
            'dateFrom' => $this->booking->date_from,
            'dateTo' => $this->booking->date_to,
            'status' => $this->booking->bookingStatus->label,
            'cancellationPolicy' => $this->booking->property->cancelation_policy,
            'checkInFrom' => $this->booking->property->check_in_from,
            'checkInTo' => $this->booking->property->check_in_to,
            'checkOutFrom' => $this->booking->property->check_out_from,
            'checkOutTo' => $this->booking->property->check_out_to,
            'address' => $this->booking->property->address,
            'city' => $this->booking->property->city,
            'country' => $this->booking->property->country->label,
            'phone' => $this->booking->property->phone_number,
            'email' => $this->booking->property->email
        ]);
    }
}
