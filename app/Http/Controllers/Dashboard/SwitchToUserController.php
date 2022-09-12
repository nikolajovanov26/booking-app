<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\PropertyStatus;
use App\Models\Role;
use Illuminate\Support\Facades\Session;

class SwitchToUserController extends Controller
{
    public function __invoke()
    {
        $user = Auth()->user();

        if ($user->properties()->where('property_status_id', PropertyStatus::firstWhere('name', 'active')->id)->get()->count() == 0) {
            $user->role_id = Role::firstWhere('name', 'user')->id;
            $user->save();

            return view('dashboard.index', [
                'earnings' => '31,669.45',
                'earningsCompare' => '+2.8',
                'reservations' => '16',
                'reservationsCompare' => '-2.6',
                'reviews' => '12',
                'reviewsCompare' => '13.1'
            ]);
        }

        Session::flash('error', [
            'action' => 'Error!',
            'message' => "You can't switch to regular user because you have active properties"
        ]);

        return back();

    }
}


