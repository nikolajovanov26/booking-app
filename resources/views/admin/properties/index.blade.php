@extends('layouts.auth')

@section('content')
    <div class="flex flex-col h-full space-y-10">
        <div class="bg-white shadow-xl rounded-xl overflow-hidden">
            <table class="text-left w-full">
                <div class="p-4 flex items-center justify-between bg-blue-grad-dark">
                    <div class="flex items-center">
                        <form method="get" action="">
                            @csrf
                            <input class="border-gray-100 mr-3 focus:ring-blue-grad-light focus:border-blue-grad-light rounded text-lg" type="text" name="search" placeholder="Filter Properties" value="{{ request()->get('search') }}">
                            <button class="bg-blue-grad-light border-2 border-blue-grad-light hover:border-white transition hover:bg-gray-800 px-6 py-2 text-white font-semibold rounded text-lg">Search</button>
                        </form>
                        @if(request()->get('search'))
                            <form method="get" action="">
                                <button class="ml-5 flex space-x-2 items-center hover:text-white hover:bg-red-600 transition py-2 px-3 text-white font-semibold text-lg rounded cursor-pointer">
                                    @include('icons.bin', ['attributes' => 'h-6 w-6'])
                                    <spam>Reset</spam>
                                </button>
                                @csrf
                            </form>
                        @endif
                    </div>
                </div>
                @if($properties->count() != 0)
                    <thead class="bg-gray-800 text-white text-lg">
                    <tr>
                        <th class="p-4">#</th>
                        <th class="w-2/12 p-4">Name</th>
                        <th class="w-3/12 p-4">Location</th>
                        <th class="w-1/12 p-4 text-center">Rating</th>
                        <th class="w-2/12 p-4 text-center">Status</th>
                        <th class="w-3/12 p-4"></th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($properties as $property)
                        <tr class="hover:bg-gray-100 transition">
                            <td class="p-4">{{ $property->id }}</td>
                            <td class="p-4 capitalize">{{ $property->name }}</td>
                            <td class="p-4">{{ $property->city }} {{ $property->zip_code }}
                                , {{ $property->country->label }}</td>
                            <td class="p-4 text-center">
                                @if($property->reviews_avg_rating > 0.9)
                                    {{ number_format($property->reviews_avg_rating, 1) }}
                                @else
                                    Not rated
                                @endif
                            </td>
                            <td class="w-2/12 p-4 text-center">
                                <span class="text-center tracking-wide text-white px-4 pt-0.5 pb-1 rounded-xl
                                @if($property->propertyStatus->name == 'active')
                                    bg-green-600
                                @elseif($property->propertyStatus->name == 'draft')
                                    bg-orange-600
                                @elseif($property->propertyStatus->name == 'temporary-closed')
                                    bg-red-600
                                @else
                                    bg-gray-600
                                @endif
                                 "> {{ $property->propertyStatus->label }}
                                </span>
                            </td>
                            <td class="flex items-center justify-end p-4 text-right space-x-4">
                                <a href="{{ route('admin.properties.show', ['property' => $property->id]) }}" class="text-blue-600 hover:text-blue-900 transition">Preview</a>
                                <a href="{{ route('admin.rooms.index', ['property' => $property->id]) }}" class="text-blue-600 hover:text-blue-900 transition">Rooms</a>
                                <a href="{{ route('admin.properties.edit', ['property' => $property->id]) }}" class="bg-blue-600 text-white rounded px-3 py-2 hover:bg-blue-800 transition">Edit</a>
                                <button class="bg-red-700 text-white rounded px-3 py-2">Delete</button>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                @endif
            </table>
        </div>
        @if($properties->count() == 0)
            <div class="text-center text-2xl">
                No Properties To Show 🏗️
            </div>
        @else
            {{ $properties->links() }}
        @endif
    </div>
@endsection
