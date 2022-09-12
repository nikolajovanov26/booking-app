<?php

namespace App\Http\Controllers;

use App\Models\Property;
use Illuminate\Support\Facades\Auth;

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

    public function favorite()
    {
        return view('properties.favorite', [
            'properties' => Auth::user()->favorites()->paginate(10)
        ]);
    }
}
