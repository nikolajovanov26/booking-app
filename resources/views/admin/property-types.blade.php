@extends('layouts.auth')

@section('content')
    <div class="flex flex-col h-full space-y-10">
        @livewire('admin.property-type-controller')
    </div>
@endsection
