@extends('layouts.auth')

@section('content')
    <div class="flex flex-col h-full space-y-10">
        @livewire('admin.feature-controller')
    </div>
@endsection
