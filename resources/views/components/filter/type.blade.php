<div x-data='{dropdown: false, selected: "{{ old('type') ?? request()->get('type') ?? 'Select Property Type' }}" }'
     class="w-full bg-white border border-blue-grad-dark/25 focus-within:border-blue-grad-dark focus-within:shadow-xl hover:border-blue-grad-dark/75 hover:shadow-lg transition rounded flex flex-col px-3 pt-1.5 pb-2 space-y-1">
    <input type="hidden" name="type" x-model="selected" />
    <div @click.outside="dropdown = false" class="relative">
        <button @click="dropdown = !dropdown" type="button" aria-haspopup="listbox" aria-expanded="true" aria-labelledby="listbox-label"
                class="relative w-full bg-white py-0.5 pr-10 text-left cursor-pointer">
            <span class="flex items-center">
                <span class="block truncate text-gray-500" x-text="selected" x-show="selected === 'Select Property Type'"></span>
                <span class="block truncate" x-text="selected" x-show="selected !== 'Select Property Type'"></span>
            </span>
        </button>

        <ul x-show="dropdown" x-transition.origin.top x-cloak
            class="absolute z-10 mt-1 max-h-56 w-full overflow-auto rounded-md bg-white py-1 text-base shadow-lg ring-1 ring-black ring-opacity-5 focus:outline-none">
            <li @click='selected = "Any"; dropdown = false'
                class="text-gray-900 hover:bg-blue-50 relative cursor-default select-none py-3 pl-3 pr-9 cursor-pointer">
                <div class="flex items-center font-normal block truncate">
                    Any
                </div>

                <span class="text-indigo-600 absolute inset-y-0 right-0 flex items-center pr-4"
                      x-show='selected === "Any"'>
                    @include('icons.dropdown-check', ['attributes' => 'h-5 w-5'])
                </span>
            </li>
            @foreach($types as $item)
                <li @click='selected = "{{ $item->label }}"; dropdown = false'
                    class="text-gray-900 hover:bg-blue-50 relative cursor-default select-none py-3 pl-3 pr-9 cursor-pointer">
                    <div class="flex items-center font-normal block truncate">
                        {{ $item->label }}
                    </div>

                    <span class="text-indigo-600 absolute inset-y-0 right-0 flex items-center pr-4"
                          x-show='selected === "{{ $item->label }}"'>
                    @include('icons.dropdown-check', ['attributes' => 'h-5 w-5'])
                </span>
                </li>
            @endforeach
        </ul>
    </div>
</div>
@error('type')
    <div class="text-red-600 text-sm">{{ $message }}</div>
@enderror
