<?php

namespace App\Http\Controllers;

use App\Http\Requests\ReservationRequest;
use App\Http\Requests\ReserveRequest;
use App\Models\Room;
use App\Repository\ReservationRepository;
use Carbon\Carbon;
use Illuminate\Http\Request;

class ReservationController extends Controller
{
    private $reservationRepository;

    public function __construct()
    {
        $this->reservationRepository = new ReservationRepository();
    }

    public function reservation(ReservationRequest $request)
    {
        $room = Room::findorFail($request->get('room_id'));

        $booked = $room->bookings()->where(function ($query) use ($request) {
            $query->where(fn($query) => $query->where('date_from', '>', $request->get('date_from'))->where('date_from', '<', $request->get('date_to')))
                ->orWhere(fn($query) => $query->where('date_to', '>', $request->get('date_from'))->where('date_to', '<', $request->get('date_to')))
                ->orWhere(fn($query) => $query->where('date_from', '>', $request->get('date_from'))->where('date_to', '<', $request->get('date_from')))
                ->orWhere(fn($query) => $query->where('date_from', '<', $request->get('date_from'))->where('date_to', '>=', $request->get('date_to')));
        })->count();

        if ($booked) {
            abort(403, 'The room is not available for the selected period');
        }

        return view('reservation_confirmation', [
            'room' => $room->load('property', 'roomType', 'roomView'),
            'date_from' => Carbon::createFromFormat('Y-m-d', $request->get('date_from')),
            'date_to' => Carbon::createFromFormat('Y-m-d', $request->get('date_to'))
        ]);
    }

    public function reserve(ReserveRequest $request)
    {
        $room = Room::find($request->room_id);

        if (!$room->property->paymentMethods()->where('name', $request->paymentMethod)->exists()) {
            abort(403, 'Payment method unsupported');
        }

        if ($request->paymentMethod == 'stripe') {
            $this->reservationRepository->stripeReservation($room, $request->except('room_id'));

            return redirect(route('bookings.index'));
        }

        $this->reservationRepository->reservation($room, $request->except('room_id'));

        return redirect(route('bookings.index'));
    }
}
