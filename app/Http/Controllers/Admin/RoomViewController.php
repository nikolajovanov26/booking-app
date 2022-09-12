<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\RoomView;
use Illuminate\Http\Request;

class RoomViewController extends Controller
{
    public function __invoke()
    {
        return view('admin.room-views');
    }
}
