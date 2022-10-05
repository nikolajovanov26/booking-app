<?php

namespace App\Http\Controllers;

use App\Models\Booking;
use App\Models\Property;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class PropertyController extends Controller
{
    public function index()
    {
        return view('properties.index', [
            'properties' => Property::paginate(10)
        ]);
    }

    public function show(Property $property)
    {
        return view('properties.show', [
            'property' => $property
        ]);
    }

    public function trending()
    {
        $properties = Property::all();

        foreach ($properties as $property) {
            $property->bookings = Booking::where('property_id', $property->id)->where('created_at', '<=', now()->subMonth())->count();
        }

        return view('properties.trending', [
            'properties' => $properties
                ->where('bookings', '>', 0)
                ->sortByDesc('bookings')
                ->take(20)
        ]);
    }

    public function favorite()
    {
        return view('properties.favorite', [
            'properties' => Auth::user()->favorites()->paginate(10)
        ]);
    }

    public function toggleFavorite(Property $property)
    {
        if (Auth::user()->favorites()->get()->contains($property)) {
            Auth::user()->favorites()->detach($property);

            Session::flash('success', [
                'action' => 'Success!',
                'message' => "Property removed from favorites"
            ]);
        } else {
            Auth::user()->favorites()->attach($property);

            Session::flash('success', [
                'action' => 'Success!',
                'message' => "Property marked as favorite"
            ]);
        }

        return back();
    }
}
