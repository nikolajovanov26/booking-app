<div>
    <div x-data="{ show: @entangle('show')}" class="rounded-b-lg overflow-hidden">
        <div x-show="!show" x-transition:enter
             class="flex items-center w-full h-16 bg-white py-6 px-8">
            <div class="w-1/5">Date of Birth</div>
            <div class="w-3/5">
                {{ $value }}
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
            <div class="w-1/5">Date of Birth</div>
            <div x-show="show"
                 class="w-3/5">
                <input type="text" value="{{ $value }}" placeholder="Enter your birth date"
                       class="border w-64 text-gray-800 px-2 py-2 rounded focus:ring-0 focus:border-blue-grad-light">
                <button class="bg-blue-600 rounded ml-3 py-1.5 px-4 text-white">Update</button>

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
