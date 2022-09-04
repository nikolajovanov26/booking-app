@extends('layouts.app')

@section('content')
    @include('components.header', ['label' => 'Properties'])
    <main>
        <div class="mx-auto max-w-screen-2xl py-8 sm:px-6 lg:px-8">
            <div class="space-y-6">
                @include('components.properties.card')
                @include('components.properties.card')
                @include('components.properties.card')
            </div>
        </div>
    </main>
@endsection
