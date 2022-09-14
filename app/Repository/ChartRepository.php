<?php

namespace App\Repository;

use App\Charts\Admin\DashboardChart;
use App\Models\Booking;
use App\Models\Property;
use App\Models\Review;
use App\Models\Transaction;
use Carbon\Carbon;
use ConsoleTVs\Charts\Classes\Chartjs\Chart;
use DateTime;
use Illuminate\Support\Facades\Auth;

class ChartRepository
{
    public function bookingChart(): Chart|bool
    {
        $propertyOwned = Property::where('user_id', Auth::user()->id)->pluck('id');
        $bookings = Booking::whereIn('property_id', $propertyOwned)
            ->where('created_at', '>=', Carbon::now()->subYear())->orderBy('created_at')->get()
            ->groupBy(function ($val) {
                return Carbon::parse($val->created_at)->format('m');
            });

        if ($bookings->count() == 0) {
            return false;
        }

        $labels = array();
        $values = array();

        $months = array_keys($bookings->toArray());
        $z = $months[0];
        $i = 0;

        foreach ($bookings as $booking) {
            if ($months[$i] != $z) {
                while ($months[$i] != $z) {
                    $labels[] = DateTime::createFromFormat('!m', $z . '')->format('M');
                    $values[] = 0;
                    $z++;
                }
            }

            $labels[] = DateTime::createFromFormat('!m', $z . '')->format('M');
            $values[] = $booking->count();

            $z++;
            if ($z == 13) {
                $z = 1;
            }
            $i++;
        }

        $bookingChart = new DashboardChart();
        $bookingChart->labels($labels);
        $bookingChart->dataset('Bookings', 'line', $values)->backgroundColor('rgb(76, 161, 175, 0.5)');

        return $bookingChart;
    }

    public function earningChart(): Chart|bool
    {
        $earnings = Transaction::where('owner_id', Auth::user()->id)
            ->where('created_at', '>=', Carbon::now()->subYear())->orderBy('created_at')->get()
            ->groupBy(function ($val) {
                return Carbon::parse($val->created_at)->format('m');
            });

        if ($earnings->count() == 0) {
            return false;
        }

        $labels = array();
        $values = array();

        $months = array_keys($earnings->toArray());
        $z = $months[0];
        $i = 0;

        foreach ($earnings as $earning) {
            if ($months[$i] != $z) {
                while ((int)$months[$i] != $z) {
                    $labels[] = DateTime::createFromFormat('!m', $z . '')->format('M');
                    $values[] = 0;
                    $z++;
                }
            }

            $labels[] = DateTime::createFromFormat('!m', $z . '')->format('M');
            $values[] = $earning->sum('total');

            $z++;
            if ($z == 13) {
                $z = 1;
            }
            $i++;
        }

        $earningChart = new DashboardChart();
        $earningChart->labels($labels);
        $earningChart->dataset('Earnings (€)', 'line', $values)->backgroundColor('rgb(76, 161, 175, 0.5)');

        return $earningChart;
    }

    public function reviewChart(): Chart|bool
    {
        $propertyOwned = Property::where('user_id', Auth::user()->id)->pluck('id');
        $reviews = Review::whereIn('property_id', $propertyOwned)
            ->where('created_at', '>=', Carbon::now()->subYear())->orderBy('created_at')->get()
            ->groupBy(function ($val) {
                return Carbon::parse($val->created_at)->format('m');
            });

        if ($reviews->count() == 0) {
            return false;
        }

        $labels = array();
        $values = array();

        $months = array_keys($reviews->toArray());
        $z = $months[0];
        $i = 0;

        foreach ($reviews as $review) {
            if ($months[$i] != $z) {
                while ((int)$months[$i] != $z) {
                    $labels[] = DateTime::createFromFormat('!m', $z . '')->format('M');
                    $values[] = 0;
                    $z++;
                }
            }

            $labels[] = DateTime::createFromFormat('!m', $z . '')->format('M');
            $values[] = $review->count();

            $z++;
            if ($z == 13) {
                $z = 1;
            }
            $i++;
        }

        $reviewChart = new DashboardChart();
        $reviewChart->labels($labels);
        $reviewChart->dataset('Reviews', 'line', $values)->backgroundColor('rgb(76, 161, 175, 0.5)');

        return $reviewChart;
    }
}
