@extends('layouts.auth')

@section('content')
    <div class="flex flex-col w-full">
        <div class="shadow-xl rounded-lg overflow-hidden">
            <div class="bg-gray-700 text-white font-semibold text-3xl py-6 px-8">
                <h1>Profile Settings</h1>
            </div>
            <div class="text-lg">
                @livewire('edit-profile-first-name')
                @livewire('edit-profile-last-name')
            </div>
        </div>

    </div>
@endsection
