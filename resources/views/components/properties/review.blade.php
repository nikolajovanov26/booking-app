<div class="bg-white rounded-xl shadow-2xl px-4 py-5">
    <div class="flex items-center space-x-3 mb-3">
        <div
            class="flex rounded-full font-semibold items-center justify-center text-xl w-12 h-12">
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
    <p class="line-clamp-5">
        {{ $review->comment }}
    </p>
    <div
        @click="reviewModal = true"
        class="cursor-pointer block text-blue-600 hover:underline mt-3 w-fit">
        Read more
    </div>
</div>
