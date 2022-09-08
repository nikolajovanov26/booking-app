@extends('layouts.auth')

@section('content')
    <div class="flex flex-col h-full space-y-16">
        <div class="flex justify-end">
            <button class="bg-blue-600 py-4 px-6 text-white font-semibold text-lg rounded-xl">Add new property</button>
        </div>
        <div class="bg-white shadow-xl rounded-xl overflow-hidden">
            <table class="text-left w-full">
                <thead>
                    <tr>
                        <th class="w-3/12 px-8 py-6 text-lg bg-gray-800 text-white">Name</th>
                        <th class="w-5/12 px-8 py-6 text-lg bg-gray-800 text-white">Location</th>
                        <th class="w-1/12 px-8 py-6 text-lg bg-gray-800 text-white text-center">Rating</th>
                        <th class="w-1/12 px-8 py-6 text-lg bg-gray-800 text-white"></th>
                        <th class="w-2/12 px-8 py-6 text-lg bg-gray-800 text-white"></th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td class="px-8 py-4">Hotel Internacional</td>
                        <td class="px-8 py-4">Veles 1400, Macedonia</td>
                        <td class="px-8 py-4 text-center">4.5</td>
                        <td class="px-8 py-4">
                            <span class="bg-green-600 text-center tracking-wide text-green-100 px-4 pt-0.5 pb-1 rounded-xl">active</span>
                        </td>
                        <td class="flex items-center justify-end px-8 py-4 text-right space-x-4">
                            <a>View</a>
                            <a>Edit</a>
                            <button class="bg-red-700 text-white rounded px-3 py-2">Delete</button>
                        </td>
                    </tr>
                    <tr>
                        <td class="px-8 py-4">Hotel Internacional</td>
                        <td class="px-8 py-4">Veles 1400, Macedonia</td>
                        <td class="px-8 py-4 text-center">4.5</td>
                        <td class="px-8 py-4 text-center">
                            <span class="bg-orange-700 tracking-wide text-orange-100 px-4 pt-0.5 pb-1 rounded-xl">draft</span>
                        </td>
                        <td class="flex items-center justify-end px-8 py-4 text-right space-x-4">
                            <a>View</a>
                            <a>Edit</a>
                            <button class="bg-red-700 text-white rounded px-3 py-2">Delete</button>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>

    </div>
@endsection
