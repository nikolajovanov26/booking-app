<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Repository\BookingRepository;
use App\Repository\ChartRepository;
use App\Repository\ReviewRepository;
use App\Repository\TransactionRepository;

class DashboardController extends Controller
{
    private ChartRepository $chartRepository;
    private TransactionRepository $transactionRepository;
    private BookingRepository $bookingRepository;
    private ReviewRepository $reviewRepository;

    public function __construct()
    {
        $this->chartRepository = new ChartRepository();
        $this->transactionRepository = new TransactionRepository();
        $this->bookingRepository = new BookingRepository();
        $this->reviewRepository = new ReviewRepository();
    }

    public function __invoke()
    {
        $bookingChart = $this->chartRepository->bookingChart();
        $earningChart = $this->chartRepository->earningChart();
        $reviewChart = $this->chartRepository->reviewChart();

        return view('dashboard.index', [
            'earnings' => $this->transactionRepository->currentMonthNewTransactions(),
            'earningsCompare' => $this->transactionRepository->calculatePercent(),
            'bookings' => $this->bookingRepository->currentMonthNewBookings(),
            'bookingsCompare' => $this->bookingRepository->calculatePercent(),
            'reviews' => $this->reviewRepository->currentMonthNewReviews(),
            'reviewsCompare' => $this->reviewRepository->calculatePercent(),
        ], compact('bookingChart', 'earningChart', 'reviewChart'));
    }
}
