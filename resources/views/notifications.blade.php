@extends('layouts.app')

@section('content')
    @include('components.header', ['label' => 'Notifications'])
    <div class="mx-auto max-w-screen-2xl flex flex-col w-full p-10 mt-3 space-y-8">
        @if($notifications->count() > 0)
            @foreach($notifications as $notification)
                <div
                    class="py-4 px-6 {{ $notification->read ? 'bg-white' : 'bg-blue-200' }} rounded shadow hover:shadow-xl transition ">
                    <h2 class="font-bold text-3xl mb-3">{{ $notification->heading }}</h2>
                    <p>{{ $notification->content }}</p>
                    <div class="flex justify-between items-baseline mt-4">
                        <div class="flex items-center space-x-8">
                            {{--                        @if(isset($notification->property))--}}
                            {{--                            <a href="{{ route('properties.show') }}"--}}
                            {{--                               class="text-blue-600 hover:text-blue-800 transition hover:underline">View Property</a>--}}
                            {{--                        @endif--}}
                            {{--                        <a href="{{ route('properties.show') }}"--}}
                            {{--                           class="text-blue-600 hover:text-blue-800 transition hover:underline">View Reports</a>--}}
                        </div>
                        <div class="flex space-x-3">
                            @if($notification->read)
                                <button
                                    class="py-2 px-4 border-2 rounded border-blue-600 hover:bg-blue-100 text-blue-600 font-semibold text-lg">
                                    Mark as unread
                                </button>
                            @else
                                <button
                                    class="py-2 px-4 border-2 rounded border-blue-600 hover:border-blue-900 bg-blue-600 hover:bg-blue-900 text-white font-semibold text-lg">
                                    Mark as read
                                </button>
                            @endif
                            <button
                                class="py-2 px-4 border-2 rounded border-red-600 hover:border-red-900 bg-red-600 hover:bg-red-900 text-white font-semibold text-lg">
                                Delete
                            </button>
                        </div>
                    </div>
                </div>
            @endforeach
        @else
            <p class="text-center text-2xl mt-5">Nothing new to see here &#128064;</p>
        @endif
    </div>
@endsection
