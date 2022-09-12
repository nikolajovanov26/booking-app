<div x-data="{ show: true }" x-show="show"  x-transition.origin.bottom x-init="setTimeout(() => show = false, 5000)">
    @if(Session::has('error'))
        <div class="flex w-96 bg-white rounded-xl shadow-xl space-x-5 fixed bottom-5 right-5 flex items-start space-x-2 p-5">
            <span class="mt-1 text-red-600">@include('icons.error', ['attributes' => 'w-6 h-6'])</span>
            <div class="flex flex-col">
                <p class="font-semibold">{{ Session::get('error')['action'] }}</p>
                <p class="text-gray-600">{{ Session::get('error')['message'] }}</p>
            </div>
            <button @click="show = false"
                class="absolute top-4 right-4">
                @include('icons.x-mark', ['attributes' => 'w-5 h-5'])
            </button>
        </div>
    @elseif(Session::has('success'))
        <div class="flex w-96 bg-white rounded-xl shadow-xl space-x-5 fixed bottom-5 right-5 flex items-start space-x-2 p-5">
            <span class="mt-1 text-green-700">@include('icons.success', ['attributes' => 'w-6 h-6'])</span>
            <div class="flex flex-col">
                <p class="font-semibold">{{ Session::get('error')['action'] }}</p>
                <p class="text-gray-600">{{ Session::get('error')['message'] }}</p>
            </div>
            <button @click="show = false"
                    class="absolute top-4 right-4">
                @include('icons.x-mark', ['attributes' => 'w-5 h-5'])
            </button>
        </div>
    @endif
</div>
