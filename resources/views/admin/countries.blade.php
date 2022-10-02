@extends('layouts.auth')

@section('content')
    <div class="flex flex-col h-full space-y-10">
        @livewire('admin.country-controller')
    </div>
@endsection
