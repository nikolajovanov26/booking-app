<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\SearchFilterRequest;
use App\Models\Country;
use App\Models\Feature;
use App\Models\PaymentMethod;
use App\Models\Property;
use App\Models\PropertyType;
use Illuminate\Support\Facades\Auth;

class PropertyController extends Controller
{
    public function index(SearchFilterRequest $request)
    {
        $properties = Property:: with('propertyStatus', 'country')
            ->withAvg('reviews', 'rating');

        if ($request->get('search')) {
            $properties->where('name', 'like', '%' . $request->get('search') . '%');
        }

        return view('admin.properties.index', [
            'properties' => $properties->paginate(10)
        ]);
    }

    public function show(Property $property)
    {
        return view('admin.properties.show', [
            'property' => $property
        ]);
    }

    public function create()
    {
        return view('admin.properties.create', [
            'types' => PropertyType::all(),
            'countries' => Country::all()->sortBy('label'),
            'features' => Feature::all(),
            'payment_methods' => PaymentMethod::all()
        ]);
    }

    public function store()
    {
        //
    }

    public function edit(Property $property)
    {
        return view('admin.properties.edit', [
            'property' => $property,
            'types' => PropertyType::all(),
            'countries' => Country::all()->sortBy('label'),
            'features' => Feature::all(),
            'payment_methods' => PaymentMethod::all()
        ]);
    }

    public function update(Property $property)
    {
        //
    }

    public function destroy(Property $property)
    {
        //
    }
}
