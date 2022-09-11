<?php

namespace App\Http\Controllers;

use App\Models\Property;

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
}
