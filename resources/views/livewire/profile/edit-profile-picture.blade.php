<div>
    <div x-data="{ show: @entangle('show'), name:@entangle('name'), hasImage:@entangle('hasImage'), imagePath:@entangle('imagePath')} ">
        <div x-show="!show" x-transition:enter
             class="flex items-center w-full h-24 border-b-2 border-gray-100 bg-white py-6 px-8">
            <div class="w-1/5">Profile Picture</div>
            <div class="w-3/5">
                <img x-bind:src="imagePath" class="w-16 h-16">
            </div>
            <div class="w-1/5 text-right">
                <button @click="show = true"
                        class="text-blue-600 hover:text-blue-900 hover:underline transition"
                >Edit
                </button>
            </div>
        </div>
        <div x-show="show" x-transition:enter x-cloak
             class="flex items-center w-full h-18 border-b-2 border-gray-100 bg-blue-100 py-6 px-8">
            <div class="w-1/5">Profile Picture</div>
            <div x-show="show"
                 class="w-3/5">
                <form wire:submit.prevent="save"  class="flex space-x-4 items-center">
                    @if ($image)
                        <img src="{{ $image?->temporaryUrl() }}"  class="w-16 h-16">
                    @endif

                    <input type="file" wire:model="image" class="border w-64 text-gray-800 px-2 py-2 rounded focus:ring-0 focus:border-blue-grad-light">

                    <div wire:loading wire:target="image">Uploading...</div>

                    @error('image') <span class="error">{{ $message }}</span> @enderror

                    <button type="submit" wire:loading.attr="disabled" class="bg-blue-600 hover:bg-blue-800 transition rounded ml-3 py-1.5 px-4 text-white disabled:cursor-not-allowed">Save Photo</button>
                </form>
            </div>
            <div x-show="show"
                 class="w-1/5 text-right">
                <button @click="show = false"
                        class="text-red-600 hover:text-red-900 hover:underline transition"
                >Cancel
                </button>
            </div>
        </div>
    </div>
</div>
