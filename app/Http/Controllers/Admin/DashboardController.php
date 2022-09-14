<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Repository\Admin\BookingRepository;
use App\Repository\Admin\ChartRepository;
use App\Repository\Admin\PropertyRepository;
use App\Repository\Admin\UserRepository;

class DashboardController extends Controller
{
    public ChartRepository $chartRepository;
    public UserRepository $userRepository;
    public PropertyRepository $propertyRepository;
    public BookingRepository $bookingRepository;

    public function __construct()
    {
        $this->chartRepository = new ChartRepository();
        $this->userRepository = new UserRepository();
        $this->propertyRepository = new PropertyRepository();
        $this->bookingRepository = new BookingRepository();
    }

    public function __invoke()
    {
        $propertyChart = $this->chartRepository->propertyChart();
        $userChart = $this->chartRepository->userChart();
        $bookingChart = $this->chartRepository->bookingChart();

        return view('admin.dashboard', [
            'users' => $this->userRepository->currentMonthNewUsers(),
            'usersCompare' => $this->userRepository->calculatePercent(),
            'properties' => $this->propertyRepository->currentMonthNewProperties(),
            'propertiesCompare' => $this->propertyRepository->calculatePercent(),
            'bookings' => $this->bookingRepository->currentMonthNewBookings(),
            'bookingsCompare' => $this->bookingRepository->calculatePercent()
        ], compact('propertyChart', 'userChart', 'bookingChart'));
    }
}
