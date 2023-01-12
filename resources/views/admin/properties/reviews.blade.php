@extends('layouts.auth')

@section('content')
    <div class="flex flex-col w-full space-y-8">
        <h1 class="text-4xl font-bold">{{ ucwords($property->name) }}</h1>
        <div class="grid grid-cols-3 gap-6 items-start">
            @forelse($property->reviews as $review)
                <div class="bg-white shadow hover:shadow-xl transition px-5 py-3 rounded-lg">
                    <div class="flex justify-between items-start mb-3">
                        <div>
                            <a href="#"
                               class="font-semibold text-lg text-blue-800 hover:text-blue-900 hover:underline transition"
                            >{{ $review->user->profile->fullName() }}</a>
                            <p class="text-sm text-gray-400">{{ $review->created_at->diffForHumans() }}</p>
                        </div>
                        <div class="flex items-center space-x-3">
                            <p class="text-blue-800 hover:text-blue-900  transition">
                                {{ ratingString($review->rating) }}
                            </p>
                            <div
                                class="bg-blue-600 text-white rounded text-lg font-semibold pt-1 pb-0.5 px-1">{{ number_format($review->rating, 1) }}</div>
                        </div>
                    </div>
                    <p>{{ $review->comment }}</p>
                </div>
            @empty
                <div class="col-span-3 flex flex-col items-center space-y-3">
                    <p class="text-2xl text-center">No reviews for this property 🥱</p>
                    <a href="{{ route('admin.properties.index') }}" class="flex items-center space-x-2 text-blue-600 opacity-70 hover:opacity-100 hover:-translate-x-2 transition">
                        <span>@include('icons.arrow-left-long', ['attributes' => 'h-6 w-6'])</span>
                        <span>Back to Properties</span>
                    </a>
                </div>
            @endforelse
        </div>

    </div>
@endsection
