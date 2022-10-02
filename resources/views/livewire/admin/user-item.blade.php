<div x-data="{
    changeRole: @entangle('changeRole'),
    dropdown: @entangle('dropdown'),
    selected: @entangle('role'),
    saveButton: @entangle('saveButton'),
    showDeleteModal: @entangle('showDeleteModal')
}">
    <div class="transition flex items-center x-transition
        @if($changeRole)
            hover:bg-blue-200 bg-blue-100 h-20
        @else
            hover:bg-gray-100 h-16
        @endif
    ">
        <div class="w-1/12 p-4">{{ $user->id }}</div>
        <div class="w-2/12 p-4 capitalize">{{ $user->profile->fullName() }}</div>
        <div class="w-3/12 p-4">{{ $user->email }}</div>
        <div class="w-4/12 p-4">
            @if($changeRole)
                <div class="flex items-center space-x-1">
                    <div
                        class="w-full border bg-white border-blue-grad-dark/25 focus-within:border-blue-grad-dark focus-within:shadow-xl hover:border-blue-grad-dark/75 hover:shadow-lg transition rounded flex flex-col px-3 pt-1.5 pb-2 space-y-1">
                        <label class="text-left text-sm text-blue-800 font-semibold">Role</label>
                        <input type="hidden" name="terms" x-model="selected" wire:model.defer="role"/>
                        <div @click.outside="dropdown = false" class="relative">
                            <button @click="dropdown = !dropdown" type="button" aria-haspopup="listbox"
                                    aria-expanded="true"
                                    aria-labelledby="listbox-label"
                                    class="relative w-full bg-white py-0.5 pr-10 text-left cursor-pointer">
                                <span class="flex items-center">
                                    <span class="block truncate text-gray-500"
                                          x-show="selected == null " x-transition>Chose Role</span>
                                    <span class="block truncate" x-show="selected !== null" x-transition>{{ $role }}</span>
                                </span>
                            </button>

                            <ul x-show="dropdown" x-transition.origin.top x-cloak
                                class="absolute z-10 mt-1 max-h-56 w-full overflow-auto rounded-md bg-white py-1 text-base shadow-lg ring-1 ring-black ring-opacity-5 focus:outline-none">
                                @foreach($roles as $role)
                                    <li wire:click="changeRole('{{ $role->label }}')"
                                        class="text-gray-900 hover:bg-blue-50 relative cursor-default select-none py-3 pl-3 pr-9 cursor-pointer">
                                        <div class="flex items-center font-normal block truncate">
                                            {{ $role->label }}
                                        </div>

                                        <span class="text-indigo-600 absolute inset-y-0 right-0 flex items-center pr-4"
                                              x-show='selected === "{{ $role->label }}"' x-transition>
                                        @include('icons.dropdown-check', ['attributes' => 'h-5 w-5'])
                                    </span>
                                    </li>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                </div>
            @else
                <span>{{ $user->role->label }}</span>
            @endif
        </div>
        <div class="w-2/12 flex items-center justify-end p-4 text-right space-x-4">
            <div class="flex items-center justify-end space-x-3">
                @if($changeRole)
                    <div x-show="saveButton" x-transition>
                        <button type="button" wire:click="edit"
                                class="whitespace-nowrap mr-3 text-right text-blue-600 hover:underline">
                            Save
                        </button>
                    </div>

                    <button type="button" wire:click="changeState"
                            class="whitespace-nowrap text-right text-red-600 hover:underline">
                        Close
                    </button>
                @else
                    <button wire:click="changeState" type="button"
                            class="text-blue-600 text-white rounded px-3 py-2 hover:underline">Change Role
                    </button>
                    <button @click="showDeleteModal = true" type="button"
                            class="bg-red-700 hover:bg-red-900 transition text-white rounded px-3 py-2">Delete
                    </button>
                @endif
            </div>
        </div>
    </div>

    <div x-show="showDeleteModal" x-cloak x-transition
         class="fixed inset-0 backdrop-blur-sm z-50 bg-gray-800/10">
        <div class="flex w-full h-full items-center justify-center">
            <div x-show="showDeleteModal" x-transition @click.outside="showDeleteModal = false"
                 class="w-2/5 bg-white border relative rounded-lg shadow-xl px-8 py-6 space-y-4">
                <h2 class="font-semibold text-2xl">Delete {{ ucwords($user->profile->fullname()) }}</h2>
                <div class="flex items-center justify-end">
                    <button @click="showDeleteModal = false"
                            class="flex items-center px-5 py-3 space-x-0.5 font-semibold transition hover:underline">
                        <span>Cancel</span>
                    </button>
                    <button wire:click.prevent="delete"
                            class="bg-red-600 hover:bg-red-800 transition px-5 py-3 font-semibold text-white rounded">
                        Delete
                    </button>
                </div>

                <button @click="showDeleteModal = false" class="absolute top-0 right-3">
                    @include('icons.x-mark', ['attributes' => 'w-6 h-6'])
                </button>
            </div>
        </div>
    </div>

    @if(Session::has('error'))
        <div
            class="flex w-96 bg-white rounded-xl shadow-xl space-x-5 fixed bottom-5 right-5 flex items-start space-x-2 p-5">
            <span class="mt-1 text-red-600">@include('icons.error', ['attributes' => 'w-6 h-6'])</span>
            <div class="flex flex-col">
                <p class="font-semibold">{{ Session::get('error')['action'] }}</p>
                <p class="text-gray-600">{{ Session::get('error')['message'] }}</p>
            </div>
            <button wire:click="removeFlash"
                    class="absolute top-4 right-4">
                @include('icons.x-mark', ['attributes' => 'w-5 h-5'])
            </button>
        </div>
    @elseif(Session::has('success'))
        <div
            class="flex w-96 bg-white rounded-xl shadow-xl space-x-5 fixed bottom-5 right-5 flex items-start space-x-2 p-5">
            <span class="mt-1 text-green-700">@include('icons.success', ['attributes' => 'w-6 h-6'])</span>
            <div class="flex flex-col">
                <p class="font-semibold">{{ Session::get('success')['action'] }}</p>
                <p class="text-gray-600">{{ Session::get('success')['message'] }}</p>
            </div>
            <button wire:click="refresh"
                    class="absolute top-4 right-4">
                @include('icons.x-mark', ['attributes' => 'w-5 h-5'])
            </button>
        </div>
    @endif
</div>
