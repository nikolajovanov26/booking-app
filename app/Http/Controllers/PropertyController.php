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
        $user = Auth::user();

        return view('properties.index', [
            'properties' => Property::valid()
                ->withAvg('reviews', 'rating')
                ->withCount('reviews')
                ->withMin('rooms', 'price')
                ->with('country')
                ->paginate(10),
            'user' => $user->load('favorites')
        ]);
    }

    public function show(Property $property, PropertyRoomRequest $request)
    {
        $property = $this->propertyRepository->filterRooms($property, $request->all());

        return view('properties.show', [
            'property' => $property,
            'available' => $property->rooms->count() != 0
        ]);
    }

    public function filter(PropertyFilterRequest $request)
    {
        $user = Auth::user();

        $properties = $this->propertyRepository->filter($user, $request->all());

        return view('properties.filtered', [
            'properties' => $properties,
            'types' => PropertyType::all(),
            'user' => $user->load('favorites')
        ]);
    }

    public function trending()
    {
        $properties = Property::valid()
            ->withAvg('reviews', 'rating')
            ->withCount('reviews')
            ->withMin('rooms', 'price')
            ->get();

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
        $user = Auth::user();

        return view('properties.favorite', [
            'properties' => $user->favorites()->valid()
                ->withAvg('reviews', 'rating')
                ->withCount('reviews')
                ->withMin('rooms', 'price')
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
