@extends('layouts.auth')

@section('content')
    <div class="flex flex-col h-full space-y-10">
        <div class="flex justify-end">
            @livewire('admin.create-payment-method')
        </div>
        <div class="bg-white shadow-xl rounded-xl overflow-hidden">
            @livewire('admin.payment-method-table')
        </div>
    </div>
@endsection
