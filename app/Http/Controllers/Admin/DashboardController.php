<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function __invoke()
    {
        return view('admin.dashboard', [
            'earnings' => '31,669.45',
            'earningsCompare' => '+2.8',
            'reservations' => '16',
            'reservationsCompare' => '-2.6',
            'reviews' => '12',
            'reviewsCompare' => '13.1'
        ]);
    }
}
