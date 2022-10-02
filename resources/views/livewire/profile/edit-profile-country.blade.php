<div>
    <div x-data="{ show: @entangle('show'), name:@entangle('name') } ">
        <div x-show="!show" x-transition:enter
             class="flex items-center w-full h-16 border-b-2 border-gray-100 bg-white py-6 px-8">
            <div class="w-1/5">Country</div>
            <div class="w-3/5">
                <p x-text="name"></p>
            </div>
            <div class="w-1/5 text-right">
                <button @click="show = true"
                        class="text-blue-600 hover:text-blue-900 hover:underline transition"
                >Edit
                </button>
            </div>
        </div>
        <div x-show="show" x-transition:enter x-cloak
             class="flex items-center w-full h-18 border-b-2 border-gray-100 bg-blue-100 py-6 px-8">
            <div class="w-1/5">Country</div>
            <div x-show="show"
                 class="w-3/5 flex ">
                <div x-data='{ dropdown: false }'
                     class="w-64 bg-white border border-gray-500 focus-within:border-blue-grad-light transition rounded flex flex-col px-2 pt-1 ">
                    <input type="hidden" name="terms" x-model="name"/>
                    <div @click.outside="dropdown = false" class="relative">
                        <button @click="dropdown = !dropdown" type="button" aria-haspopup="listbox" aria-expanded="true"
                                aria-labelledby="listbox-label"
                                class="relative w-full bg-white pr-10 text-left cursor-pointer">
                                <span class="flex items-center">
                                    <span class="block truncate text-gray-500" x-text="name"
                                          x-show="name === 'Select your country'"></span>
                                    <span class="block mt-0.5" x-text="name" x-show="name !== 'Select your country'"></span>
                                </span>
                        </button>

                        <ul x-show="dropdown" x-transition.origin.top x-cloak
                            class="absolute z-10 mt-1 max-h-56 overflow-auto rounded-md bg-white py-1 text-base shadow-lg ring-1 ring-black ring-opacity-5 focus:outline-none">
                            @foreach($countries as $country)
                                <li @click='name = "{{ $country->label }}"; dropdown = false'
                                    class="text-gray-900 hover:bg-blue-50 relative cursor-default select-none py-3 pl-3 pr-9 cursor-pointer">
                                    <div class="flex items-center font-normal block truncate">
                                        {{ $country->label }}
                                    </div>

                                    <span class="text-indigo-600 absolute inset-y-0 right-0 flex items-center pr-4"
                                          x-show='name === "{{ $country->label }}"'>
                                        @include('icons.dropdown-check', ['attributes' => 'h-5 w-5'])
                                    </span>
                                </li>
                            @endforeach
                        </ul>
                    </div>
                </div>
                <button wire:click="update" type="button" class="bg-blue-600 hover:bg-blue-800 transition rounded ml-4 py-1.5 px-4 text-white">Update</button>

            </div>
            <div x-show="show"
                 class="w-1/5 text-right">
                <button @click="show = false"
                        class="text-red-600 hover:text-red-900 hover:underline transition"
                >Cancel
                </button>
            </div>
        </div>
    </div>
</div>
