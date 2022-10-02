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
                        <th class="w-1.5/12 p-4">Property</th>
                        <th class="w-1.5/12 p-4">Room</th>
                        <th class="w-2/12 p-4">Location</th>
                        <th class="w-1/12 p-4">Price</th>
                        <th class="w-2/12 p-4">Status</th>
                        <th class="w-1.5/12 p-4">Date From</th>
                        <th class="w-1.5/12 p-4">Date To</th>
                        <th class="w-1/12 p-4"></th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($bookings as $booking)
                        <tr class="hover:bg-gray-100 transition">
                            <td class="px-6 py-4">{{ ucwords($booking->property->name) }}</td>
                            <td class="px-6 py-4">{{ $booking->room->roomType->label }}</td>
                            <td class="px-6 py-4">{{ $booking->property->city }} {{ $booking->property->zip_code }}, {{ $booking->property->country->label }}</td>
                            <td class="px-6 py-4">{{ $booking->price }} &euro;</td>
                            <td class="px-6 py-4">
                                <span class="tracking-wide text-white px-4 pt-0.5 pb-1 rounded-xl
                                @switch($booking->bookingStatus->name)
                                    @case('paid') bg-green-600 @break
                                    @case('on-hold') bg-orange-600 @break
                                    @case('refunded') bg-red-600 @break
                                    @default bg-gray-700
                                @endswitch
                                ">{{ $booking->bookingStatus->label }}</span>
                            </td>
                            <td class="px-6 py-4">{{ $booking->date_from->format('d M Y') }}</td>
                            <td class="px-6 py-4">{{ $booking->date_to->format('d M Y') }}</td>
                            <td class="flex items-center justify-end px-6 py-4 text-right space-x-4">
                                @switch($booking->bookingStatus->name)
                                    @case('paid')
                                        <button class="bg-red-700 hover:bg-red-900 transition text-white rounded px-3 py-2">
                                            Refund
                                        </button>
                                        @break
                                    @case('pay-at-property')
                                        <button class="bg-red-700 hover:bg-red-900 transition text-white rounded px-3 py-2">
                                            Cancel
                                        </button>
                                        @break
                                    @default
                                @endswitch
                            </td>
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
