@extends('layouts.base')

@section('body')

    <div class="w-screen h-screen">
        @yield('content')
    </div>

    @isset($slot)
        {{ $slot }}
    @endisset
@endsection
