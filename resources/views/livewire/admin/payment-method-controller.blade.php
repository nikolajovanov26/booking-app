<div
    x-data="{
        showCreateModal: @entangle('showCreateModal'),
        showEditModal: @entangle('showEditModal'),
        showDeleteModal: @entangle('showDeleteModal'),
        modalText: @entangle('modalText')
    }">
    <div class="flex justify-end">
        <div class="mb-6">
            <button
                @click="showCreateModal = true" @keydown.esc="showCreateModal = false"
                class="bg-blue-600 hover:bg-blue-900 transition py-4 px-6 text-white font-semibold text-lg rounded-xl">
                Add Payment Method
            </button>
        </div>

    </div>
    <div class="bg-white shadow-xl rounded-xl overflow-hidden">
        <div>
            <table class="text-left w-full">
                <thead class="bg-gray-800 text-white text-lg">
                <tr>
                    <th class="w-1/12 px-6 py-6">#</th>
                    <th class="w-3/12 px-6 py-6">Name</th>
                    <th class="w-3/12 px-6 py-6 text-center">Num. of Properties</th>
                    <th class="w-5/12 px-6 py-6"></th>
                </tr>
                </thead>
                <tbody>
                @foreach($paymentMethods as $payment)
                    <tr class="hover:bg-gray-100 transition">
                        <td class="px-6 py-4">{{ $payment->id }}</td>
                        <td class="px-6 py-4 capitalize">{{ $payment->label }}</td>
                        <td class="px-6 py-4 text-center">{{ $payment->properties()->count() }}</td>
                        <td class="flex items-center justify-end px-6 py-4 text-right space-x-4">
                            <button wire:click="editModal({{ $payment->id }})" class="bg-blue-600 text-white rounded px-3 py-2 hover:bg-blue-800 transition">Edit</button>
                            <button wire:click="deleteModal({{ $payment->id }})" class="bg-red-700 text-white rounded px-3 py-2">Delete</button>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>

    <div x-show="showCreateModal" x-cloak
         class="fixed inset-0 backdrop-blur-sm z-50 bg-gray-800/10">
        <div class="flex w-full h-full items-center justify-center">
            <div x-show="showCreateModal" x-transition @click.outside="showCreateModal = false"
                 class="w-2/5 bg-white border relative rounded-lg shadow-xl px-8 py-6 space-y-4">
                <h2 class="font-semibold text-2xl">Add Payment Method</h2>
                <form wire:submit.prevent="create" class="space-y-4">
                    <div
                        class="w-full flex flex-col justify-between border border-blue-grad-dark/25 focus-within:border-blue-grad-dark focus-within:shadow-xl hover:border-blue-grad-dark/75 hover:shadow-lg transition rounded flex flex-col px-3 pt-1.5 pb-2 space-y-1">
                        <label class="text-sm text-blue-800 font-semibold">Name</label>
                        <input wire:model.defer="name" type="text" placeholder="Enter Payment Method Name"
                               class="border-0 text-gray-800 px-0 py-0 border-b-2 border-transparent focus:ring-0 focus:border-b-2 focus:border-blue-grad-light">
                    </div>
                    @error('name') <span class="text-red-600">{{ $message }}</span> @enderror
                    <div class="flex justify-end space-x-3">
                        <button @click="showCreateModal = false"
                                class="flex items-center px-5 py-3 space-x-0.5 font-semibold text-red-500 transition hover:underline">
                            @include('icons.bin', ['attributes' => 'h-6 w-6'])
                            <span>Cancel</span>
                        </button>
                        <button wire:click.prevent="create()"
                                class="bg-blue-grad-light hover:bg-blue-grad-dark transition px-5 py-3 font-semibold text-white rounded">
                            Add Payment Method
                        </button>
                    </div>
                </form>
                <button @click="showCreateModal = false" class="absolute top-0 right-3">
                    @include('icons.x-mark', ['attributes' => 'w-6 h-6'])
                </button>
            </div>
        </div>
    </div>

    <div x-show="showEditModal" x-cloak
         class="fixed inset-0 backdrop-blur-sm z-50 bg-gray-800/10">
        <div class="flex w-full h-full items-center justify-center">
            <div x-show="showEditModal" x-transition @click.outside="showEditModal = false"
                 class="w-2/5 bg-white border relative rounded-lg shadow-xl px-8 py-6 space-y-4">
                <h2 class="font-semibold text-2xl" x-text="modalText">Edit Payment Method</h2>
                <form wire:submit.prevent="edit" class="space-y-4">
                    <div
                        class="w-full flex flex-col justify-between border border-blue-grad-dark/25 focus-within:border-blue-grad-dark focus-within:shadow-xl hover:border-blue-grad-dark/75 hover:shadow-lg transition rounded flex flex-col px-3 pt-1.5 pb-2 space-y-1">
                        <label class="text-sm text-blue-800 font-semibold">Name</label>
                        <input wire:model.defer="editName" type="text" placeholder="Enter Payment Method Name"
                               class="border-0 text-gray-800 px-0 py-0 border-b-2 border-transparent focus:ring-0 focus:border-b-2 focus:border-blue-grad-light">
                    </div>
                    @error('editName') <span class="text-red-600">{{ $message }}</span> @enderror
                    <div class="flex justify-end space-x-3">
                        <button @click="showEditModal = false"
                                class="flex items-center px-5 py-3 space-x-0.5 font-semibold text-red-500 transition hover:underline">
                            @include('icons.bin', ['attributes' => 'h-6 w-6'])
                            <span>Cancel</span>
                        </button>
                        <button wire:click="edit" type="button"
                                class="bg-blue-grad-light hover:bg-blue-grad-dark transition px-5 py-3 font-semibold text-white rounded">
                            Save Payment Method
                        </button>
                    </div>
                </form>
                <button @click="showEditModal = false" class="absolute top-0 right-3">
                    @include('icons.x-mark', ['attributes' => 'w-6 h-6'])
                </button>
            </div>
        </div>
    </div>

    <div x-show="showDeleteModal" x-cloak
         class="fixed inset-0 backdrop-blur-sm z-50 bg-gray-800/10">
        <div class="flex w-full h-full items-center justify-center">
            <div x-show="showDeleteModal" x-transition @click.outside="showDeleteModal = false"
                 class="w-2/5 bg-white border relative rounded-lg shadow-xl px-8 py-6 space-y-4">
                <h2 class="font-semibold text-2xl" x-text="modalText">Delete Payment Method</h2>
                <div class="flex items-center justify-end">
                    <button @click="showDeleteModal = false"
                            class="flex items-center px-5 py-3 space-x-0.5 font-semibold transition hover:underline">
                        <span>Cancel</span>
                    </button>
                    <button wire:click.prevent="delete()"
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
            <button wire:click="removeFlash"
                    class="absolute top-4 right-4">
                @include('icons.x-mark', ['attributes' => 'w-5 h-5'])
            </button>
        </div>
    @endif

</div>
