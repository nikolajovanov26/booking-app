@extends('layouts.auth')

@section('content')
    <div class="flex flex-col w-full">
        <div class="shadow-xl rounded-lg">
            <div class="bg-gray-700 text-white font-semibold text-3xl py-6 px-8 rounded-t-lg">
                <h1>Profile Settings</h1>
            </div>
            <div class="text-lg rounded-b-lg">
                @livewire('edit-profile-first-name', ['value' => $user->profile->first_name])
                @livewire('edit-profile-last-name', ['value' => $user->profile->last_name])
                @livewire('edit-user-email', ['value' => $user->email])
                @livewire('edit-profile-phone', ['value' => $user->profile->phone_number])
                @livewire('edit-profile-picture', ['value' => ''])
                @livewire('edit-profile-country', ['value' => $user->profile->country->label])
                @livewire('edit-profile-birth-date', ['value' => $user->profile->birth_date])
            </div>
        </div>

    </div>
@endsection
