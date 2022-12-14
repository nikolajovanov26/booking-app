@extends('layouts.auth')

@section('content')
    <div class="flex flex-col h-full space-y-10">
        @if($errors->any())
            <p class="text-red-600">{{$errors->first()}}</p>
        @endif
        <div class="bg-white shadow-xl rounded-xl overflow-hidden">
            <table class="text-left w-full">
                <tbody>
                <div class="px-6 py-4 flex items-center justify-between bg-blue-grad-dark">
                    <div class="flex items-center">

                        <form method="get" action="">
                            @csrf
                            <input class="border-gray-100 mr-3 focus:ring-blue-grad-light focus:border-blue-grad-light rounded text-lg" type="text" name="search" placeholder="Filter Properties" value="{{ old('search') ?? request()->get('search') }}">
                            <input class="border-gray-100 mr-3 focus:ring-blue-grad-light focus:border-blue-grad-light rounded text-lg" type="date" name="date_from" placeholder="Date From" value="{{ old('date_from') ?? request()->get('date_from') }}">
                            <input class="border-gray-100 mr-3 focus:ring-blue-grad-light focus:border-blue-grad-light rounded text-lg" type="date" name="date_to" placeholder="Date To" value="{{ old('date_to') ?? request()->get('date_to') }}">
                            <button class="bg-blue-grad-light border-2 border-blue-grad-light hover:border-white transition hover:bg-gray-800 px-6 py-2 text-white font-semibold rounded text-lg">Search</button>
                        </form>
                        @if(request()->get('search') || request()->get('date_from'))
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
                </tbody>
                @if($transactions->count() != 0)
                    <thead class="bg-gray-800 text-white text-lg">
                    <tr>
                        <th class="w-2/12 p-6">User</th>
                        <th class="w-3/12 p-6">Property</th>
                        <th class="w-2/12 p-6">Room</th>
                        <th class="w-1/12 p-6">Amount</th>
                        <th class="w-2/12 p-6">Date</th>
                        <th class="w-2/12 p-6">Status</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($transactions as $transaction)
                        <tr class="hover:bg-gray-100 transition">
                            <td class="w-2/12 p-6">
                                {{ $transaction->customer->profile->full_name }}
                            </td>
                            <td class="w-3/12 p-6">
                                <a href="{{ route('properties.show', ['property' => $transaction->property->slug]) }}"
                                   class="text-blue-700 hover:underline hover:text-blue-900 transition">{{ ucwords($transaction->property->name) }}</a>
                            </td>
                            <td class="w-2/12 p-6">{{ $transaction->room->roomType->label }}</td>
                            <td class="w-1/12 p-6">{{ $transaction->total }} &euro;</td>
                            <td class="w-2/12 p-6">{{ $transaction->created_at->format('d M Y') }}</td>
                            <td class="w-2/12 p-6">
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
                    @endif
                    </tbody>
            </table>
        </div>

        @if($transactions->count() == 0)
            <div class="text-center text-2xl">
                <p>No transactions have been made &#128532;</p>
            </div>
        @else
            {{ $transactions->links() }}
        @endif
    </div>
@endsection
