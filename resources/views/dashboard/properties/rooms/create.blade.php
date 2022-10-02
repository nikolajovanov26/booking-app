@extends('layouts.auth')

@section('content')
    @php
        $bedItems = array(
            ['label' => '0'],
            ['label' => '1'],
            ['label' => '2'],
            ['label' => '3'],
            ['label' => '4'],
            ['label' => '5']
        );
    @endphp

    <div class="bg-white rounded-xl shadow-2xl">
        <div class="bg-gradient-to-r rounded-t-xl from-blue-grad-dark to-blue-grad-light px-12 py-6">
            <h1 class="font-bold text-white text-3xl">Create Room</h1>
        </div>
        <div class="px-12 py-8 w-full">
            <div>
                <form method="post" action="{{ route('dashboard.rooms.store', ['property' => $property]) }}"
                      class="space-y-6">
                    @csrf
                    <div class="w-full flex space-x-6">
                        <div class="w-full flex flex-col space-y-10">
                            <div class="flex space-x-6">
                                <div class="w-1/3">
                                    @include('dashboard.components.form.select', [
                                        'name' => 'room_type',
                                        'items' => $types,
                                        'label' => 'Room Type',
                                        'placeholder' => 'Select room type',
                                    ])
                                </div>
                                <div class="w-1/3">
                                    @include('dashboard.components.form.select', [
                                        'name' => 'number_of_persons',
                                        'items' => array(
                                            ['label' => '1'],
                                            ['label' => '2'],
                                            ['label' => '3'],
                                            ['label' => '4'],
                                            ['label' => '5'],
                                            ['label' => '6'],
                                            ['label' => '7'],
                                            ['label' => '8']
                                        ),
                                        'label' => 'Number of Persons',
                                        'placeholder' => 'Select select number of persons'
                                    ])
                                </div>
                                <div class="w-1/3">
                                    @include('dashboard.components.form.select', [
                                        'name' => 'room_view',
                                        'items' => $views,
                                        'label' => 'Room view',
                                        'placeholder' => 'Select room view'
                                    ])
                                </div>
                            </div>
                            <div class="flex space-x-6">
                                <div class="w-1/2">
                                    @include('dashboard.components.form.input', [
                                         'label' => 'Price per Night',
                                         'placeholder' => 'Enter the price per night for the room',
                                         'name' => 'price',
                                         'type' => 'number'
                                     ])
                                </div>
                                <div class="w-1/2">
                                    @include('dashboard.components.form.input', [
                                        'label' => 'Size of Room',
                                        'placeholder' => 'Enter the size of the room (m²)',
                                        'name' => 'size',
                                        'type' => 'number'
                                    ])
                                </div>
                            </div>
                            <div class="flex space-x-6">
                                <div class="w-1/4">
                                    @include('dashboard.components.form.select', [
                                        'name' => 'large_beds',
                                        'items' => $bedItems,
                                        'label' => 'Number of large beds',
                                        'placeholder' => '0'
                                    ])
                                </div>
                                <div class="w-1/4">
                                    @include('dashboard.components.form.select', [
                                        'name' => 'double_beds',
                                        'items' => $bedItems,
                                        'label' => 'Number of double beds',
                                        'placeholder' => '0'
                                    ])
                                </div>
                                <div class="w-1/4">
                                    @include('dashboard.components.form.select', [
                                        'name' => 'single_beds',
                                        'items' => $bedItems,
                                        'label' => 'Number of single beds',
                                        'placeholder' => '0'
                                    ])
                                </div>
                                <div class="w-1/4">
                                    @include('dashboard.components.form.select', [
                                        'name' => 'sofa_beds',
                                        'items' => $bedItems,
                                        'label' => 'Number of sofa beds',
                                        'placeholder' => '0'
                                    ])
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="flex justify-end space-x-4">
                        <button class="py-3 px-6 rounded bg-orange-600 hover:bg-orange-800 transition text-white"
                                name="action" value="draft">Save
                            as Draft
                        </button>
                        <button class="py-3 px-6 rounded bg-blue-600 hover:bg-blue-800 transition text-white"
                                name="action" value="save">Save
                            Room
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
