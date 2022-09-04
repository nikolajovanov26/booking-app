<table class="border-collapse w-full bg-white rounded-xl shadow-2xl overflow-hidden">
    <thead>
        <tr>
            <th class="w-3/5 text-start px-6 py-4 font-bold text-xl bg-gray-800 text-white">Room type</th>
            <th class="w-1/5 text-start px-6 py-4 font-bold text-xl bg-gray-800 text-white">Persons</th>
            <th class="w-1/5 text-start px-6 py-4 font-bold text-xl bg-gray-800 text-white"></th>
        </tr>
    </thead>
    <tbody>
        <tr class="bg-white hover:bg-gray-100 transition h-16">
            <td class="px-6 py-2 text-gray-800 text-lg flex flex-col">
                Family Studio
                <span class="text-sm text-gray-600">1 single bed and 1 large double bed</span>
            </td>
            <td>
                <div class="px-6 py-2 flex">
                    @include('icons.person', ['attributes' => 'w-5 h-5', 'fill' => '#1f2937'])
                    @include('icons.person', ['attributes' => 'w-5 h-5', 'fill' => '#1f2937'])
                    @include('icons.person', ['attributes' => 'w-5 h-5', 'fill' => '#1f2937'])
                </div>
            </td>
            <td class="px-4">
                <button class="w-full h-10 rounded font-semibold text-white bg-blue-600 hover:bg-blue-900 transition">
                    Show prices
                </button>
            </td>
        </tr>
        <tr class="bg-white hover:bg-gray-100 transition h-16">
            <td class="px-6 py-2 text-gray-800 text-lg  flex flex-col">
                Standard Triple Room
                <span class="text-sm text-gray-600">1 sofa bed and 1 large double bed</span>
            </td>
            <td>
                <div class="px-6 py-2 flex">
                    @include('icons.person', ['attributes' => 'w-5 h-5', 'fill' => '#1f2937'])
                    @include('icons.person', ['attributes' => 'w-5 h-5', 'fill' => '#1f2937'])
                    @include('icons.person', ['attributes' => 'w-5 h-5', 'fill' => '#1f2937'])
                </div>
            </td>
            <td class="px-4">
                <button class="w-full h-10 rounded font-semibold text-white bg-blue-600 hover:bg-blue-900 transition">
                    Show prices
                </button>
            </td>
        </tr>
        <tr class="bg-white hover:bg-gray-100 transition h-16">
            <td class="px-6 py-2 text-gray-800 text-lg  flex flex-col">
                Double Room with Balcony
                <span class="text-sm text-gray-600">1 large double bed</span>
            </td>
            <td>
                <div class="px-6 py-2 flex">
                    @include('icons.person', ['attributes' => 'w-5 h-5', 'fill' => '#1f2937'])
                    @include('icons.person', ['attributes' => 'w-5 h-5', 'fill' => '#1f2937'])
                    @include('icons.person', ['attributes' => 'w-5 h-5', 'fill' => '#1f2937'])
                </div>
            </td>
            <td class="px-4">
                <button class="w-full h-10 rounded font-semibold text-white bg-blue-600 hover:bg-blue-900 transition">
                    Show prices
                </button>
            </td>
        </tr>
    </tbody>
</table>