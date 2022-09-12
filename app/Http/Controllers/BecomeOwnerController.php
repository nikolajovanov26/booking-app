<?php

namespace App\Http\Controllers;

use App\Models\Role;

class BecomeOwnerController extends Controller
{
    public function __invoke()
    {
        Auth()->user()->role_id = Role::firstWhere('name', 'owner')->id;
        Auth()->user()->save();

        return view('dashboard.index', [
            'earnings' => '31,669.45',
            'earningsCompare' => '+2.8',
            'reservations' => '16',
            'reservationsCompare' => '-2.6',
            'reviews' => '12',
            'reviewsCompare' => '13.1'
        ]);
    }
}


