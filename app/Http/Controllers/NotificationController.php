<?php

namespace App\Http\Controllers;

use App\Models\Notification;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class NotificationController extends Controller
{
    public function index()
    {
        return view('notifications', [
            'notifications' => Notification::where('user_id', Auth::user()->id)->get()
        ]);
    }

    public function delete(Notification $notification)
    {
        if (Auth::user()->cannot('delete', $notification)) {
            abort(403);
        }

        $notification->delete();

        Session::flash('success', [
            'action' => 'Success!',
            'message' => "Notification deleted"
        ]);

        return redirect()->route('notifications.index');
    }

    public function toggleRead(Notification $notification)
    {
        if (Auth::user()->cannot('update', $notification)) {
            abort(403);
        }

        $notification->read = !$notification->read;
        $notification->save();

        $status = $notification->read ? 'read' : 'unread';

        Session::flash('success', [
            'action' => 'Success!',
            'message' => "Notification marked as $status"
        ]);

        return redirect()->route('notifications.index');
    }
}
