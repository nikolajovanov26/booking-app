@extends('layouts.auth')

@section('content')
    <div class="flex flex-col w-full space-y-8">
        <div class="py-3 bg-blue-100 mb-6">
            Filter
        </div>
        @livewire('favorite-property-grid')
    </div>
@endsection
