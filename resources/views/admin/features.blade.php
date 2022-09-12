@extends('layouts.auth')

@section('content')
    <div class="flex flex-col h-full space-y-10">
        <div class="flex justify-end">
            @livewire('admin.create-feature')
        </div>
        <div class="bg-white shadow-xl rounded-xl overflow-hidden">
            @livewire('admin.feature-table')
        </div>
    </div>
@endsection
