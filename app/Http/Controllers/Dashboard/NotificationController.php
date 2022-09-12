<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\Notification;
use Illuminate\Support\Facades\Auth;

class NotificationController extends Controller
{
    public function index()
    {
        return view('dashboard.notifications', [
            'notifications' => Notification::where('user_id', Auth::user()->id)->get()
        ]);
    }
}
