<div x-data='{dropdown: false, selected: "{{ $placeholder }}", num: 0}'
    class="w-full border border-blue-grad-dark/25 focus-within:border-blue-grad-dark focus-within:shadow-xl hover:border-blue-grad-dark/75 hover:shadow-lg transition rounded flex flex-col px-3 pt-1.5 pb-2 space-y-1">
    <label class="text-sm text-blue-800 font-semibold">{{ $label }}</label>
    <input type="hidden" name="terms" x-model="selected" />
    <div @click.outside="dropdown = false" class="relative">
        <button @click="dropdown = !dropdown" type="button" aria-haspopup="listbox" aria-expanded="true" aria-labelledby="listbox-label"
                class="relative w-full cursor-default bg-white py-0.5 pr-10 text-left">
            <span class="flex items-center">
                <span class="block truncate text-gray-500" x-text="selected" x-show="selected === '{{ $placeholder }}'"></span>
                <span class="block truncate" x-text="selected" x-show="selected !== '{{ $placeholder }}'"></span>
            </span>
        </button>


        <ul x-show="dropdown" x-transition.origin.top x-cloak
            class="absolute z-10 mt-1 max-h-56 w-full overflow-auto rounded-md bg-white py-1 text-base shadow-lg ring-1 ring-black ring-opacity-5 focus:outline-none">

            <li @click="selected = 'Tom Cook'; dropdown = false"
                class="text-gray-900 hover:bg-blue-50 relative cursor-default select-none py-3 pl-3 pr-9" >
                <div class="flex items-center font-normal block truncate">
                    Tom Cook
                </div>

                <span class="text-indigo-600 absolute inset-y-0 right-0 flex items-center pr-4" x-show="selected === 'Tom Cook'">
                    @include('icons.dropdown-check', ['attributes' => 'h-5 w-5'])
                </span>
            </li>

            <li @click="selected = 'Wade Cooper'; dropdown = false"
                class="text-gray-900 hover:bg-blue-50 relative cursor-default select-none py-2 pl-3 pr-9">
                <div class="flex items-center font-normal block truncate">
                    Wade Cooper
                </div>

                <span class="text-indigo-600 absolute inset-y-0 right-0 flex items-center pr-4" x-show="selected === 'Wade Cooper'">
                    @include('icons.dropdown-check', ['attributes' => 'h-5 w-5'])
                </span>
            </li>

            <li @click="selected = 'Other'; dropdown = false"
                class="text-gray-900 hover:bg-blue-50 relative cursor-default select-none py-2 pl-3 pr-9">
                <div class="flex items-center font-normal block truncate">
                    Other
                </div>

                <span class="text-indigo-600 absolute inset-y-0 right-0 flex items-center pr-4" x-show="selected === 'Other'">
                    @include('icons.dropdown-check', ['attributes' => 'h-5 w-5'])
                </span>
            </li>
        </ul>
    </div>
</div>
