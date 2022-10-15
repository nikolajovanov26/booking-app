<div class="bg-white relative">
    <div class="w-full flex flex-col border-2 justify-between transition rounded flex flex-col px-3 pt-1.5 pb-2 space-y-1 focus-within:border-blue-grad-light
    @error($name) border-red-600 @enderror">
        <input type="date" value="{{ old($name) ?? request()->get($name) ?? null }}"
               placeholder="{{ $placeholder }}" name="{{ $name }}"
               class="bg-transparent border-0 text-gray-800 p-0 focus:ring-0 h-8 pl-6">
    </div>
    <div class="absolute h-full left-3 top-0 flex items-center text-blue-grad-dark">
        @switch($name)
            @case('date_from') @include('icons.plane-departure', ['attributes' => 'h-5 w-5']) @break
            @case('date_to') @include('icons.plane-arrival', ['attributes' => 'h-5 w-5']) @break
        @endswitch
    </div>
</div>
@error($name)
    <div class="text-red-600 text-sm">{{ $message }}</div>
@enderror
