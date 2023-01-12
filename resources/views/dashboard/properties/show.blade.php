@extends('layouts.app')

@section('content')
    <main>
        <div class="mx-auto max-w-screen-2xl py-8 sm:px-6 lg:px-8">
            <div class="flex space-x-12">
                <div class="w-1/4">
                    <div class="bg-gray-800 py-4 px-6 rounded shadow-xl">
                        <form action="" method="get" id="filter">
                            @csrf
                            <h2 class="text-white text-2xl font-semibold mb-6">Filter</h2>
                            <div class="mb-4">
                                @include('components.filter.room.date', [
                                    'name' => 'date_from',
                                    'label' => 'Date From',
                                ])
                            </div>
                            <div class="mb-4">
                                @include('components.filter.room.date', [
                                    'name' => 'date_to',
                                    'label' => 'Date To',
                                ])
                            </div>
                            <div class="mb-4">
                                @include('components.filter.room.guests')
                            </div>
                            <button
                                class="w-full mb-2 bg-blue-grad-light text-white font-semibold text-lg p-3 rounded hover:bg-white hover:text-blue-grad-light border-2 border-blue-grad-light transition">
                                Search
                            </button>
                        </form>
                    </div>
                    <div class="mt-8 bg-white rounded overflow-hidden shadow-xl">
                        <iframe class="w-full h-96"
                                style="border:0"
                                loading="lazy"
                                allowfullscreen
                                referrerpolicy="no-referrer-when-downgrade"
                                src="https://www.google.com/maps/embed/v1/place?key={{ env('GOOGLE_MAPS_EMBED_API') }}&q={{$property->country->label }}">
                        </iframe>
                    </div>
                </div>
                <div class="flex flex-col w-3/4 space-y-6">
                    @if(!$available)
                        @if(request()->get('guests'))
                            <div class="bg-red-200 text-red-600 px-6 py-4 text-lg flex space-x-4">
                                @include('icons.info', ['attributes' => 'h-6 w-6'])
                                <p>There are no free rooms for <span class="underline">{{ request()->get('guests') }} guests</span> for the selected period in this property. <a href="{{ route('properties.index') }}" class="font-semibold hover:underline">Find available properties.</a></p>
                            </div>
                        @endif
                    @endif

                    <div id="in-page-nav" class="flex space-x-4">
                        @include('components.properties.in-page-link', ['section' => 'description', 'label' => 'Info & prices'])
                        @include('components.properties.in-page-link', ['section' => 'rooms', 'label' => 'Rooms'])
                        @include('components.properties.in-page-link', ['section' => 'reviews', 'label' => "Guest reviews ($property->reviews_count)"])
                        @include('components.properties.in-page-link', ['section' => 'rules', 'label' => 'House rules'])
                    </div> <!-- End in-page navigation -->
                    <div id="property-info" class="flex justify-between space-x-4">
                        <div class="flex-1">
                            <div class="flex items-center space-x-2 mb-2">
                                <span
                                    class="px-3 pt-1 pb-0.5 bg-blue-400 text-white text-xs rounded-sm">{{ $property->propertyType->label }}</span>
                                <div class="flex">
                                    @for($i = 0; $i < $property->stars; $i++)
                                        @include('icons.star', ['attributes' => 'h-6 w-6 text-yellow-500', 'fill' => '#ffff00'])
                                    @endfor
                                </div>
                            </div>
                            <h2 class="text-4xl font-bold mb-1 capitalize">{{ $property->name }}</h2>
                            <div class="flex items-center space-x-2">
                        <span class="text-blue-600">
                            @include('icons.location-pin', ['attributes' => 'h-6 w-6'])
                        </span>
                                <p>
                                    {{ $property->address }}, {{ $property->zip_code }} {{ $property->city }}
                                    , {{ $property->country->label }}
                                </p>
                            </div>
                        </div>
                        <div class="flex flex-col space-y-4">
                            <div class="flex my-auto items-center justify-end space-x-5">
                                <form method="post"
                                      action="{{ route('toggleFavorite', ['property' => $property->id]) }}">
                                    @csrf
                                    <button>
                                        @if($user?->favorites->contains($property))
                                            @include('icons.heart', ['attributes' => 'h-8 w-8 cursor-pointer text-red-600', 'fill' => '#ff0000'])
                                        @else
                                            @include('icons.heart', ['attributes' => 'h-8 w-8 cursor-pointer text-red-600', 'fill' => '#ff000033'])
                                        @endif
                                    </button>
                                </form>
                                @if($available)
                                    <a href="#rooms"
                                       class="hover:cursor-pointer bg-blue-600 hover:bg-blue-900 font-semibold text-lg transition text-white px-4 py-2 rounded-md">
                                        Reserve
                                    </a>
                                @endif
                            </div>
                        </div>
                    </div> <!-- End property info -->
                    <div id="photo-gallery">
                        @if($property->images_count)
                            @include('properties.gallery_grid')
                        @else
                            <img src="{{ Storage::disk('property_main_images')->url('default_photo.jpg') }}" class="w-full">
                        @endif
                    </div> <!-- End photo gallery -->
                    <div id="description" class="flex justify-between content-start items-start">
                        <div class="w-3/5">
                            {{ $property->description }}
                            <div class="my-8">
                                <h3 class="font-semibold text-lg mb-2">Most popular facilities</h3>
                                <div class="flex space-x-6">

                                    @foreach($property->features()->take(4)->get() as $feature)
                                        <div class="flex items-center space-x-1">
                                            @php
                                                $icon = !is_null($feature->icon) ? $feature->icon : 'features';
                                            @endphp
                                            @include("icons.$icon", ['attributes' => 'w-6 h-6'])
                                            <p>{{ $feature->label }}</p>
                                        </div>
                                    @endforeach
                                </div>
                            </div>

                        </div>
                        <div class="w-1/3 bg-blue-100 p-6">
                            <h3 class="font-semibold text-xl">Property highlights</h3>
                            <div class="flex justify-start items-start mt-4 mb-2">
                                <span class="flex mr-2">
                                    @include('icons.heart', ['attributes' => 'w-6 h-6', 'fill' => '#000000'])
                                </span>
                                Situated in the best rated area in {{ $property->city }}, this property has an
                                {{ strtolower(ratingString($property->reviews_avg_rating)) }} rating score
                                of {{ number_format($property->reviews_avg_rating, 1) }}
                            </div>
                            <div class="space-y-2 mt-6 mb-3">
                                @if($available)
                                    <a href="#rooms"
                                       class="hover:cursor-pointer block text-center w-full py-3 bg-blue-600 hover:bg-blue-900 transition text-white font-semibold text-lg w-full h-12">
                                        Reserve
                                    </a>
                                @endif
                                <form method="post"
                                      action="{{ route('toggleFavorite', ['property' => $property->id]) }}">
                                    @csrf
                                    @if($user?->favorites->contains($property))
                                        <div
                                            class="flex items-center justify-center bg-white bg-opacity-70 border border-2 border-blue-600 transition text-blue-600 font-semibold text-lg w-full h-12">
                                            Saved ✓
                                        </div>
                                    @else
                                        <button
                                            class="bg-white bg-opacity-0 hover:bg-opacity-70 border border-2 border-blue-600 transition text-blue-600 font-semibold text-lg w-full h-12">
                                            Save the property
                                        </button>
                                    @endif
                                </form>
                            </div>
                            <span class="block text-center w-full text-sm text-gray-600">Saved to {{ $property->favorites->count() }} lists</span>
                        </div>
                    </div><!-- End description -->
                    @if($available)
                        <div id="rooms" class="space-y-4">
                            <h2 class="text-2xl font-bold">Availability</h2>
                            <div class="mb-8">
                                @include('components.properties.rooms-table' , ['rooms' => $property->rooms])
                            </div>
                        </div><!-- End rooms -->
                    @endif
                    <div class="h-6"></div><!-- separator -->
                    <div id="reviews" class="" x-data="{ reviewModal:false }">
                        <h2 class="text-2xl font-bold mb-3">Guest reviews</h2>
                        <div class="flex flex-row items-baseline space-x-3">
                            <div
                                class="bg-blue-600 text-white font-bold text-xl p-3 rounded-xl">{{ number_format($property->reviews_avg_rating, 1) }}</div>
                            <span
                                class="font-bold text-lg -mb-1">{{ ratingString($property->reviews_avg_rating) }}</span>
                            <span class="text-sm">{{ $property->reviews_count }} reviews</span>
                        </div>
                        @if($property->reviews_count > 0)
                            <h3 class="text-lg font-bold mt-8 mb-3">Reviews</h3>
                            <div class="grid grid-cols-3 gap-8 mb-6">
                                @foreach($property->reviews->take(3) as $review)
                                    @include('components.properties.review', ['review' => $review])
                                @endforeach
                            </div>

                            <div class="flex justify-end">
                                <button @click="reviewModal = true"
                                        class="border border-2 border-blue-600 bg-white hover:bg-blue-50 transition rounded text-blue-600 font-semibold text-lg px-4 py-2">
                                    Read all reviews
                                </button>
                            </div>
                            <div x-show="reviewModal">
                                @include('components.properties.review-modal')
                            </div>
                        @endif
                    </div><!-- End reviews -->
                    <div id="rules" class=''>
                        <h2 class="text-2xl font-bold mb-3">House rules</h2>
                        @include('components.properties.rules-table', ['property' => $property])
                    </div><!-- End rules -->
                </div>
            </div>
        </div>
    </main>
@endsection
