<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Http\Requests\StorePropertyRequest;
use App\Http\Requests\UpdatePropertyRequest;
use App\Models\Country;
use App\Models\Feature;
use App\Models\PaymentMethod;
use App\Models\Property;
use App\Models\PropertyType;
use App\Repository\PropertyRepository;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class PropertyController extends Controller
{
    private PropertyRepository $propertyRepository;

    public function __construct()
    {
        $this->propertyRepository = new PropertyRepository();
    }

    public function index()
    {
        return view('dashboard.properties.index', [
            'properties' => Property::where('user_id', Auth::user()->id)->get()
        ]);
    }

    public function show(Property $property)
    {
        return view('dashboard.properties.show', [
            'property' => $property
        ]);
    }

    public function create()
    {
        return view('dashboard.properties.create', [
            'types' => PropertyType::all(),
            'countries' => Country::all()->sortBy('label'),
            'features' => Feature::all(),
            'payment_methods' => PaymentMethod::all()
        ]);
    }

    public function store(StorePropertyRequest $request, string $status = 'active')
    {
        if($request->action == 'draft') {
            $status = 'draft';
        }

        $this->propertyRepository->store($request->all(), $status);

        Session::flash('success', [
            'action' => 'Success!',
            'message' => "Your new property has been created"
        ]);

        return redirect()->route('dashboard.properties.index');
    }

    public function edit(Property $property)
    {
        return view('dashboard.properties.edit', [
            'property' => $property,
            'types' => PropertyType::all(),
            'countries' => Country::all()->sortBy('label'),
            'features' => Feature::all(),
            'payment_methods' => PaymentMethod::all()
        ]);
    }

    public function update(UpdatePropertyRequest $request, Property $property, string $status = 'active')
    {
        if($request->action == 'draft') {
            $status = 'draft';
        }

        $this->propertyRepository->update($request->all(), $property, $status);

        Session::flash('success', [
            'action' => 'Success!',
            'message' => "Your property was updated"
        ]);

        return redirect()->route('dashboard.properties.index');
    }

    public function destroy(Property $property)
    {
        $property->delete();

        Session::flash('success', [
            'action' => 'Success!',
            'message' => "A property was deleted"
        ]);

        return view('dashboard.properties.index', [
            'properties' => Property::where('user_id', Auth::user()->id)->get()
        ]);
    }

    public function favorite()
    {
        return view('dashboard.favorites', [
            'properties' => Auth::user()->favorites()->get()
        ]);
    }
}