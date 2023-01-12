<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\RoomRequest;
use App\Models\Property;
use App\Models\Room;
use App\Models\RoomType;
use App\Models\RoomView;
use App\Repository\RoomRepository;
use Illuminate\Support\Facades\Session;

class RoomController extends Controller
{
    private RoomRepository $roomRepository;

    public function __construct()
    {
        $this->roomRepository = new RoomRepository();
    }

    public function index(Property $property)
    {
        return view('admin.properties.rooms.index', [
            'property' => $property,
            'rooms' => Room::where('property_id', $property->id)->paginate(10)
        ]);
    }

    public function create(Property $property)
    {
        return view('admin.properties.rooms.create', [
            'property' => $property,
            'views' => RoomView::all(),
            'types' => RoomType::all()
        ]);
    }

    public function store(RoomRequest $request, Property $property, string $status = 'active')
    {
        if ($request->action == 'draft') {
            $status = 'draft';
        }

        $this->roomRepository->store($request->all(), $property, $status);

        Session::flash('success', [
            'action' => 'Success!',
            'message' => "Your new room was added to your property"
        ]);

        return redirect()->route('admin.rooms.index', ['property' => $property]);
    }

    public function edit(Property $property, Room $room)
    {
        return view('admin.properties.rooms.edit', [
            'property' => $property,
            'room' => $room,
            'views' => RoomView::all(),
            'types' => RoomType::all()
        ]);
    }

    public function update(RoomRequest $request, Property $property, Room $room, string $status = 'active')
    {
        if ($room->property_id != $property->id) {
            abort(404);
        }

        if ($request->action == 'draft') {
            $status = 'draft';
        }

        $this->roomRepository->update($request->all(), $room, $status);

        Session::flash('success', [
            'action' => 'Success!',
            'message' => "Room was updated"
        ]);

        return redirect()->route('admin.rooms.index', ['property' => $property]);
    }

    public function destroy(Property $property, Room $room)
    {
        if ($room->property_id != $property->id) {
            abort(404);
        }

        $room->delete();

        Session::flash('success', [
            'action' => 'Success!',
            'message' => "A room was deleted from your property"
        ]);

        return redirect()->route('admin.rooms.index', ['property' => $property]);
    }
}
