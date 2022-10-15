<?php

namespace App\Http\Controllers;

use App\Http\Requests\PropertyFilterRequest;
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
                ->paginate(10)
        ]);
    }

    public function show(Property $property)
    {
        return view('properties.show', [
            'property' => $property
        ]);
    }

    public function filter(PropertyFilterRequest $request)
    {
        $properties = $this->propertyRepository->filter($request->all());

        return view('properties.filtered', [
            'properties' => $properties,
            'types' => PropertyType::all()
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
        return view('properties.favorite', [
            'properties' => Auth::user()->favorites()->valid()
                ->withAvg('reviews', 'rating')
                ->withCount('reviews')
                ->withMin('rooms', 'price')
                ->paginate(10)
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
