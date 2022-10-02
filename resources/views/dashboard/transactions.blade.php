@extends('layouts.auth')

@section('content')
    <div class="flex flex-col w-full space-y-8">
        @if($transactions->count() > 0)
            <div class="py-3 bg-blue-100 mb-6">
                Filter
            </div>
            <table class="bg-white w-full rounded overflow-hidden shadow-lg">
                <thead class="bg-gray-700 text-white text-left">
                <tr>
                    <th class="w-2/12 p-4">User</th>
                    <th class="w-3/12 p-4">Property</th>
                    <th class="w-2/12 p-4">Room</th>
                    <th class="w-1/12 p-4">Amount</th>
                    <th class="w-2/12 p-4">Date</th>
                    <th class="w-2/12 p-4">Status</th>
                </tr>
                </thead>
                <tbody class="text-left">
                @foreach($transactions as $transaction)
                    <tr class="hover:bg-gray-100 transition">
                        <td class="w-2/12 p-4">
                            {{ $transaction->customer->profile->fullName() }}
{{--                            <a href=""--}}
{{--                               class="text-blue-700 hover:underline hover:text-blue-900 transition">{{ $transaction->customer->profile->fullName() }}</a>--}}
                        </td>
                        <td class="w-3/12 p-4">
                            <a href="{{ route('properties.show', ['property' => $transaction->property_id]) }}"
                               class="text-blue-700 hover:underline hover:text-blue-900 transition">{{ ucwords($transaction->property->name) }}</a>
                        </td>
                        <td class="w-2/12 p-4">{{ $transaction->room->roomType->label }}</td>
                        <td class="w-1/12 p-4">{{ $transaction->total }} &euro;</td>
                        <td class="w-2/12 p-4">{{ $transaction->created_at->format('d M Y') }}</td>
                        <td class="w-2/12 p-4">
                            <span
                                class="text-center tracking-wide text-white px-4 pt-0.5 pb-1 rounded-xl
                                @switch($transaction->transactionStatus->name)
                                    @case('paid') bg-green-600 @break
                                    @case('on-hold') bg-orange-600 @break
                                    @case('refunded') bg-red-600 @break
                                    @default
                                @endswitch
                                ">
                                {{ $transaction->transactionStatus->label }}
                            </span>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        @else
            <p class="text-center text-2xl mt-5">No transactions have been made &#128532;</p>
        @endif
    </div>
@endsection
