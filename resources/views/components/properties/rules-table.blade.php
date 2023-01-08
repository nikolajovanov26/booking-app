<table class="border-collapse w-full bg-blue-50 rounded-xl shadow-2xl overflow-hidden">
    <tbody>
    <tr class="hover:bg-blue-100 transition h-16">
        <td class="w-1/5 px-6 py-2">
            <div class="flex items-center space-x-2">
                @include('icons.clock', ['attributes' => 'w-6 h-6'])
                <p>Check-in</p>
            </div>
        </td>
        <td class="w-4/5 px-6 py-2">
            {{ $property->check_in_from }} - {{ $property->check_in_to }}
        </td>
    </tr>
    <tr class="hover:bg-blue-200 transition h-16">
        <td class="w-1/5 px-6 py-2">
            <div class="flex items-center space-x-2">
                @include('icons.clock', ['attributes' => 'w-6 h-6'])
                <p>Check-out</p>
            </div>
        </td>
        <td class="w-4/5 px-6 py-2">
            {{ $property->check_out_from }} - {{ $property->check_out_to }}
        </td>
    </tr>
    <tr class="hover:bg-blue-200 transition h-16">
        <td class="w-1/5 px-6 py-2">
            <div class="flex items-center space-x-2">
                @include('icons.info', ['attributes' => 'w-6 h-6'])
                <p>Cancellation/prepayment</p>
            </div>
        </td>
        <td class="w-4/5 px-6 py-2">
            {{ $property->cancellation_policy }}
        </td>
    </tr>
    <tr class="hover:bg-blue-200 transition h-16">
        <td class="w-1/5 px-6 py-2">
            <div class="flex items-center space-x-2">
                @include('icons.cash', ['attributes' => 'w-6 h-6'])
                <p>Payment</p>
            </div>
        </td>
        <td class="w-4/5 px-6 py-2">
            @forelse($property->paymentMethods as $paymentMethod)
                <p>{{ $paymentMethod->label }}</p>
            @empty
               <p>Please contact property to see available payment methods</p>
            @endforelse
        </td>
    </tr>
    <tr class="hover:bg-blue-200 transition h-16">
        <td class="w-1/5 px-6 py-2">
            <div class="flex items-center space-x-2">
                @include('icons.question', ['attributes' => 'w-6 h-6'])
                <p>Pets</p>
            </div>
        </td>
        <td class="w-4/5 px-6 py-2">
            Pets are @if(!$property->pets_allowed) not @endif allowed.
        </td>
    </tr>
    </tbody>
</table>
