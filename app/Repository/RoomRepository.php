<?php

namespace App\Repository;

use App\Models\Property;
use App\Models\Room;
use App\Models\RoomStatus;
use App\Models\RoomType;
use App\Models\RoomView;

class RoomRepository
{
    public function store(array $data, Property $property, $status): void
    {
        Room::create([
            'property_id' => $property->id,
            'room_status_id' => RoomStatus::firstWhere('name', $status)->id,
            'room_type_id' => RoomType::firstWhere('label', $data['room_type'])->id,
            'room_view_id' => RoomView::firstWhere('label', $data['room_view'])->id,
            'number_of_persons' => $data['number_of_persons'],
            'size' => $data['size'],
            'price' => $data['price'],
            'large_beds' => $data['large_beds'] ?? 0,
            'double_beds' => $data['double_beds'] ?? 0,
            'single_beds' => $data['single_beds'] ?? 0,
            'sofa_beds' => $data['sofa_beds'] ?? 0,
        ]);
    }

    public function update(array $data, Room $room, $status): void
    {
        $room->room_status_id = RoomStatus::firstWhere('name', $status)->id;
        $room->room_type_id = RoomType::firstWhere('label', $data['room_type'])->id;
        $room->room_view_id = RoomView::firstWhere('label', $data['room_view'])->id;
        $room->number_of_persons = $data['number_of_persons'];
        $room->size = $data['size'];
        $room->price = $data['price'];
        $room->large_beds = $data['large_beds'] ?? 0;
        $room->double_beds = $data['double_beds'] ?? 0;
        $room->single_beds = $data['single_beds'] ?? 0;
        $room->sofa_beds = $data['sofa_beds'] ?? 0;

        if($room->isDirty()) {
            $room->save();
        }
    }
}
