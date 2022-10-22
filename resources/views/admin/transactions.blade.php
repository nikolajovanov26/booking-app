@extends('layouts.auth')

@section('content')
    <div class="flex flex-col w-full space-y-10">
        <div class="bg-white shadow-xl rounded-xl">
            <div class="px-6 py-4 flex items-center justify-between bg-blue-grad-dark rounded-t-xl">
                <div class="flex items-center">
                    <form method="get" action="">
                        @csrf
                        <input
                            class="border-gray-100 mr-3 focus:ring-blue-grad-light focus:border-blue-grad-light rounded text-lg"
                            type="text" name="search" placeholder="Filter Properties"
                            value="{{ request()->get('search') }}">
                        <button
                            class="bg-blue-grad-light border-2 border-blue-grad-light hover:border-white transition hover:bg-gray-800 px-6 py-2 text-white font-semibold rounded text-lg">
                            Search
                        </button>
                    </form>
                    @if(request()->get('search'))
                        <form method="get" action="">
                            <button
                                class="ml-5 flex space-x-2 items-center hover:text-white hover:bg-red-600 transition py-2 px-3 text-white font-semibold text-lg rounded cursor-pointer">
                                @include('icons.bin', ['attributes' => 'h-6 w-6'])
                                <spam>Reset</spam>
                            </button>
                            @csrf
                        </form>
                    @endif
                </div>
            </div>
            @if($transactions->count() > 0)
                <div class="bg-gray-800 text-white text-lg w-full font-bold">
                    <div class="flex w-full">
                        <div class="p-4">#</div>
                        <div class="w-2/12 p-4">Owner</div>
                        <div class="w-2/12 p-4">Customer</div>
                        <div class="w-2/12 p-4">Property</div>
                        <div class="w-1/12 p-4 text-center">Amount</div>
                        <div class="w-2/12 p-4 text-center">Date</div>
                        <div class="w-2/12 p-4 text-center">Status</div>
                        <div class="w-1/12 p-4"></div>
                    </div>
                </div>
                <div class="text-left">
                    @foreach($transactions as $transaction)
                        @livewire('admin.transaction-item', ['transaction' => $transaction, 'statuses' => $statuses])
                    @endforeach
                </div>
            @endif
        </div>
    </div>
    @if($transactions->count() == 0)
        <div class="text-center text-2xl mt-5">
            <p>No transactions have been made &#128532;</p>
        </div>
    @endif
@endsection
