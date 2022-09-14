<?php

namespace App\Repository\Admin;

use App\Models\Booking;
use Carbon\Carbon;

class BookingRepository
{
    public function currentMonthNewBookings(): int
    {
        return Booking::where('created_at', '>=', Carbon::now()->startOfMonth())->count();
    }

    public function lastMonthNewBookings(): int
    {
        return Booking::where('created_at', '>=', Carbon::now()->subMonth()->startOfMonth())
            ->where('created_at', '<=', Carbon::now()->subMonth()->endOfMonth())
            ->count();
    }

    public function calculatePercent(): float
    {
        if($this->lastMonthNewBookings() == 0 && $this->currentMonthNewBookings() != 0) {
            return 100.0;
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
