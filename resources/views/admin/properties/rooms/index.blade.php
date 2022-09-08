@extends('layouts.auth')

@section('content')
    <div class="flex flex-col h-full space-y-16">
        <div class="flex justify-end">
            <a href="{{ route('admin.properties.rooms.create') }}" class="bg-blue-600 hover:bg-blue-900 transition py-4 px-6 text-white font-semibold text-lg rounded-xl">Add new room</a>
        </div>
        <div class="bg-white shadow-xl rounded-xl overflow-hidden">
            <table class="text-left w-full">
                <thead>
                    <tr>
                        <th class="w-2/12 px-6 py-6 text-lg bg-gray-800 text-white">Name</th>
                        <th class="w-1/12 px-6 py-6 text-lg bg-gray-800 text-white">View</th>
                        <th class="w-1/12 px-6 py-6 text-lg bg-gray-800 text-white text-center">Persons</th>
                        <th class="w-2/12 px-6 py-6 text-lg bg-gray-800 text-white text-center">Price per Night</th>
                        <th class="w-1/12 px-6 py-6 text-lg bg-gray-800 text-white text-center">Size</th>
                        <th class="w-1/12 px-6 py-6 text-lg bg-gray-800 text-white text-center">Status</th>
                        <th class="w-3/12 px-6 py-6 text-lg bg-gray-800 text-white"></th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td class="px-6 py-4">Standard Triple Room</td>
                        <td class="px-6 py-4">Sea View</td>
                        <td class="px-6 py-4 text-center">
                            <div class="flex justify-center">
                                @include('icons.person', ['attributes' => 'w-5 h-5'])
                                @include('icons.person', ['attributes' => 'w-5 h-5'])
                                @include('icons.person', ['attributes' => 'w-5 h-5'])
                            </div>
                        </td>
                        <td class="px-6 py-4 text-center font-semibold text-lg">20 &euro;</td>
                        <td class="px-6 py-4 text-center">42 m<sup>2</sup></td>
                        <td class="px-6 py-4 text-center">
                            <span class="bg-green-600 text-center tracking-wide text-white px-4 pt-0.5 pb-1 rounded-xl">active</span>
                        </td>
                        <td class="flex items-center justify-end px-6 py-4 text-right space-x-3">
                            <a href="{{ route('admin.properties.show') }}" class="text-blue-600 hover:text-blue-900 transition">View Property</a>
                            <a href="{{ route('admin.properties.rooms.edit') }}" class="bg-blue-600 text-white rounded px-3 py-2 hover:bg-blue-800 transition">Edit</a>
                            <button class="bg-red-700 text-white rounded px-3 py-2">Delete</button>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
@endsection
