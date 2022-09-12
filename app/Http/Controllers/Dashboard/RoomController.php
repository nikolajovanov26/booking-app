<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\Property;
use App\Models\Room;
use App\Models\RoomType;
use App\Models\RoomView;

class RoomController extends Controller
{
    public function index(Property $property)
    {
        return view('dashboard.properties.rooms.index', [
            'property' => $property,
            'rooms' => Room::where('property_id', $property->id)->get()
        ]);
    }

    public function create(Property $property)
    {
//        return view('dashboard.properties.create', [
//            'types' => PropertyType::all(),
//            'countries' => Country::all()->sortBy('label'),
//            'features' => Feature::all()
//        ]);
    }

    public function store(Property $property)
    {
        //
    }

    public function edit(Property $property, Room $room)
    {
        return view('dashboard.properties.rooms.edit', [
            'property' => $property,
            'room' => $room,
            'views' => RoomView::all(),
            'types' => RoomType::all()
        ]);
    }

    public function update(Property $property, Room $room)
    {
        //
    }

    public function destroy(Property $property, Room $room)
    {
        //
    }
}
