@extends('layouts.auth')

@section('content')
    <div class="flex flex-col h-full space-y-10">

        <div class="bg-white shadow-xl rounded-xl">
            <div>
                <div class="text-left w-full">
                    <div class="bg-gray-800 text-white text-lg rounded-t-xl">
                        <div class="flex">
                            <div class="w-1/12 p-4">#</div>
                            <div class="w-2/12 p-4">Full Name</div>
                            <div class="w-3/12 p-4">E-Mail</div>
                            <div class="w-4/12 p-4">Role</div>
                            <div class="w-2/12 p-4"></div>
                        </div>
                    </div>
                    <div>
                        @foreach($users as $user)
                            @livewire('admin.user-item', ['user' => $user, 'roles' => $roles])
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
