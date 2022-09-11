<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Notification;
use Illuminate\Support\Facades\Auth;

class NotificationController extends Controller
{
    public function index()
    {
        return view('admin.notifications', [
            'notifications' => Notification::where('user_id', Auth::user()->id)->get()
        ]);
    }
}
