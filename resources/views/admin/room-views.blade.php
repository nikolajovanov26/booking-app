@extends('layouts.auth')

@section('content')
    <div class="flex flex-col h-full space-y-10">
        <div class="flex justify-end">
            @livewire('admin.create-room-view')
        </div>
        <div class="bg-white shadow-xl rounded-xl overflow-hidden">
            @livewire('admin.room-view-table')
        </div>
    </div>
@endsection
