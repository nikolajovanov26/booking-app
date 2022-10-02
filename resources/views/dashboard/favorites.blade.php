@extends('layouts.auth')

@section('content')
    <div class="flex flex-col w-full space-y-8">
        <div class="py-3 bg-blue-100 mb-6">
            Filter
        </div>
        @if($properties->count() > 0)
            @livewire('favorite-property-grid')
        @else
            <p class="text-center text-2xl mt-5">You have no favorite properties &#128148;</p>
        @endif
    </div>
@endsection
