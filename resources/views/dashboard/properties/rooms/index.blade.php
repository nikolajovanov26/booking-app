@extends('layouts.auth')

@section('content')
    <div class="flex flex-col h-full space-y-10">
        <div class="flex justify-end">
            <a href="{{ route('dashboard.rooms.create', ['property' => $property]) }}" class="bg-blue-600 hover:bg-blue-900 transition py-4 px-6 text-white font-semibold text-lg rounded-xl">Add new room</a>
        </div>
        <div class="bg-white shadow-xl rounded-xl overflow-hidden">
            <table class="text-left w-full">
                <thead>
                    <tr>
                        <th class="w-2/12 px-6 py-6 text-lg bg-gray-800 text-white">Name</th>
                        <th class="w-1/12 px-6 py-6 text-lg bg-gray-800 text-white">View</th>
                        <th class="w-1/12 px-6 py-6 text-lg bg-gray-800 text-white">Persons</th>
                        <th class="w-2/12 px-6 py-6 text-lg bg-gray-800 text-white text-center">Price per Night</th>
                        <th class="w-1/12 px-6 py-6 text-lg bg-gray-800 text-white text-center">Size</th>
                        <th class="w-1/12 px-6 py-6 text-lg bg-gray-800 text-white text-center">Status</th>
                        <th class="w-3/12 px-6 py-6 text-lg bg-gray-800 text-white"></th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($rooms as $room)
                        <tr class="hover:bg-gray-100 transition">
                            <td class="px-6 py-4">{{ $room->type->label }}</td>
                            <td class="px-6 py-4">{{ $room->view->label }}</td>
                            <td class="px-6 py-4">
                                <div class="flex">
                                    @for($i = 0; $i < $room->number_of_persons; $i++)
                                        @include('icons.person', ['attributes' => 'w-5 h-5'])
                                    @endfor
                                </div>
                            </td>
                            <td class="px-6 py-4 text-center font-semibold text-lg">{{ $room->price }} &euro;</td>
                            <td class="px-6 py-4 text-center">{{ $room->size }} m<sup>2</sup></td>
                            <td class="px-6 py-4 text-center">
                                @if($room->status->name == 'active')
                                    <span class="bg-blue-600 text-center tracking-wide text-white px-4 pt-0.5 pb-1 rounded-xl">Active</span>
                                @elseif($room->status->name == 'booked')
                                    <span class="bg-green-600 text-center tracking-wide text-white px-4 pt-0.5 pb-1 rounded-xl">Booked</span>
                                @elseif($room->status->name == 'draft')
                                    <span class="bg-orange-600 text-center tracking-wide text-white px-4 pt-0.5 pb-1 rounded-xl">Draft</span>
                                @endif
                            </td>
                            <td class="flex items-center justify-end px-6 py-4 text-right space-x-3">
                                <a href="{{ route('dashboard.properties.show', ['property' => $property]) }}" class="text-blue-600 hover:text-blue-900 transition">View Property</a>
                                <a href="{{ route('dashboard.rooms.edit', ['room' => $room->id, 'property' => $property]) }}" class="bg-blue-600 text-white rounded px-3 py-2 hover:bg-blue-800 transition">Edit</a>
                                <button class="bg-red-700 text-white rounded px-3 py-2">Delete</button>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection
