@extends('layouts.auth')

@section('content')
    <div class="flex flex-col h-full space-y-16">
        <div class="w-full h-96 border border-dashed border-4 border-gray-600 rounded-xl"></div>
        <div class="flex h-48 w-full space-x-6">
            <div class="w-1/3 bg-white rounded-xl shadow-2xl overflow-hidden">
                <div class="w-full h-full flex flex-col items-stretch space-y-5">
                    <div class="w-full h-full flex justify-between px-10">
                        <div class="h-full flex items-center space-x-6">
                            <div class="text-gray-600">
                                @include('icons.cash', ['attributes' => 'w-10 h-10'])
                            </div>
                            <div class="flex flex-col">
                                <p class="text-gray-600 text-xl">Account Balance</p>
                                <span class="text-gray-800 text-xl font-semibold">$30,669.45</span>
                            </div>
                        </div>
                        <div class="flex flex-col items-center justify-center">
                            <span
                                class="text-green-800">@include('icons.trending-up', ['attributes' => 'w-12 h-12'])</span>
                            <span class="text-green-800 font-semibold text-lg">+ 3.8%</span>
                            <span class="text-gray-600 text-sm">since last month</span>
                        </div>
                    </div>
                    <div class="flex justify-end items-center px-10 bg-gray-100 h-2/5">
                        <a href="{{ route('admin.transactions') }}"
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
                                <p class="text-gray-600 text-xl">Reservations</p>
                                <span class="text-gray-800 text-xl font-semibold">21</span>
                            </div>
                        </div>
                        <div class="flex flex-col items-center justify-center">
                            <span
                                class="text-red-800">@include('icons.trending-down', ['attributes' => 'w-12 h-12'])</span>
                            <span class="text-red-800 font-semibold text-lg">- 1.8%</span>
                            <span class="text-gray-600 text-sm">since last month</span>
                        </div>
                    </div>
                    <div class="flex justify-end items-center px-10 bg-gray-100 h-2/5">
                        <a href="{{ route('admin.properties.index') }}" class="text-lg py-2 text-blue-600 font-semibold hover:text-gray-800 transition"
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
                                <p class="text-gray-600 text-xl">Client Reviews</p>
                                <span class="text-gray-800 text-xl font-semibold">24</span>
                            </div>
                        </div>
                        <div class="flex flex-col items-center justify-center">
                            <span
                                class="text-green-800">@include('icons.trending-up', ['attributes' => 'w-12 h-12'])</span>
                            <span class="text-green-800 font-semibold text-lg">+ 12.8%</span>
                            <span class="text-gray-600 text-sm">since last month</span>
                        </div>
                    </div>
                    <div class="flex justify-end items-center px-10 bg-gray-100 h-2/5">
                        <a href="#" class="text-lg py-2 text-blue-600 font-semibold hover:text-gray-800 transition"
                        >View Reviews</a>
                    </div>
                </div>
            </div>

        </div>
@endsection
