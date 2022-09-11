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
            <h1 class="font-bold text-white text-3xl">Edit Room</h1>
        </div>
        <div class="px-12 py-8 w-full">
            <div>
                <form class="space-y-6">
                    <div class="w-full flex space-x-6">
                        <div class="w-full flex flex-col space-y-10">
                            <div class="flex space-x-6">
                                @include('admin.components.form.select', [
                                    'items' => $types,
                                    'label' => 'Room Type',
                                    'placeholder' => 'Select room type',
                                    'name' => 'name'
                                ])
                                @include('admin.components.form.select', [
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
                                @include('admin.components.form.select', [
                                    'items' => $views,
                                    'label' => 'Room view',
                                    'placeholder' => 'Select room view'
                                ])
                            </div>
                            <div class="flex space-x-6">
                                @include('admin.components.form.input', [
                                    'label' => 'Price per Night',
                                    'placeholder' => 'Enter the price per night for the room',
                                    'name' => 'price',
                                    'type' => 'number'
                                ])
                                @include('admin.components.form.input', [
                                    'label' => 'Size of Room',
                                    'placeholder' => 'Enter the size of the room (m²)',
                                    'name' => 'price',
                                    'type' => 'number'
                                ])
                            </div>
                            <div class="flex space-x-6">
                                @include('admin.components.form.select', [
                                    'items' => $bedItems,
                                   'label' => 'Number of large beds',
                                   'placeholder' => 'Select number of large beds'
                                ])
                                @include('admin.components.form.select', [
                                    'items' => $bedItems,
                                   'label' => 'Number of double beds',
                                   'placeholder' => 'Select number of double beds'
                                ])
                                @include('admin.components.form.select', [
                                    'items' => $bedItems,
                                   'label' => 'Number of single beds',
                                   'placeholder' => 'Select number of single beds'
                                ])
                                @include('admin.components.form.select', [
                                    'items' => $bedItems,
                                   'label' => 'Number of sofa beds',
                                   'placeholder' => 'Select number of sofa beds'
                                ])
                            </div>
                        </div>
                    </div>

                    <div class="flex justify-end space-x-4">
                        <button class="py-3 px-6 rounded bg-orange-600 hover:bg-orange-800 transition text-white">Save as Draft</button>
                        <button class="py-3 px-6 rounded bg-blue-600 hover:bg-blue-800 transition text-white">Save Room</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
