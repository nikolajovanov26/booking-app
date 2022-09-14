<?php

namespace App\Repository\Admin;

use App\Charts\Admin\DashboardChart;
use App\Models\Booking;
use App\Models\Property;
use App\Models\User;
use Carbon\Carbon;
use ConsoleTVs\Charts\Classes\Chartjs\Chart;
use DateTime;

class ChartRepository
{
    public function propertyChart(): Chart|bool
    {
        $properties = Property::where('created_at', '>=', Carbon::now()->subYear())->orderBy('created_at')->get()
            ->groupBy(function ($val) {
                return Carbon::parse($val->created_at)->format('m');
            });

        if($properties->count() == 0) {
            return false;
        }

        $labels = array();
        $values = array();

        $months = array_keys($properties->toArray());
        $z = $months[0];
        $i = 0;

        foreach ($properties as $property) {
            if ($months[$i] != $z) {
                while ($months[$i] != $z) {
                    $labels[] = DateTime::createFromFormat('!m', $z . '')->format('M');
                    $values[] = 0;
                    $z++;
                }
            }

            $labels[] = DateTime::createFromFormat('!m', $z . '')->format('M');
            $values[] = $property->count();

            $z++;
            if ($z == 13) {
                $z = 1;
            }
            $i++;
        }

        $propertyChart = new DashboardChart();
        $propertyChart->labels($labels);
        $propertyChart->dataset('Properties', 'line', $values)->backgroundColor('rgb(76, 161, 175, 0.5)');

        return $propertyChart;
    }

    public function userChart(): Chart|bool
    {
        $users = User::where('created_at', '>=', Carbon::now()->subYear())->orderBy('created_at')->get()
            ->groupBy(function ($val) {
                return Carbon::parse($val->created_at)->format('m');
            });

        if($users->count() == 0) {
            return false;
        }

        $labels = array();
        $values = array();

        $months = array_keys($users->toArray());
        $z = $months[0];
        $i = 0;

        foreach ($users as $user) {
            if ($months[$i] != $z) {
                while ((int)$months[$i] != $z) {
                    $labels[] = DateTime::createFromFormat('!m', $z . '')->format('M');
                    $values[] = 0;
                    $z++;
                }
            }

            $labels[] = DateTime::createFromFormat('!m', $z . '')->format('M');
            $values[] = $user->count();

            $z++;
            if ($z == 13) {
                $z = 1;
            }
            $i++;
        }

        $userChart = new DashboardChart();
        $userChart->labels($labels);
        $userChart->dataset('Users', 'line', $values)->backgroundColor('rgb(76, 161, 175, 0.5)');

        return $userChart;
    }

    public function bookingChart(): Chart|bool
    {
        $bookings = Booking::where('created_at', '>=', Carbon::now()->subYear())->orderBy('created_at')->get()
            ->groupBy(function ($val) {
                return Carbon::parse($val->created_at)->format('m');
            });

        if($bookings->count() == 0) {
            return false;
        }

        $labels = array();
        $values = array();

        $months = array_keys($bookings->toArray());
        $z = $months[0];
        $i = 0;

        foreach ($bookings as $booking) {
            if ($months[$i] != $z) {
                while ((int)$months[$i] != $z) {
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
}
