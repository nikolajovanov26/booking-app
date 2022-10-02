<div x-data="{
    changeStatus: @entangle('changeStatus'),
    dropdown: @entangle('dropdown'),
    selected: @entangle('status'),
    saveButton: @entangle('saveButton')
}">
    <div class="transition flex items-center x-transition
    @if($changeStatus)
        hover:bg-blue-200 bg-blue-100 h-20
    @else
        hover:bg-gray-100 h-16
    @endif
    ">
        <div class="p-4">{{ $transaction->id }}</div>
        <div class="w-1/12 p-4">
            <p href=""
               class="text-blue-700 hover:underline hover:text-blue-900 transition">
                {{ $transaction->owner->profile->fullName() }}
            </p>
        </div>
        <div class="w-1/12 p-4">
            <a href=""
               class="text-blue-700 hover:underline hover:text-blue-900 transition">
                {{ $transaction->customer->profile->fullName() }}
            </a>
        </div>
        <div class="w-2/12 p-4">
            <a href="{{ route('properties.show', ['property' => 1]) }}"
               class="text-blue-700 hover:underline hover:text-blue-900 transition">
                {{ ucwords($transaction->property->name) }}
            </a>
        </div>
        <div class="w-1/12 p-4 text-center">{{ $transaction->total }} &euro;</div>
        <div class="w-2/12 p-4 text-center">{{ $transaction->created_at->toDateString() }}</div>
        <div class="w-3/12 p-4 text-center">
            @if($changeStatus)
                <div class="flex items-center space-x-1">
                    <div class="w-full border bg-white border-blue-grad-dark/25 focus-within:border-blue-grad-dark focus-within:shadow-xl hover:border-blue-grad-dark/75 hover:shadow-lg transition rounded flex flex-col px-3 pt-1.5 pb-2 space-y-1">
                        <label class="text-left text-sm text-blue-800 font-semibold">Status</label>
                        <input type="hidden" name="terms" x-model="selected" wire:model.defer="status"/>
                        <div @click.outside="dropdown = false" class="relative">
                            <button @click="dropdown = !dropdown" type="button" aria-haspopup="listbox" aria-expanded="true"
                                    aria-labelledby="listbox-label"
                                    class="relative w-full bg-white py-0.5 pr-10 text-left cursor-pointer">
                                <span class="flex items-center">
                                    <span class="block truncate text-gray-500"
                                          x-show="selected == null ">Chose Status</span>
                                    <span class="block truncate" x-show="selected !== null">{{ $status }}</span>
                                </span>
                            </button>

                            <ul x-show="dropdown" x-transition.origin.top x-cloak
                                class="absolute z-10 mt-1 max-h-56 w-full overflow-auto rounded-md bg-white py-1 text-base shadow-lg ring-1 ring-black ring-opacity-5 focus:outline-none">
                                @foreach($statuses as $status)
                                    <li wire:click="changeStatus('{{ $status->label }}')"
                                        class="text-gray-900 hover:bg-blue-50 relative cursor-default select-none py-3 pl-3 pr-9 cursor-pointer">
                                        <div class="flex items-center font-normal block truncate">
                                            {{ $status->label }}
                                        </div>

                                        <span class="text-indigo-600 absolute inset-y-0 right-0 flex items-center pr-4"
                                              x-show='selected === "{{ $status->label }}"'>
                                        @include('icons.dropdown-check', ['attributes' => 'h-5 w-5'])
                                    </span>
                                    </li>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                </div>
            @else
                <span class="text-center tracking-wide text-white px-4 pt-0.5 pb-1 rounded-xl
                @if($transaction->transactionStatus->name == 'paid')
                    bg-green-600
                @elseif($transaction->transactionStatus->name == 'on-hold')
                    bg-orange-600
                @elseif($transaction->transactionStatus->name == 'refunded')
                    bg-red-600
                @else
                    bg-gray-600
                @endif
            "> {{ $transaction->transactionStatus->label }}
            </span>
            @endif
        </div>
        <div class="w-2/12 p-4 text-right">
            <div class="flex items-center justify-end space-x-3">
                @if($changeStatus)
                    <div x-show="saveButton">
                        <button type="button" wire:click="edit" class="whitespace-nowrap mr-3 text-right text-blue-600 hover:underline">
                            Save
                        </button>
                    </div>

                    <button type="button" wire:click="changeState" class="whitespace-nowrap text-right text-red-600 hover:underline">
                        Close
                    </button>
                @else
                    <button type="button" wire:click="changeState" class="whitespace-nowrap text-right text-blue-600 hover:underline">
                        Change Status
                    </button>
                @endif
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
