<table class="border-collapse w-full bg-white rounded-xl shadow-2xl overflow-hidden">
    <thead>
    <tr>
        <th class="w-2/5 text-start px-6 py-4 font-bold text-xl bg-gray-800 text-white">Room type</th>
        <th class="w-1/5 text-start px-6 py-4 font-bold text-xl bg-gray-800 text-white">Persons</th>
        <th class="w-1/5 text-start px-6 py-4 font-bold text-xl bg-gray-800 text-white">Price</th>
        <th class="w-1/5 text-start px-6 py-4 font-bold text-xl bg-gray-800 text-white"></th>
    </tr>
    </thead>
    <tbody>
    @foreach($rooms as $room)
        <tr class="bg-white hover:bg-gray-100 transition h-16">
            <td class="px-6 py-2 text-gray-800 text-lg flex flex-col">
                {{ $room->roomType->label }}
                <span class="text-sm text-gray-600">
                    @if($room->large_beds)
                        {{ $room->large_beds }} large beds
                    @endif
                    @if($room->double_beds)
                        {{ $room->double_beds }} double beds
                    @endif
                    @if($room->single_beds)
                        {{ $room->single_beds }} single beds
                    @endif
                    @if($room->sofa_beds)
                        {{ $room->sofa_beds }} sofa beds
                    @endif
                </span>
            </td>
            <td>
                <div class="px-6 py-2 flex">
                    @for($i = 0; $i < $room->number_of_persons; $i++)
                        @include('icons.person', ['attributes' => 'w-5 h-5'])
                    @endfor
                </div>
            </td>
            <td>
                <div class="px-6 py-2 flex font-semibold text-blue-800">
                    {{ number_format($room->price, 2) }} &euro;
                </div>
            </td>
            <td class="px-4">
                <button class="w-full h-10 rounded font-semibold text-white bg-blue-600 hover:bg-blue-900 transition">
                    Book Now
                </button>
            </td>
        </tr>
    @endforeach
    </tbody>
</table>
