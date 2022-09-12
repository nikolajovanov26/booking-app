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
        @foreach($counties as $country)
            <tr class="hover:bg-gray-100 transition">
                <td class="px-6 py-4">{{ $country->id }}</td>
                <td class="px-6 py-4 capitalize">{{ $country->label }}</td>
                <td class="px-6 py-4 text-center">{{ $country->properties()->count() }}</td>
                <td class="flex items-center justify-end px-6 py-4 text-right space-x-4">
                    <button class="bg-blue-600 text-white rounded px-3 py-2 hover:bg-blue-800 transition">Edit</button>
                    <button class="bg-red-700 text-white rounded px-3 py-2">Delete</button>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
</div>
