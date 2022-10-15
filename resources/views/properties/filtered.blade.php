@extends('layouts.app')

@section('content')
    @include('components.header', ['label' => 'Properties'])
    <main>
        <div class="mx-auto max-w-screen-2xl p-8 space-y-6 flex space-x-12">
            <div class="py-5 w-1/4">
                <form method="GET" action="" class="flex flex-col space-y-3">
                    @csrf
                    <div class="w-full">
                        @include('components.filter.location')
                    </div>
                    <div class="flex space-x-3 w-full">
                        <div class="w-1/2">
                            @include('components.filter.date', ['name' => 'date_from', 'placeholder' => 'Date From'])
                        </div>
                        <div class="w-1/2">
                            @include('components.filter.date', ['name' => 'date_to', 'placeholder' => 'Date To'])
                        </div>
                    </div>

                    <div class="w-full">
                        @include('components.filter.type')
                    </div>
                    <div class="flex relative space-x-3 w-full">
                        <div class="w-1/3">
                            @include('components.filter.persons')
                        </div>
                        <div class="w-full">
                            @include('components.filter.stars')
                        </div>
                        <div class="w-full">
                            @include('components.filter.pets')
                        </div>
                    </div>
                    <div class="w-full h-12">
                        <div class="relative bg-blue-grad-light w-full h-full rounded-lg overflow-hidden">
                            <button
                                class="absolute inset-0 w-full h-full bg-blue-grad-light font-semibold text-white">
                                Search
                            </button>
                            <button
                                class="relative w-full h-full opacity-0 hover:opacity-100 bg-gradient-to-b from-blue-grad-light to-blue-grad-dark transition font-semibold text-white">
                                Search
                            </button>

                        </div>
                    </div>
                </form>
            </div>
            <div class="space-y-6 w-3/4">
                @foreach($properties as $property)
                    @include('components.properties.card', ['property' => $property])
                @endforeach
                {{ $properties->links() }}
            </div>
        </div>
    </main>
@endsection
