<div>
    <table class="text-left w-full">
        <thead class="bg-gray-800 text-white text-lg">
        <tr>
            <th class="w-1/12 px-6 py-6">#</th>
            <th class="w-1/12 px-6 py-6">Name</th>
            <th class="w-7/12 px-6 py-6">Explanation</th>
            <th class="w-2/12 px-6 py-6">Icon Name</th>
            <th class="w-1/12 px-6 py-6"></th>
        </tr>
        </thead>
        <tbody>
        @foreach($features as $feature)
            <tr class="hover:bg-gray-100 transition">
                <td class="px-6 py-4">{{ $feature->id }}</td>
                <td class="px-6 py-4 capitalize">{{ $feature->label }}</td>
                <td class="px-6 py-4">{{ $feature->explanation }}</td>
                <td class="px-6 py-4">{{ $feature->icon }}</td>
                <td class="flex items-center justify-end px-6 py-4 text-right space-x-4">
                    <button class="bg-blue-600 text-white rounded px-3 py-2 hover:bg-blue-800 transition">Edit</button>
                    <button class="bg-red-700 text-white rounded px-3 py-2">Delete</button>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
</div>
