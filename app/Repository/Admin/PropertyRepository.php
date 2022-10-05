<?php

namespace App\Repository\Admin;

use App\Models\Property;
use Carbon\Carbon;

class PropertyRepository
{
    public function currentMonthNewProperties(): int
    {
        return Property::where('created_at', '>=', Carbon::now()->startOfMonth())->count();
    }

    public function lastMonthNewProperties(): int
    {
        return Property::where('created_at', '>=', Carbon::now()->subMonth()->startOfMonth())
            ->where('created_at', '<=', Carbon::now()->subMonth()->endOfMonth())
            ->count();
    }

    public function calculatePercent(): float
    {
        if ($this->lastMonthNewProperties() == 0 && $this->currentMonthNewProperties() != 0) {
            return 100.0;
        }

        if ($this->lastMonthNewProperties() != 0 && $this->currentMonthNewProperties() == 0) {
            return -100.0;
        }

        if ($this->currentMonthNewProperties() > $this->lastMonthNewProperties()) {
            $value = $this->currentMonthNewProperties() - $this->lastMonthNewProperties();
            return (float)$value / $this->lastMonthNewProperties() * 100;
        } elseif ($this->currentMonthNewProperties() < $this->lastMonthNewProperties()) {
            $value = $this->lastMonthNewProperties() - $this->currentMonthNewProperties();
            return -1 * (float)$value / $this->lastMonthNewProperties() * 100;
        }

        return 0.0;
    }
}
