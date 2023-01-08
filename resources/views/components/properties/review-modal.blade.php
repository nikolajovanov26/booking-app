<div class="backdrop-blur-sm bg-opacity-20 bg-gray-200 fixed inset-0"
     @keyup.escape.window="reviewModal = false"
     x-cloak>
    <div class="flex items-center justify-center w-full h-full ">

        <div
            x-show="reviewModal"
            x-transition
            @click.outside="reviewModal = false"
            class="bg-white shadow-2xl relative m-auto rounded-xl w-4/5 px-3 py-4 mx-3 grid grid-cols-3 gap-8">
            @foreach($property->reviews as $review)
                <div class="
                    @if($loop->iteration % 3 != 0 ) border-r border-blue-grad-light @endif
                ">
                    <div class="flex justify-between mb-3 mr-8">
                        <div class="flex items-center space-x-3 mb-3">
                            <div
                                class="flex rounded-full font-semibold items-center justify-center text-xl w-12 h-12">
{{--                                {{ $review->user->profile->fullName() }}--}}
                                <img class="w-12 h-12 rounded-full"
                                     src="{{
                                Storage::disk('profile_pictures')->url(
                                    $review->user->profile->profile_picture
                                    ? $review->user->id . DIRECTORY_SEPARATOR . $review->user->profile->profile_picture
                                    : 'avatar.png'
                                )}}">
                            </div>
                            <div class="">
                                <p class="font-lg font-semibold text-gray-900">{{ $review->user->profile->fullName() }}</p>
                                <p class="text-sm text-gray-600 -mt-1">{{ $review->user->profile->country->label }}</p>
                            </div>
                        </div>
                        <div class="flex flex-row items-center space-x-3">
                            <div>
                                <span class="font-bold text-lg -mb-3">{{ ratingString($review->rating) }}</span>
                                <p class="text-sm text-right text-gray-700">{{ $review->created_at->diffForHumans() }}</p>
                            </div>
                            <div class="bg-blue-600 text-white font-bold p-2 rounded-lg">{{ number_format($review->rating, 1) }}</div>
                        </div>
                    </div>
                    <p class="mr-2">
                        {{ $review->comment }}
                    </p>
                </div>

            @endforeach
            <button @click="reviewModal = false"
                class="absolute top-3 right-3 p-1 hover:bg-gray-100 transition">
                @include('icons.x-mark', ['attributes' => 'w-6 h-6'])
            </button>
        </div>
    </div>
</div>
