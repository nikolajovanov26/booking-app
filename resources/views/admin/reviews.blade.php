@extends('layouts.auth')

@section('content')
    <div class="flex flex-col w-full space-y-8">
        <div class="py-3 bg-blue-100 mb-6">
            Filter
        </div>
        <div class="grid grid-cols-3 gap-6 items-start">
            @foreach($reviews as $review)
                <div class="bg-white shadow hover:shadow-xl transition px-5 py-3 rounded-lg">
                    <div class="flex justify-between items-start mb-3">
                        <div>
                            {{ $review->user->profile->fullName() }}
                            <p class="text-sm text-gray-400">{{ $review->created_at->diffForHumans() }}</p>
                        </div>
                        <div class="flex items-center space-x-3">
                            <a href="{{ route('admin.properties.show', ['property' => $review->property->id]) }}"
                               class="text-blue-800 hover:text-blue-900 hover:underline transition"
                            >{{ ucwords($review->property->name) }}</a>
                            <div
                                class="bg-blue-600 text-white rounded text-lg font-semibold pt-1 pb-0.5 px-1">{{ number_format($review->rating, 1) }}</div>
                        </div>
                    </div>
                    <p>{{ $review->comment }}</p>
                </div>
            @endforeach
        </div>

    </div>
@endsection
