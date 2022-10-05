<?php

namespace App\Repository;

use App\Models\Property;
use App\Models\Review;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;

class ReviewRepository
{
    public function currentMonthNewReviews(): int
    {
        $propertyOwned = Property::where('user_id', Auth::user()->id)->pluck('id');

        return Review::whereIn('property_id', $propertyOwned)
            ->where('created_at', '>=', Carbon::now()->startOfMonth())->count();
    }

    public function lastMonthNewReviews(): int
    {
        $propertyOwned = Property::where('user_id', Auth::user()->id)->pluck('id');

        return Review::whereIn('property_id', $propertyOwned)
            ->where('created_at', '>=', Carbon::now()->subMonth()->startOfMonth())
            ->where('created_at', '<=', Carbon::now()->subMonth()->endOfMonth())
            ->count();
    }

    public function calculatePercent(): float
    {
        if($this->lastMonthNewReviews() == 0 && $this->currentMonthNewReviews() != 0) {
            return 100.0;
        }

        if($this->lastMonthNewReviews() != 0 && $this->currentMonthNewReviews() == 0) {
            return -100.0;
        }

        if ($this->currentMonthNewReviews() > $this->lastMonthNewReviews()) {
            $value = $this->currentMonthNewReviews() - $this->lastMonthNewReviews();
            return (float)$value / $this->lastMonthNewReviews() * 100;
        }

        if ($this->currentMonthNewReviews() < $this->lastMonthNewReviews()) {
            $value = $this->lastMonthNewReviews() - $this->currentMonthNewReviews();
            return -1 * (float)$value / $this->lastMonthNewReviews() * 100;
        }

        return 0.0;
    }
}
