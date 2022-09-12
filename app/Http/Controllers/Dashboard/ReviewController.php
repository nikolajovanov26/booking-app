<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\Review;
use Illuminate\Support\Facades\Auth;

class ReviewController extends Controller
{
    public function index()
    {
        return view('dashboard.reviews', [
            'reviews' => Review::whereIn('property_id', Auth::user()->properties()->get()->pluck('id')->toArray())->get()
        ]);
    }
}
