@extends('layouts.auth')

@section('content')
    <div class="flex flex-col h-full space-y-10">
        @if($errors->any())
            <p class="text-red-600">{{$errors->first()}}</p>
        @endif
        <div class="bg-white shadow-xl rounded-xl overflow-hidden">
            <table class="text-left w-full">
                @if(isset($invoices))
                    <thead class="bg-gray-800 text-white text-lg">
                    <tr>
                        <th class="w-2/12 p-6">Number</th>
                        <th class="w-3/12 p-6">Total</th>
                        <th class="w-2/12 p-6">Status</th>
                        <th class="w-3/12 p-6">Date</th>
                        <th class="w-2/12 p-6"></th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($invoices as $invoice)
                        <tr class="hover:bg-gray-100 transition">
                            <td class="w-2/12 p-6">{{ $invoice->number }}</td>
                            <td class="w-3/12 p-6">{{ $invoice->total }} &euro;</td>
                            <td class="w-2/12 p-6">{{ ucwords($invoice->status) }}</td>
                            <td class="w-3/12 p-6">{{ \Carbon\Carbon::createFromTimestamp($invoice->created)->format('d M Y') }}</td>
                            <td class="w-2/12 p-6 text-right">
                                <a class="bg-blue-grad-dark transition hover:bg-blue-grad-light px-6 py-3 text-white font-semibold rounded text-lg" href="{{ $invoice->invoice_pdf }}">Download pdf</a>
                            </td>
                        </tr>
                    @endforeach
                    @endif
                    </tbody>
            </table>
        </div>

        @if(!isset($invoices))
            <div class="text-center text-2xl">
                <p>No transactions have been made &#128532;</p>
            </div>
        @endif
    </div>
@endsection
