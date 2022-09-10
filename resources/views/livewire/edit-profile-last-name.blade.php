<div>
    <div x-data="{ editLastName: @entangle('show')} ">
        <div x-show="!editLastName" x-transition:enter
             class="flex items-center w-full h-16 border-b-2 border-gray-100 bg-white py-6 px-8">
            <div class="w-1/5">Last Name</div>
            <div class="w-3/5">
                Jovanov
            </div>
            <div class="w-1/5 text-right">
                <button @click="editLastName = true"
                        class="text-blue-600 hover:text-blue-900 hover:underline transition"
                >Edit
                </button>
            </div>
        </div>
        <div x-show="editLastName" x-transition:enter x-cloak
             class="flex items-center w-full h-18 border-b-2 border-gray-100 bg-blue-100 py-6 px-8">
            <div class="w-1/5">Last Name</div>
            <div x-show="editLastName"
                 class="w-3/5">
                <input type="text" value="Jovanov" placeholder="Enter your last name"
                       class="border text-gray-800 px-2 py-2 rounded focus:ring-0 focus:border-blue-grad-light">
                <button class="bg-blue-600 rounded ml-3 py-1.5 px-4 text-white">Update</button>

            </div>
            <div x-show="editLastName"
                 class="w-1/5 text-right">
                <button @click="editLastName = false"
                        class="text-red-600 hover:text-red-900 hover:underline transition"
                >Cancel
                </button>
            </div>
        </div>
    </div>
</div>