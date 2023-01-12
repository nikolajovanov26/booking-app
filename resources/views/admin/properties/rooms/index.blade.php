@extends('layouts.auth')

@section('content')
    <div class="flex flex-col h-full space-y-10">
        <div class="bg-white shadow-xl rounded-xl overflow-hidden">
            <table class="text-left w-full">
                <div class="p-4 flex items-center justify-end bg-blue-grad-dark">
                    <div class="flex items-center">
                        <a href="{{ route('admin.rooms.create', ['property' => $property]) }}"
                           class="bg-white hover:text-white hover:bg-blue-grad-light transition py-3 px-6 text-blue-grad-dark font-semibold text-lg rounded">Add
                            New Room</a>
                    </div>
                </div>
                @if($rooms->count() != 0)
                    <thead>
                    <tr>
                        <th class="w-2/12 px-6 py-6 text-lg bg-gray-800 text-white">Name</th>
                        <th class="w-2/12 px-6 py-6 text-lg bg-gray-800 text-white">View</th>
                        <th class="w-1/12 px-6 py-6 text-lg bg-gray-800 text-white">Persons</th>
                        <th class="w-2/12 px-6 py-6 text-lg bg-gray-800 text-white text-center">Price per Night</th>
                        <th class="w-1/12 px-6 py-6 text-lg bg-gray-800 text-white text-center">Size</th>
                        <th class="w-1/12 px-6 py-6 text-lg bg-gray-800 text-white text-center">Status</th>
                        <th class="w-2/12 px-6 py-6 text-lg bg-gray-800 text-white"></th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($rooms as $room)
                        <tr class="hover:bg-gray-100 transition">
                            <td class="px-6 py-4">{{ $room->roomType->label }}</td>
                            <td class="px-6 py-4">{{ $room->roomView->label }}</td>
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
                                    <span class="
                                    @if($room->roomStatus->name == 'active')
                                        bg-blue-600
                                    @elseif($room->roomStatus->name == 'booked')
                                        bg-green-600
                                    @elseif($room->roomStatus->name == 'draft')
                                        bg-orange-600
                                    @endif
                                    text-center tracking-wide text-white px-4 pt-0.5 pb-1 rounded-xl">
                                        {{ $room->roomStatus->label }}
                                    </span>
                            </td>
                            <td class="flex items-center justify-end px-6 py-4 text-right space-x-3">
                                <a href="{{ route('admin.rooms.edit', ['room' => $room->id, 'property' => $property]) }}"
                                   class="bg-blue-600 text-white rounded px-3 py-2 hover:bg-blue-800 transition">Edit</a>
                                <form method="post"
                                      action="{{ route('admin.rooms.destroy', ['property' => $property->id, 'room' => $room->id]) }}">
                                    @csrf
                                    @method('DELETE')
                                    <button class="bg-red-700 text-white rounded px-3 py-2">Delete</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                @endif
            </table>
        </div>
        @if($rooms->count() == 0)
            <div class="text-center text-2xl">
                No Rooms In Property 🔧
            </div>
        @else
            {{ $rooms->links() }}
        @endif
    </div>
@endsection
