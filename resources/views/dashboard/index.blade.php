@extends('layouts.auth')

@section('content')
    <div class="flex flex-col h-full space-y-16">
        <div class="w-full flex space-x-7">
            <div class="w-1/3 bg-white p-5 rounded border shadow-sm flex items-center justify-center text-lg">
                @if($earningChart)
                    {!! $earningChart->container() !!}
                @else
                    No data for this filed
                @endif
            </div>
            <div class="w-1/3 bg-white p-5 rounded border shadow-sm flex items-center justify-center text-lg">
                @if($bookingChart)
                    {!! $bookingChart->container() !!}
                @else
                    No data for this filed
                @endif
            </div>
            <div class="w-1/3 bg-white p-5 rounded border shadow-sm flex items-center justify-center text-lg">
                @if($reviewChart)
                    {!! $reviewChart->container() !!}
                @else
                    No data for this filed
                @endif
            </div>
        </div>
        <div class="flex h-48 w-full space-x-6">
            <div class="w-1/3 bg-white rounded-xl shadow-2xl overflow-hidden">
                <div class="w-full h-full flex flex-col items-stretch space-y-5">
                    <div class="w-full h-full flex justify-between px-10">
                        <div class="h-full flex items-center space-x-6">
                            <div class="text-gray-600">
                                @include('icons.cash', ['attributes' => 'w-10 h-10'])
                            </div>
                            <div class="flex flex-col">
                                <p class="text-gray-600 text-xl">Monthly Earnings</p>
                                <span class="text-gray-800 text-xl font-semibold">{{ $earnings }} &euro;</span>
                            </div>
                        </div>
                        <div class="flex flex-col items-center justify-center">
                            @if($earningsCompare >= 0)
                                <span
                                    class="text-green-800">@include('icons.trending-up', ['attributes' => 'w-12 h-12'])</span>
                                <span class="text-green-800 font-semibold text-lg">+ {{ number_format(abs($earningsCompare), 1) }}%</span>
                                <span class="text-gray-600 text-sm">since last month</span>
                            @else
                                <span
                                    class="text-red-800">@include('icons.trending-down', ['attributes' => 'w-12 h-12'])</span>
                                <span class="text-red-800 font-semibold text-lg">- {{ number_format(abs($earningsCompare), 1) }}%</span>
                                <span class="text-gray-600 text-sm">since last month</span>
                            @endif
                        </div>
                    </div>
                    <div class="flex justify-end items-center px-10 bg-gray-100 h-2/5">
                        <a href="{{ route('dashboard.transactions') }}"
                           class="text-lg py-2 text-blue-600 font-semibold hover:text-gray-800 transition"
                        >View Transactions</a>
                    </div>
                </div>
            </div>
            <div class="w-1/3 bg-white rounded-xl shadow-2xl overflow-hidden">
                <div class="w-full h-full flex flex-col items-stretch space-y-5">
                    <div class="w-full h-full flex justify-between px-10">
                        <div class="h-full flex items-center space-x-6">
                            <div class="text-gray-600">
                                @include('icons.buildings', ['attributes' => 'w-10 h-10'])
                            </div>
                            <div class="flex flex-col">
                                <p class="text-gray-600 text-xl">Monthly Reservations</p>
                                <span class="text-gray-800 text-xl font-semibold">{{ $bookings }}</span>
                            </div>
                        </div>
                        <div class="flex flex-col items-center justify-center">
                            @if($bookingsCompare >= 0)
                                <span
                                    class="text-green-800">@include('icons.trending-up', ['attributes' => 'w-12 h-12'])</span>
                                <span class="text-green-800 font-semibold text-lg">+ {{ number_format(abs($bookingsCompare), 1) }}%</span>
                                <span class="text-gray-600 text-sm">since last month</span>
                            @else
                                <span
                                    class="text-red-800">@include('icons.trending-down', ['attributes' => 'w-12 h-12'])</span>
                                <span class="text-red-800 font-semibold text-lg">- {{ number_format(abs($bookingsCompare), 1) }}%</span>
                                <span class="text-gray-600 text-sm">since last month</span>
                            @endif
                        </div>
                    </div>
                    <div class="flex justify-end items-center px-10 bg-gray-100 h-2/5">
                        <a href="{{ route('dashboard.properties.index') }}"
                           class="text-lg py-2 text-blue-600 font-semibold hover:text-gray-800 transition"
                        >View Properties</a>
                    </div>
                </div>
            </div>
            <div class="w-1/3 bg-white rounded-xl shadow-2xl overflow-hidden">
                <div class="w-full h-full flex flex-col items-stretch space-y-5">
                    <div class="w-full h-full flex justify-between px-10">
                        <div class="h-full flex items-center space-x-6">
                            <div class="text-gray-600">
                                @include('icons.stars', ['attributes' => 'w-10 h-10'])
                            </div>
                            <div class="flex flex-col">
                                <p class="text-gray-600 text-xl">Monthly Reviews</p>
                                <span class="text-gray-800 text-xl font-semibold">{{ $reviews }}</span>
                            </div>
                        </div>
                        <div class="flex flex-col items-center justify-center">
                            @if($reviewsCompare >= 0)
                                <span
                                    class="text-green-800">@include('icons.trending-up', ['attributes' => 'w-12 h-12'])</span>
                                <span class="text-green-800 font-semibold text-lg">+ {{ number_format(abs($reviewsCompare), 1) }}%</span>
                                <span class="text-gray-600 text-sm">since last month</span>
                            @else
                                <span
                                    class="text-red-800">@include('icons.trending-down', ['attributes' => 'w-12 h-12'])</span>
                                <span class="text-red-800 font-semibold text-lg">- {{ number_format(abs($reviewsCompare), 1) }}%</span>
                                <span class="text-gray-600 text-sm">since last month</span>
                            @endif
                        </div>
                    </div>
                    <div class="flex justify-end items-center px-10 bg-gray-100 h-2/5">
                        <a href="{{ route('dashboard.properties.index') }}"
                           class="text-lg py-2 text-blue-600 font-semibold hover:text-gray-800 transition"
                        >View Reviews</a>
                    </div>
                </div>
            </div>

        </div>

    @if($earningChart)
        {!! $earningChart->script() !!}
    @endif
    @if($bookingChart)
        {!! $bookingChart->script() !!}
    @endif
    @if($reviewChart != false)
        {!! $reviewChart->script() !!}
    @endif
@endsection
