<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\PropertyStatus;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProfileController extends Controller
{
    public function edit()
    {
        $user = Auth::user();

        return view('dashboard.settings', [
            'user' => $user,
            'canChange' => $user->properties->where('property_status_id', PropertyStatus::firstWhere('name', 'active')->id)->count() != 0
        ]);
    }
}
