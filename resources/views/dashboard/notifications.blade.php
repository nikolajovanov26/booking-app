@extends('layouts.auth')

@section('content')
    <div class="flex flex-col w-full space-y-8">
        @if($notifications->count() > 0)
            @foreach($notifications as $notification)
                <div
                    class="py-4 px-6 {{ $notification->read ? 'bg-white' : 'bg-blue-200' }} rounded shadow hover:shadow-xl transition ">
                    <h2 class="font-bold text-3xl mb-3">{{ $notification->heading }}</h2>
                    <p>{{ $notification->content }}</p>
                    <div class="flex justify-end items-baseline mt-4">
                        <div class="flex space-x-3">
                            <form method="post" action="{{ route('dashboard.notifications.toggleRead', ['notification' => $notification->id]) }}">
                                @csrf
                                @method('PUT')
                                @if($notification->read)
                                    <button
                                        class="py-2 px-4 bg-transparent hover:underline underline-offset-2 decoration-2 text-blue-600 font-semibold text-lg">
                                        Mark as unread
                                    </button>
                                @else
                                    <button
                                        class="py-2 px-4 bg-transparent hover:underline underline-offset-2 decoration-2 text-blue-600 font-semibold text-lg">
                                        Mark as read
                                    </button>
                                @endif
                            </form>
                            <form method="post" action="{{ route('dashboard.notifications.delete', ['notification' => $notification->id]) }}">
                                @csrf
                                @method('DELETE')
                                <button href="#"
                                        class="flex bg-transparent items-center space-x-1 py-2 px-4 underline-offset-2 decoration-2 bg-transparent hover:underline text-red-600 font-semibold text-lg">
                                    @include('icons.bin', ['attributes' => 'h-6 w-6']) <span>Delete</span>
                                </button>
                            </form>
                        </div>
                    </div>
                </div>
            @endforeach
        @else
            <p class="text-center text-2xl mt-5">Nothing new to see here &#128064;</p>
        @endif
    </div>
@endsection
