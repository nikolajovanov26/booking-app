@extends('layouts.auth')

@section('content')
    <div class="flex flex-col h-full space-y-8">
        @if($bookings->count() > 0)
            <div class="bg-blue-100 h-12 flex items-center">
                filter
            </div>
            <div class="bg-white shadow-xl rounded-xl overflow-hidden">
                <table class="text-left w-full">
                    <thead class="bg-gray-800 text-white text-lg">
                    <tr>
                        <th class="p-4">Customer</th>
                        <th class="p-4">Property</th>
                        <th class="p-4">Room</th>
                        <th class="p-4">Location</th>
                        <th class="p-4">Price</th>
                        <th class="p-4">Status</th>
                        <th class="p-4 text-center">Date From</th>
                        <th class="p-4 text-center">Date To</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($bookings as $booking)
                        <tr class="hover:bg-gray-100 transition">
                            <td class="px-6 py-4">{{ ucwords($booking->user->profile->fullName()) }}</td>
                            <td class="px-6 py-4">{{ ucwords($booking->property->name) }}</td>
                            <td class="px-6 py-4">{{ $booking->room->type->label }}</td>
                            <td class="px-6 py-4 line-clamp-1">{{ $booking->property->city }}, {{ $booking->property->country->label }}</td>
                            <td class="px-6 py-4">{{ $booking->price }} &euro;</td>
                            <td class="px-6 py-4">
                                <span
                                    class="bg-green-600 tracking-wide text-white px-4 pt-0.5 pb-1 rounded-xl">paid</span>
                            </td>
                            <td class="px-6 py-4 text-center">{{ $booking->date_from }}</td>
                            <td class="px-6 py-4 text-center">{{ $booking->date_to }}</td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        @else
            <p class="text-center text-2xl mt-5">Still no bookings? &#128564;</p>
        @endif
    </div>
@endsection
