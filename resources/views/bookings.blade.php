@extends('layouts.app')

@section('content')
    @include('components.header', ['label' => 'My Bookings'])
    <div class="mx-auto max-w-screen-2xl py-8 sm:px-6 lg:px-8">
        <div class="flex flex-col h-full space-y-8">
            @if($bookings->count() > 0)
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
                                <td class="p-4">{{ ucwords($booking->property->name) }}</td>
                                <td class="p-4">{{ $booking->room->roomType->label }}</td>
                                <td class="p-4">{{ $booking->property->city }} {{ $booking->property->zip_code }}, {{ $booking->property->country->label }}</td>
                                <td class="p-4">{{ $booking->price }} &euro;</td>
                                <td class="p-4">
                                    <span class="tracking-wide text-white px-4 pt-0.5 pb-1 rounded-xl {{ $booking->bookingStatus->color }}
                                    ">{{ $booking->bookingStatus->label }}</span>
                                </td>
                                <td class="p-4">{{ $booking->date_from->format('d M Y') }}</td>
                                <td class="p-4">{{ $booking->date_to->format('d M Y') }}</td>
                                <td class="flex items-center justify-end p-4 text-right space-x-4">
                                    @if ($booking->bookingStatus->isCancellable)
                                        <form method="post" action="{{ route('bookings.cancel', ['booking' => $booking->id]) }}">
                                            @csrf
                                            <button class="bg-red-700 hover:bg-red-900 transition text-white rounded px-3 py-2">
                                                Cancel
                                            </button>
                                        </form>
                                    @endif
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            @else
                <p class="text-center text-2xl mt-12">Still no bookings? &#128564;</p>
            @endif
        </div>
    </div>
@endsection
