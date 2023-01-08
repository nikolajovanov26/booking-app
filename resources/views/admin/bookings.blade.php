@extends('layouts.auth')

@section('content')
    <div class="flex flex-col h-full space-y-10">
        <div class="bg-white shadow-xl rounded-xl overflow-hidden">
            <table class="text-left w-full">
                <div class="px-6 py-4 flex items-center justify-between bg-blue-grad-dark">
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
                @if($bookings->count() != 0)
                    <thead class="bg-gray-800 text-white text-lg">
                    <tr>
                        <th class="p-4">Customer</th>
                        <th class="p-4">Owner</th>
                        <th class="p-4">Property</th>
                        <th class="p-4">Room</th>
                        <th class="p-4">Location</th>
                        <th class="p-4">Price</th>
                        <th class="p-4">Status</th>
                        <th class="p-4 text-center w-1/12">Date From</th>
                        <th class="p-4 text-center w-1/12">Date To</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($bookings as $booking)
                        <tr class="hover:bg-gray-100 transition">
                            <td class="px-6 py-4">{{ ucwords($booking->user->profile->fullName()) }}</td>
                            <td class="px-6 py-4">{{ ucwords($booking->property->owner->profile->fullName()) }}</td>
                            <td class="px-6 py-4">{{ ucwords($booking->property->name) }}</td>
                            <td class="px-6 py-4">{{ $booking->room->roomType->label }}</td>
                            <td class="px-6 py-4 line-clamp-1">{{ $booking->property->city }}, {{ $booking->property->country->label }}</td>
                            <td class="px-6 py-4 whitespace-nowrap">{{ $booking->price }} &euro;</td>
                            <td class="px-6 py-4">
                                <span
                                    class="{{ $booking->bookingStatus->color }} tracking-wide text-white px-4 pt-0.5 pb-1 rounded-xl">{{ $booking->bookingStatus->label }}</span>
                            </td>
                            <td class="px-6 py-4 text-center">{{ $booking->date_from->format('d M Y') }}</td>
                            <td class="px-6 py-4 text-center">{{ $booking->date_to->format('d M Y') }}</td>
                        </tr>
                    @endforeach
                    </tbody>
                    @endif
                    </tbody>
            </table>
        </div>

        @if($bookings->count() == 0)
            <div class="text-center text-2xl">
                <p>Still no bookings? &#128564;</p>
            </div>
        @else
{{--            {{ $properties->links() }}--}}
        @endif
    </div>
@endsection

