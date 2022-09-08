@extends('layouts.auth')

@section('content')
    <div class="flex flex-col w-full space-y-8">
        <div class="py-3 bg-blue-100 mb-6">
            Filter
        </div>
        <table class="bg-white w-full rounded overflow-hidden shadow-lg">
            <thead class="bg-gray-700 text-white text-left">
                <tr>
                    <th class="w-1/12 p-4">#</th>
                    <th class="w-2/12 p-4">User</th>
                    <th class="w-2/12 p-4">Property</th>
                    <th class="w-2/12 p-4">Room</th>
                    <th class="w-1/12 p-4">Amount</th>
                    <th class="w-1/12 p-4">Date</th>
                    <th class="w-1/12 p-4">Status</th>
                </tr>
            </thead>
            <tbody class="text-left">
                <tr class="hover:bg-gray-100 transition">
                    <td class="w-1/12 p-4">2135</td>
                    <td class="w-2/12 p-4">
                        <a href="" class="text-blue-700 hover:underline hover:text-blue-900 transition">Nikola Jovanov</a>
                    </td>
                    <td class="w-2/12 p-4">
                        <a href="{{ route('properties.show') }}" class="text-blue-700 hover:underline hover:text-blue-900 transition">Hotel Internacional</a>
                    </td>
                    <td class="w-2/12 p-4">Single Room</td>
                    <td class="w-1/12 p-4">30 &euro;</td>
                    <td class="w-1/12 p-4">04.12.2022</td>
                    <td class="w-1/12 p-4">
                        <span class="bg-orange-600 text-center tracking-wide text-white px-4 pt-0.5 pb-1 rounded-xl">Pending</span>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
@endsection
