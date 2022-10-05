<div class="flex bg-white rounded-xl drop-shadow-sm hover:drop-shadow-xl transition-all space-x-4 px-6 py-4">
    <div class="relative w-2/12">
        <div class="absolute top-2 right-2 text-white hover:text-red-600 transition-all">
            <form method="post" action="{{ route('toggleFavorite', ['property' => $property->id]) }}">
                @csrf
                <button>
                    @if(Auth::user()?->favorites()->get()->contains($property))
                        @include('icons.heart', ['attributes' => 'h-8 w-8 cursor-pointer', 'fill' => '#ff0000'])
                    @else
                        @include('icons.heart', ['attributes' => 'h-8 w-8 cursor-pointer', 'fill' => '#ff000033'])
                    @endif
                </button>
            </form>
        </div>
        <img src="https://images.unsplash.com/photo-1523217582562-09d0def993a6" alt="" class="rounded-xl">
    </div>
    <div class="w-8/12">
        <div class="flex items-center space-x-3">
            <h2 class="text-2xl font-semibold capitalize">{{ $property->name }}</h2>
            <div class="flex">
                @for($i = 0; $i < $property->stars; $i++)
                    @include('icons.star', ['attributes' => 'h-6 w-6 text-yellow-500', 'fill' => '#ffff00'])
                @endfor
            </div>
        </div>
        <div class="flex text-sm text-gray-800 my-2">
            <p>{{ $property->city }}</p>
            <span class="mx-2">&bull;</span>
            <p>Show on map</p>
            <span class="mx-2">&bull;</span>
            <p>1.1km from city center</p>
            @if($trending = null)
                <span class="mx-2">&bull;</span>
                {{ $property?->bookings }} bookings in the past month
            @endif
        </div>
        <div class="flex items-center space-x-2 my-2">
            @include('icons.building', ['attributes' => 'w-6 h-6'])
            <p>900 m from {{ $property->city }}</p>
        </div>
        <p class="line-clamp-3">{{ $property->description }}</p>
    </div>
    <div class="flex flex-col items-stretch place-content-between justify-items-end w-2/12">
        <div class="flex flex-col justify-end">
            <div class="flex flex-row justify-end items-e space-x-3">
                <div class="flex flex-col text-right">
                    <span class="font-bold text-xl -mb-1">{{ ratingString($property->reviews()->avg('rating')) }}</span>
                    <span class="text-sm">{{ $property->reviews()->count() }} reviews</span>
                </div>
                <div class="bg-blue-600 text-white font-bold text-2xl p-3 rounded-xl">{{ number_format($property->reviews()->avg('rating'), 1) }}</div>
            </div>
            <span class="text-right mt-2 mb-7">Location 9.7</span>
        </div>
        <div class="flex flex-col justify-end">
            <div class="flex justify-end items-baseline space-x-2">
                <span>From</span>
                <span class="text-right text-2xl font-bold text-blue-800 my-2">{{ number_format($property->rooms()->min('price'), 2) }}&euro;</span>
            </div>
            <div class="flex justify-end">
                <a href="{{ route('properties.show', ['property' => $property->slug]) }}" class="bg-blue-600 hover:bg-blue-700 transition-all text-white rounded-md w-fit px-4 py-2">View Property
                </a>
            </div>
        </div>
    </div>
</div>
