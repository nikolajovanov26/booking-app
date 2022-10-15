<div class="bg-white relative h-12">
    <div class="w-full flex flex-col border-2 justify-between transition rounded flex flex-col px-3 pt-1.5 pb-2 space-y-1 focus-within:border-blue-grad-light
     @error('guests') border-red-600 @enderror">
        <input type="number" min="0" max="8" value="{{ old('guests') ?? request()->get('guests') ?? null }}"
               placeholder="Guests" name="guests"
               class="bg-transparent border-0 text-gray-800 p-0 focus:ring-0 h-8 pl-6">
    </div>
    <div class="absolute h-full left-3 top-0.5 flex items-center text-blue-grad-dark">
        @include('icons.person', ['attributes' => 'h-5 w-5'])
    </div>
</div>
@error('guests')
    <div class="text-red-600 text-sm">{{ $message }}</div>
@enderror


