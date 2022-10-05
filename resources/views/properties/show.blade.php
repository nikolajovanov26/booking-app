@extends('layouts.app')

@section('content')
    @php
        $reviewCount = $property->reviews->count()
    @endphp

    <main>
        <div class="mx-auto max-w-screen-2xl py-8 sm:px-6 lg:px-8">
            <div class="flex space-x-6">
                <div class="w-1/5">
                    Filter
                </div>
                <div class="flex flex-col w-4/5 space-y-6">
                    <div id="in-page-nav" class="flex space-x-4">
                        @include('components.properties.in-page-link', ['section' => 'description', 'label' => 'Info & prices'])
                        @include('components.properties.in-page-link', ['section' => 'rooms', 'label' => 'Rooms'])
                        @include('components.properties.in-page-link', ['section' => 'reviews', 'label' => "Guest reviews ($reviewCount)"])
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
                                <span>&mdash;</span>
                                <a href="#" class="text-blue-600 hover:text-blue-900 transition font-semibold">
                                    Show location
                                </a>
                            </div>
                        </div>
                        <div class="flex flex-col space-y-4">
                            <div class="flex my-auto items-center justify-end space-x-5">
                                <span class="text-gray-800 hover:text-red-600 transition cursor-pointer">
                                    @include('icons.heart', ['attributes' => 'h-8 w-8', 'fill' => 'none'])
                                </span>
                                <button
                                    class="bg-blue-600 hover:bg-blue-900 font-semibold text-lg transition text-white px-4 py-2 rounded-md">
                                    Reserve
                                </button>
                            </div>
                        </div>
                    </div> <!-- End property info -->
                    <div id="photo-gallery" class="grid grid-flow-row-dense grid-cols-5">
                        <div class="col-span-2 row-span-2 aspect-2/1 pr-3 pb-3">
                            <img src="https://images.unsplash.com/photo-1523217582562-09d0def993a6"
                                 class="object-cover w-full h-full">
                        </div>
                        <div class="col-span-3 row-span-4 aspect-3/2 pb-3">
                            <img src="https://images.unsplash.com/photo-1523217582562-09d0def993a6"
                                 class="object-cover w-full h-full">
                        </div>
                        <div class="col-span-2 row-span-2 aspect-2/1 pr-3 pb-3">
                            <img src="https://images.unsplash.com/photo-1523217582562-09d0def993a6"
                                 class="object-cover w-full h-full">
                        </div>
                        <div class="col-span-1 row-span-1 pr-3">
                            <img src="https://images.unsplash.com/photo-1523217582562-09d0def993a6"
                                 class="object-cover w-full h-full">
                        </div>
                        <div class="col-span-1 row-span-1 pr-3">
                            <img src="https://images.unsplash.com/photo-1523217582562-09d0def993a6"
                                 class="object-cover w-full h-full">
                        </div>
                        <div class="col-span-1 row-span-1 pr-3">
                            <img src="https://images.unsplash.com/photo-1523217582562-09d0def993a6"
                                 class="object-cover w-full h-full">
                        </div>
                        <div class="col-span-1 row-span-1 pr-3">
                            <img src="https://images.unsplash.com/photo-1523217582562-09d0def993a6"
                                 class="object-cover w-full h-full">
                        </div>
                        <div class="relative col-span-1 row-span-1">
                            <div
                                class="absolute cursor-pointer font-semibold flex items-center text-2xl justify-center inset-0 text-white bg-gray-600 bg-opacity-50 hover:bg-opacity-80 transition">
                                +45 Photos
                            </div>
                            <img src="https://images.unsplash.com/photo-1523217582562-09d0def993a6"
                                 class="object-cover w-full h-full">
                        </div>
                    </div> <!-- End photo gallery -->
                    <div id="description" class="flex justify-between content-start items-start">
                        <div class="w-3/5">
                            {{ $property->description }}
                            <div class="my-8">
                                <h3 class="font-semibold text-lg mb-2">Most popular facilities</h3>
                                <div class="flex space-x-6">

                                    @foreach($property->features()->take(4)->get() as $feature)
                                        <div class="flex items-center space-x-1">
                                            @include('icons.wifi', ['attributes' => 'w-6 h-6'])
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
                                Situated in the best rated area in Ohrid, this property has an excellent location score
                                of 9.7
                            </div>
                            <div class="flex justify-start items-start">
                                <span class="flex mr-2">
                                    @include('icons.wifi', ['attributes' => 'w-6 h-6'])
                                </span>
                                Free private parking available on-site
                            </div>
                            <div class="space-y-2 mt-6 mb-3">
                                <button
                                    class="bg-blue-600 hover:bg-blue-900 transition text-white font-semibold text-lg w-full h-12">
                                    Reserve
                                </button>
                                <button
                                    class="bg-white bg-opacity-0 hover:bg-opacity-70 border border-2 border-blue-600 transition text-blue-600 font-semibold text-lg w-full h-12">
                                    Save the property
                                </button>
                            </div>
                            <span class="block text-center w-full text-sm text-gray-600">Saved to {{ $property->favorites()->count() }} lists</span>
                        </div>
                    </div><!-- End description -->
                    <div id="rooms" class="space-y-4">
                        <h2 class="text-2xl font-bold">Availability</h2>
                        <div class="w-full h-20 bg-blue-100"> Filter</div>
                        <div class="mb-8">
                            @include('components.properties.rooms-table' , ['rooms' => $property->rooms()->get()])
                        </div>
                    </div><!-- End rooms -->
                    <div class="h-6"></div><!-- separator -->
                    <div id="reviews" class="" x-data="{ reviewModal:false }">
                        <h2 class="text-2xl font-bold mb-3">Guest reviews</h2>
                        <div class="flex flex-row items-baseline space-x-3">
                            <div class="bg-blue-600 text-white font-bold text-xl p-3 rounded-xl">{{ number_format($property->reviews()->avg('rating'), 1) }}</div>
                            <span class="font-bold text-lg -mb-1">{{ ratingString($property->reviews()->avg('rating')) }}</span>
                            <span class="text-sm">{{ $property->reviews()->count() }} reviews</span>
                            <a href="#" class="text-sm text-blue-600 hover:underline">Read all reviews</a>
                        </div>
                        <h3 class="text-lg font-bold mt-6 mb-2">Categories</h3>
                        <div class="grid grid-cols-3 gap-x-12 gap-y-4 mb-4">
                            @include('components.properties.progress-bar', ['label' => 'Staff', 'progress' => 9.7])
                            @include('components.properties.progress-bar', ['label' => 'Facilities', 'progress' => 4.5])
                            @include('components.properties.progress-bar', ['label' => 'Cleanliness', 'progress' => 3.7])
                            @include('components.properties.progress-bar', ['label' => 'Comfort', 'progress' => 2.5])
                            @include('components.properties.progress-bar', ['label' => 'Value for money', 'progress' => 1.0])
                            @include('components.properties.progress-bar', ['label' => 'Location', 'progress' => 7.6])
                        </div>
                        <h3 class="text-lg font-bold mt-8 mb-3">Reviews</h3>
                        <div class="grid grid-cols-3 gap-8 mb-6">
                            @foreach($property->reviews()->take(3)->get() as $review)
                                @include('components.properties.review', ['review' => $review])
                            @endforeach
                        </div>
                        <div class="flex justify-end">
                            <button
                                class="border border-2 border-blue-600 bg-white hover:bg-blue-50 transition rounded text-blue-600 font-semibold text-lg px-4 py-2">
                                Read all reviews
                            </button>
                        </div>
                        <div x-show="reviewModal">
                            @include('components.properties.review-modal')
                        </div>
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
