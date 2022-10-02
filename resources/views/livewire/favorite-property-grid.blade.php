<div x-data="{ removeFavoriteModal: @entangle('showRemoveModal') }">
    <div class="grid grid-cols-3 gap-6 items-start" wire:loading.class="opacity-0.25">
        @foreach($properties as $property)
            <div class="bg-white shadow hover:shadow-xl transition p-4 mb-3 rounded-lg space-y-4">
                <div class="col-span-2 w-full row-span-2 aspect-2/1 rounded-lg overflow-hidden">
                    <img src="https://images.unsplash.com/photo-1523217582562-09d0def993a6"
                         class="object-cover w-full h-full">
                </div>
                <div class="flex justify-between items-start">
                    <div>
                        <a href="#"
                           class="font-semibold text-lg text-blue-800 hover:text-blue-900 hover:underline transition line-clamp-1"
                        >{{ ucwords($property->name) }}</a>
                        <p class="text-sm text-gray-400 line-clamp-1">{{ $property->address }}</p>
                    </div>
                    <div class="flex items-center">
                        <button
                            @keydown.esc="removeFavoriteModal = false"
                            wire:click="showRemoveModal({{ $property->id }})" class="text-red-600">
                            @include('icons.heart', ['attributes' => 'w-8 h-8', 'fill' => '#dc2638'])
                        </button>
                    </div>
                </div>
{{--                <p class="text-green-700 text-center">Property is available for selected dates</p>--}}
                <div class="flex items-center space-x-5">
                    <a href="{{ route('properties.show', ['property' => $property->slug]) }}"
                        class="w-full text-center py-2 rounded font-semibold text-lg border-2 border-blue-600 text-blue-600 transition hover:bg-blue-100">
                        View Property
                    </a>
                    <button
                        class="w-full py-2 rounded font-semibold text-lg border-2 border-blue-600 bg-blue-600 text-white transition hover:bg-blue-800 hover:border-blue-800">
                        Book Now
                    </button>
                </div>
            </div>
        @endforeach
    </div>
    <div
        x-show="removeFavoriteModal"
        x-cloak
        class="fixed inset-0 backdrop-blur-sm bg-gray-800/20 z-40">
        <div class="flex items-center justify-center w-full h-full">
            <div @keydown.esc="removeFavoriteModal = false"
                 @click.outside="removeFavoriteModal = false"
                 x-show="removeFavoriteModal" x-transition
                 class="flex items-center space-x-8 relative bg-white px-8 py-4 w-1/3 shadow-xl rounded-xl">
                <p class="text-xl font-semibold">Are you sure you want to remove {{ $propertyName }} from favorites?</p>
                <div class="flex justify-end items-center space-x-6">
                    <button @click="removeFavoriteModal = false"
                            class="text-red-600 hover:text-red-800 transition hover:underline">Cancel
                    </button>
                    <button wire:click="removeFavorite"
                            class="px-4 py-2 rounded text-white bg-red-600 hover:bg-red-800 transition">Remove
                    </button>
                </div>
            </div>
        </div>
    </div>
</div>
