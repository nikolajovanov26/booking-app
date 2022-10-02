<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\Notification;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class NotificationController extends Controller
{
    public function index()
    {
        return view('dashboard.notifications', [
            'notifications' => Notification::where('user_id', Auth::user()->id)->latest()->get()
        ]);
    }

    public function delete(Notification $notification)
    {
        $notification->delete();

        Session::flash('success', [
            'action' => 'Success!',
            'message' => "Notification deleted"
        ]);

        return redirect()->route('dashboard.notifications.index');
    }

    public function toggleRead(Notification $notification)
    {
        $notification->read = !$notification->read;
        $notification->save();

        $status = $notification->read ? 'read' : 'unread';

        Session::flash('success', [
            'action' => 'Success!',
            'message' => "Notification marked as $status"
        ]);

        return redirect()->route('dashboard.notifications.index');
    }
}
