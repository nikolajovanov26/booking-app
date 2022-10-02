<?php

namespace App\Repository;

use App\Models\Booking;
use App\Models\Property;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;

class BookingRepository
{
    public function currentMonthNewBookings(): int
    {
        $propertyOwned = Property::where('user_id', Auth::user()->id)->pluck('id');

        return Booking::whereIn('property_id', $propertyOwned)
            ->where('created_at', '>=', Carbon::now()->startOfMonth())->count();
    }

    public function lastMonthNewBookings(): int
    {
        $propertyOwned = Property::where('user_id', Auth::user()->id)->pluck('id');

        return Booking::whereIn('property_id', $propertyOwned)
            ->where('created_at', '>=', Carbon::now()->subMonth()->startOfMonth())
            ->where('created_at', '<=', Carbon::now()->subMonth()->endOfMonth())
            ->count();
    }

    public function calculatePercent(): float
    {
        if($this->lastMonthNewBookings() == 0 && $this->currentMonthNewBookings() != 0) {
            return 100.0;
        }

        if($this->lastMonthNewBookings() != 0 && $this->currentMonthNewBookings() == 0) {
            return -100.0;
        }

        if ($this->currentMonthNewBookings() > $this->lastMonthNewBookings()) {
            $value = $this->currentMonthNewBookings() - $this->lastMonthNewBookings();
            return (float)$value / $this->lastMonthNewBookings() * 100;
        }

        if ($this->currentMonthNewBookings() < $this->lastMonthNewBookings()) {
            $value = $this->lastMonthNewBookings() - $this->currentMonthNewBookings();
            return (float)$value / $this->currentMonthNewBookings() * 100;
        }

        return 0.0;
    }
}
