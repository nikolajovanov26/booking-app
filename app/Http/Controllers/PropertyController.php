<?php

namespace App\Http\Controllers;

use App\Http\Requests\PropertyFilterRequest;
use App\Http\Requests\PropertyRoomRequest;
use App\Models\Booking;
use App\Models\Property;
use App\Models\PropertyType;
use App\Repository\PropertyRepository;
use Illuminate\Support\Facades\Auth;
use Session;

class PropertyController extends Controller
{
    private PropertyRepository $propertyRepository;

    public function __construct()
    {
        $this->propertyRepository = new PropertyRepository();
    }

    public function index()
    {
        return view('properties.index', [
            'properties' => Property::valid()
                ->withAvg('reviews', 'rating')
                ->withCount('reviews')
                ->withMin('rooms', 'price')
                ->with('country')
                ->paginate(10)
        ]);
    }

    public function show(Property $property, PropertyRoomRequest $request)
    {
        $property = $this->propertyRepository->filterRooms($property, $request->all());

        return view('properties.show', [
            'property' => $property,
            'available' => $property->rooms->count() != 0,
            'user' => Auth::user() ?? null
        ]);
    }

    public function filter(PropertyFilterRequest $request)
    {
        $properties = $this->propertyRepository->filter($request->all());

        return view('properties.filtered', [
            'properties' => $properties,
            'types' => PropertyType::all(),
        ]);
    }

    public function trending()
    {
        $properties = Property::valid()
            ->withAvg('reviews', 'rating')
            ->withCount('reviews')
            ->withMin('rooms', 'price')
            ->with('country')
            ->withCount(['bookings', 'bookings as last_month_bookings' => function ($query) {
                $query->where('created_at', '>=', now()->subMonth());
            }])
            ->get();

        return view('properties.trending', [
            'properties' => $properties
                ->where('last_month_bookings', '>', 0)
                ->sortByDesc('last_month_bookings')
                ->take(20)
        ]);
    }

    public function favorite()
    {
        $user = Auth::user();

        return view('properties.favorite', [
            'properties' => $user->favorites()->valid()
                ->withAvg('reviews', 'rating')
                ->withCount('reviews')
                ->withMin('rooms', 'price')
                ->with('country')
                ->paginate(10),
            'user_id' => $user?->id
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
