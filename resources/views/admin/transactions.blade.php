@extends('layouts.auth')

@section('content')
    <div x-data="">
        <div class="flex flex-col w-full space-y-8">
            @if($transactions->count() > 0)
                <div class="py-3 bg-blue-100 mb-6">
                    Filter
                </div>
                <div class="bg-white w-full rounded shadow-lg">
                    <div class="bg-gray-700 w-full text-white text-left">
                        <div class="flex  w-full">
                            <div class="p-4">#</div>
                            <div class="w-1/12 p-4">Owner</div>
                            <div class="w-1/12 p-4">Customer</div>
                            <div class="w-2/12 p-4">Property</div>
                            <div class="w-1/12 p-4 text-center">Amount</div>
                            <div class="w-2/12 p-4 text-center">Date</div>
                            <div class="w-3/12 p-4 text-center">Status</div>
                            <div class="w-2/12 p-4"></div>
                        </div>
                    </div>
                    <div class="text-left">
                        @foreach($transactions as $transaction)
                            @livewire('admin.transaction-item', ['transaction' => $transaction, 'statuses' => $statuses])
                        @endforeach
                    </div>
                </div>
            @else
                <p class="text-center text-2xl mt-5">No transactions have been made &#128532;</p>
            @endif
        </div>
    </div>

@endsection
