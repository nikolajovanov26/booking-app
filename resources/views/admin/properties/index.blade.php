@extends('layouts.auth')

@section('content')
    <div class="flex flex-col h-full space-y-16">
        <div class="flex justify-end">
            <a href="{{ route('admin.properties.create') }}" class="bg-blue-600 hover:bg-blue-900 transition py-4 px-6 text-white font-semibold text-lg rounded-xl">Add new property</a>
        </div>
        <div class="bg-white shadow-xl rounded-xl overflow-hidden">
            <table class="text-left w-full">
                <thead class="bg-gray-800 text-white text-lg">
                    <tr>
                        <th class="w-1/12 px-6 py-6"></th>
                        <th class="w-2/12 px-6 py-6">Name</th>
                        <th class="w-3/12 px-6 py-6">Location</th>
                        <th class="w-1/12 px-6 py-6 text-center">Rating</th>
                        <th class="w-1/12 px-6 py-6 text-center">Status</th>
                        <th class="w-3/12 px-6 py-6"></th>
                    </tr>
                </thead>
                <tbody>
                    <tr class="hover:bg-gray-100 transition">
                        <td class="px-6 py-4"></td>
                        <td class="px-6 py-4">Hotel Internacional</td>
                        <td class="px-6 py-4">Veles 1400, Macedonia</td>
                        <td class="px-6 py-4 text-center">4.5</td>
                        <td class="px-6 py-4 text-center">
                            <span class="bg-green-600 text-center tracking-wide text-white px-4 pt-0.5 pb-1 rounded-xl">active</span>
                        </td>
                        <td class="flex items-center justify-end px-6 py-4 text-right space-x-4">
                            <a href="{{ route('admin.properties.show') }}" class="text-blue-600 hover:text-blue-900 transition">Preview</a>
                            <a href="{{ route('admin.properties.rooms.index') }}" class="text-blue-600 hover:text-blue-900 transition">Rooms</a>
                            <a href="{{ route('admin.properties.edit') }}" class="bg-blue-600 text-white rounded px-3 py-2 hover:bg-blue-800 transition">Edit</a>
                            <button class="bg-red-700 text-white rounded px-3 py-2">Delete</button>
                        </td>
                    </tr>
                    <tr class="hover:bg-gray-100 transition">
                        <td class="px-6 py-4"></td>
                        <td class="px-6 py-4">Hotel Internacional</td>
                        <td class="px-6 py-4">Veles 1400, Macedonia</td>
                        <td class="px-6 py-4 text-center">4.5</td>
                        <td class="px-6 py-4 text-center">
                            <span class="bg-orange-700 tracking-wide text-white px-4 pt-0.5 pb-1 rounded-xl">draft</span>
                        </td>
                        <td class="flex items-center justify-end px-6 py-4 text-right space-x-4">
                            <a href="{{ route('admin.properties.show') }}" class="text-blue-600 hover:text-blue-900 transition">Preview</a>
                            <a href="{{ route('admin.properties.rooms.index') }}" class="text-blue-600 hover:text-blue-900 transition">Rooms</a>
                            <a href="{{ route('admin.properties.edit') }}" class="bg-blue-600 text-white rounded px-3 py-2 hover:bg-blue-800 transition">Edit</a>
                            <button class="bg-red-700 text-white rounded px-3 py-2">Delete</button>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>

    </div>
@endsection
