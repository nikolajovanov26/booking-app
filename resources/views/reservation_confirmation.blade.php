@extends('layouts.app')

@section('content')
    @include('components.header', ['label' => 'Reservation'])
    <main>
        <div class="mx-auto max-w-screen-2xl p-8 space-y-12">
            <div class="flex items-start space-x-4">
                <div class="w-2/3">
                    <div class="flex items-center space-x-6 p-3 rounded border bg-white">
                        <img class="w-56 rounded"
                             src="{{ Storage::disk('property_main_images')->url($room->property->main_image ?? 'default_photo.jpg') }}">
                        <div>
                            <h2 class="text-2xl font-semibold">{{ ucwords($room->property->name) }}</h2>
                            <div class="flex items-center">
                                <h3 class="text-lg font-semibold text-gray-600 mr-3">{{ ucwords($room->roomType->label) }}</h3>
                                @for($i=0; $i<$room->number_of_persons; $i++)
                                    @include('icons.person', ['attributes' => 'h-4 w-4'])
                                @endfor
                            </div>
                            <p>{{ $room->roomView->label }}</p>
                            <div class="mt-2 flex space-x-16">
                                <div>
                                    <p class="font-semibold">Check-in</p>
                                    <table>
                                        <tr>
                                            <td class="block mr-2"><span class="font-semibold">Date:</span></td>
                                            <td>{{ $date_from->format('Y-m-d') }}</td>
                                        </tr>
                                        <tr>
                                            <td class="block mr-2"><span class="font-semibold">From:</span></td>
                                            <td>{{ $room->property->check_in_from }}</td>
                                        </tr>
                                        <tr>
                                            <td class="block mr-2"><span class="font-semibold">To:</span></td>
                                            <td>{{ $room->property->check_in_to }}</td>
                                        </tr>
                                    </table>
                                </div>
                                <div>
                                    <p class="font-semibold">Check-out</p>
                                    <table>
                                        <tr>
                                            <td class="block mr-2"><span class="font-semibold">Date:</span></td>
                                            <td>{{ $date_to->format('Y-m-d') }}</td>
                                        </tr>
                                        <tr>
                                            <td class="block mr-2"><span class="font-semibold">From:</span></td>
                                            <td>{{ $room->property->check_out_from }}</td>
                                        </tr>
                                        <tr>
                                            <td class="block mr-2"><span class="font-semibold">To:</span></td>
                                            <td>{{ $room->property->check_out_to }}</td>
                                        </tr>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="mt-8 bg-white rounded overflow-hidden shadow-xl">
                        <iframe class="w-full h-96"
                                style="border:0"
                                loading="lazy"
                                allowfullscreen
                                referrerpolicy="no-referrer-when-downgrade"
                                src="https://www.google.com/maps/embed/v1/place?key={{ env('GOOGLE_MAPS_EMBED_API') }}&q={{ $room->property->country->label }}">
                        </iframe>
                    </div>
                </div>
                <div class="w-1/3 rounded border bg-white px-4 py-6">
                    <form action="{{ route('reserve') }}" method="post">
                        @csrf
                        <input name="room_id" value="{{ $room->id }}" type="hidden">
                        <input name="nights" value="{{ $date_from->diffInDays($date_to) }}" type="hidden">
                        <input name="price" value="{{ $room->price * $date_from->diffInDays($date_to) }}" type="hidden">
                        <input name="date_from" value="{{ $date_from }}" type="hidden">
                        <input name="date_to" value="{{ $date_to }}" type="hidden">
                        <h2 class="font-semibold text-xl mb-3">Select Payment Method</h2>
                        <div class="flex flex-col space-y-3 mb-5 border-b border-gray-200 pb-5">
                            @foreach($room->property->paymentMethods as $paymentMethod)
                                <div class="flex">
                                    <div class="flex items-center h-5">
                                        <input id="helper-radio" aria-describedby="helper-radio-text" checked
                                               name="paymentMethod" type="radio" value="{{ $paymentMethod->name }}"
                                               class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500focus:ring-2 ">
                                    </div>
                                    <div class="ml-2 text-sm">
                                        <label for="helper-radio"
                                               class="font-medium text-gray-900">{{ $paymentMethod->label }}</label>
                                        <p id="helper-radio-text"
                                           class="text-sm font-normal text-gray-500">{{ $paymentMethod->explanation }}</p>
                                    </div>
                                </div>

                            @endforeach
                        </div>
                        <table class="w-full">
                            <tr class="flex justify-between">
                                <td class="block mr-2">Price per night:</td>
                                <td>{{ $room->price }} &euro;</td>
                            </tr>
                            <tr class="flex justify-between">
                                <td class="block mr-2">Nights:</td>
                                <td>{{ $date_from->diffInDays($date_to) }}</td>
                            </tr>
                            <tr class="flex justify-between">
                                <td class="block mr-2"><span class="font-bold">Total:</span></td>
                                <td class="font-bold">{{ $room->price * $date_from->diffInDays($date_to) }} &euro;</td>
                            </tr>
                        </table>
                        <button class="w-full text-lg mt-4 h-14 rounded font-semibold text-white bg-blue-600 hover:bg-blue-900 transition">
                            Reserve
                        </button>
                    </form>

                </div>
            </div>
        </div>
    </main>
@endsection
