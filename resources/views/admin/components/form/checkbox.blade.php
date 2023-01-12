@php
    if(!isset($property)) {
        $property = new \App\Models\Property();
    }
@endphp
<div>
    <div
        class="w-full flex flex-col border border-blue-grad-dark/25 focus-within:border-blue-grad-dark focus-within:shadow-xl hover:border-blue-grad-dark/75 hover:shadow-lg transition rounded flex flex-col px-3 pt-1.5 pb-2 space-y-1">
        <label class="text-sm text-blue-800 font-semibold mb-2">{{ $label }}</label>
        <div class="flex flex-col space-y-3">
            @foreach($items as $item)
                <div class="flex">
                    <div class="flex items-center h-5">
                        <input type="checkbox" @if(method_exists($property, $name))
                            @checked($property->$name()->get()->contains($item))
                        @endif
                        value="{{ $item->id ?? $item['id'] }}" name="{{ $name }}"
                               @checked($value ?? false) class="w-4 h-4 text-blue-600 bg-gray-100 rounded border-gray-300 focus:ring-blue-500 focus:ring-2">
                    </div>
                    <div class="ml-2 text-sm">
                        <label class="font-medium text-gray-900">{{ $item?->label ?? $item['label'] }}</label>
                        <p class="text-xs font-normal text-gray-500">{{ $item?->explanation ?? $item['explanation'] }}</p>
                    </div>
                </div>
            @endforeach
        </div>
    </div>

    @error($name)
    <div class="text-red-600 text-sm">{{ $message }}</div>
    @enderror
</div>



