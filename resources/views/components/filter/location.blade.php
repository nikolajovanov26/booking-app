<div class="bg-white relative h-12">
    <div class="w-full flex flex-col border-2 justify-between transition rounded flex flex-col px-3 pt-1.5 pb-2 space-y-1 focus-within:border-blue-grad-light
    @error('location') border-red-600 @enderror">
        <input type="text" value="{{ old('location') ?? request()->get('location') ?? null }}"
               placeholder="Search for location.." name="location"
               class="bg-transparent border-0 text-gray-800 p-0 focus:ring-0 h-8 pl-6">
    </div>
    <div class="absolute h-full left-4 top-0 flex items-center text-blue-grad-dark">
        @include('icons.map-pin', ['attributes' => 'h-6 w-6'])
    </div>
</div>
@error('location')
    <div class="text-red-600 text-sm">{{ $message }}</div>
@enderror
