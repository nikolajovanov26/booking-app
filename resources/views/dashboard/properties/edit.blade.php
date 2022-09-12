@extends('layouts.auth')

@section('content')
    <div class="bg-white rounded-xl shadow-2xl">
        <div class="bg-gradient-to-r rounded-t-xl from-blue-grad-dark to-blue-grad-light px-12 py-6">
            <h1 class="font-bold text-white text-3xl">Edit '{{ ucwords($property->name) }}'</h1>
        </div>
        <div class="px-12 py-8 w-full">
            <div>
                <form class="space-y-6">
                    <div class="w-full flex space-x-6">
                        <div class="w-2/3 flex flex-col space-y-10">
                            <div class="flex space-x-6">
                                @include('dashboard.components.form.input', [
                                    'value' => ucwords($property->name),
                                    'label' => 'Property Name',
                                    'placeholder' => 'Enter the name of your property',
                                    'name' => 'name'
                                ])
                                @include('dashboard.components.form.input', [
                                    'value' => $property->slug,
                                   'label' => 'Slug',
                                   'placeholder' => 'Enter slug for your property',
                                   'name' => 'slug'
                               ])
                            </div>
                            <div class="flex space-x-6">
                                @include('dashboard.components.form.select', [
                                   'current' => $property->type->label,
                                   'items' => $types,
                                   'label' => 'Property Type',
                                   'placeholder' => 'Select property type'
                                ])
                                @include('dashboard.components.form.select', [
                                    'current' => $property->stars,
                                    'items' => array(
                                        ['label' => '0'],
                                        ['label' => '1'],
                                        ['label' => '2'],
                                        ['label' => '3'],
                                        ['label' => '4'],
                                        ['label' => '5']
                                    ),
                                    'label' => 'Number of stars the property has',
                                    'placeholder' => 'Select number of stars'
                                ])
                            </div>
                            <div class="flex space-x-6">
                                @include('dashboard.components.form.input', [
                                    'value' => $property->email,
                                    'label' => 'E-Mail',
                                    'placeholder' => 'Enter the contact e-mail of your property',
                                    'name' => 'email',
                                    'type' => 'email'
                                ])
                                @include('dashboard.components.form.input', [
                                    'value' => $property->phone_number,
                                    'label' => 'Phone Number',
                                    'placeholder' => 'Enter the contact phone for your property',
                                    'name' => 'phone'
                               ])
                            </div>
                        </div>
                        <div class="w-1/3 flex space-x-6">
                            <div
                                class="h-full w-full flex items-center justify-center rounded-xl border-dashed border-2">
                                Upload main image
                            </div>
                        </div>
                    </div>
                    <div class="w-full flex space-x-6">
                        <div class="w-5/12">
                            @include('dashboard.components.form.input', [
                                'value' => $property->address,
                                'label' => 'Street Address',
                                'placeholder' => 'Enter the street address of your property',
                                'name' => 'address'
                            ])
                        </div>
                        <div class="w-3/12">
                            @include('dashboard.components.form.input', [
                                'value' => $property->city,
                                'label' => 'City',
                                'placeholder' => 'Enter the city of your property',
                                'name' => 'city'
                            ])
                        </div>
                        <div class="w-1/12">
                            @include('dashboard.components.form.input', [
                                'value' => $property->zip_code,
                                'label' => 'Zip Code',
                                'placeholder' => 'Zip Code',
                                'name' => 'zip'
                            ])
                        </div>
                        <div class="w-3/12">
                            @include('dashboard.components.form.select', [
                                'current' => $property->country->label,
                                'items' => $countries,
                                'label' => 'Country',
                                'placeholder' => 'Select country'
                            ])
                        </div>
                    </div>
                    <div class="w-full flex space-x-6">
                        @include('dashboard.components.form.textarea', [
                            'value' => $property->description,
                            'label' => 'Description',
                            'placeholder' => 'Describe your property',
                            'name' => 'description',
                            'rows' => 6
                        ])
                    </div>
                    <div class="w-full flex space-x-6">
                        @include('dashboard.components.form.input', [
                            'value' => $property->check_in_from,
                            'label' => 'Check-In From',
                            'placeholder' => 'Check-In From',
                            'name' => 'check_in_from',
                            'type' => 'time'
                        ])
                        @include('dashboard.components.form.input', [
                            'value' => $property->check_in_to,
                            'label' => 'Check-In To',
                            'placeholder' => 'Check-In To',
                            'name' => 'check_in_to',
                            'type' => 'time'
                        ])
                        @include('dashboard.components.form.input', [
                            'value' => $property->check_out_from,
                            'label' => 'Check-Out From',
                            'placeholder' => 'Check-Out From',
                            'name' => 'check_out_from',
                            'type' => 'time'
                        ])
                        @include('dashboard.components.form.input', [
                            'value' => $property->check_out_to,
                            'label' => 'Check-Out To',
                            'placeholder' => 'Check-Out To',
                            'name' => 'check_out_to',
                            'type' => 'time'
                        ])
                    </div>
                    <div class="w-full flex items-start space-x-6">
                        @include('dashboard.components.form.checkbox', [
                            'name' => 'features',
                            'property' => $property,
                            'items' => $features,
                            'label' => 'Features in the Property'
                        ])
                        @include('dashboard.components.form.checkbox', [
                            'name' => 'paymentMethods',
                            'property' => $property,
                            'items' => $payment_methods,
                            'label' => 'Payment Methods'
                        ])
                        @include('dashboard.components.form.checkbox', [
                            'name' => 'pets',
                            'value' => $property->pets_allowed,
                            'items' => array(
                                ['label' => 'Accept pets',
                                'explanation' => 'Pets are allowed inside the property'],
                            ),
                            'label' => 'Pet Friendly'
                        ])
                    </div>
                    <div class="w-full flex space-x-6">
                        @include('dashboard.components.form.textarea', [
                            'value' => $property->cancellation_policy,
                            'label' => 'Cancellation Policy',
                            'placeholder' => 'Describe your cancellation policy',
                            'name' => 'cancellation_policy',
                            'rows' => 4
                        ])
                    </div>
                    <div class="w-full flex space-x-6">
                        <div class="h-52 w-full flex items-center justify-center rounded-xl border-dashed border-2">
                            Upload more images
                        </div>
                    </div>
                    <div class="flex justify-end space-x-4">
                        <button class="py-3 px-6 rounded bg-orange-600 hover:bg-orange-800 transition text-white">Save
                            as Draft
                        </button>
                        <button class="py-3 px-6 rounded bg-blue-600 hover:bg-blue-800 transition text-white">Save
                            Property
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
