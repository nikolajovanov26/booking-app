{{--@extends('layouts.app')--}}

{{--@section('content')--}}
{{--    @include('components.header', ['label' => 'Properties'])--}}
{{--    <main>--}}
{{--        <div class="mx-auto max-w-screen-2xl p-8 space-y-6">--}}
{{--            <div class="py-5">--}}
{{--                <form method="GET" action="{{ route('properties.filter') }}" class="flex space-x-5">--}}
{{--                    <div class="w-4/12">--}}
{{--                        @include('components.filter.location')--}}
{{--                    </div>--}}
{{--                    <div class="w-2/12">--}}
{{--                        @include('components.filter.date', ['name' => 'date_from', 'placeholder' => 'Date From'])--}}
{{--                    </div>--}}
{{--                    <div class="w-2/12">--}}
{{--                        @include('components.filter.date', ['name' => 'date_to', 'placeholder' => 'Date To'])--}}
{{--                    </div>--}}
{{--                    <div class="w-2/12">--}}
{{--                        @include('components.filter.persons')--}}
{{--                    </div>--}}
{{--                    @csrf--}}
{{--                    <div class="w-2/12">--}}
{{--                        <div class="relative bg-blue-grad-light w-full h-12 rounded-lg overflow-hidden">--}}
{{--                            <button--}}
{{--                                class="absolute inset-0 w-full h-12 bg-blue-grad-light font-semibold text-white">--}}
{{--                                Search--}}
{{--                            </button>--}}
{{--                            <button--}}
{{--                                class="relative w-full h-12 opacity-0 hover:opacity-100 bg-gradient-to-b from-blue-grad-light to-blue-grad-dark transition font-semibold text-white">--}}
{{--                                Search--}}
{{--                            </button>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                </form>--}}
{{--            </div>--}}
{{--            <div class="space-y-6">--}}
{{--                @foreach($properties as $property)--}}
{{--                    @include('components.properties.card', ['property' => $property])--}}
{{--                @endforeach--}}
{{--                {{ $properties->links() }}--}}
{{--            </div>--}}
{{--        </div>--}}
{{--    </main>--}}
{{--@endsection--}}
