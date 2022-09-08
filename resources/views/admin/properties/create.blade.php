@extends('layouts.auth')

@section('content')
    <div class="bg-white rounded-xl shadow-2xl">
        <div class="bg-gradient-to-r rounded-t-xl from-blue-grad-dark to-blue-grad-light px-12 py-6">
            <h1 class="font-bold text-white text-3xl">Create Property</h1>
        </div>
        <div class="px-12 py-8 w-full">
            <div>
                <form class="space-y-6">
                    <div class="w-full flex space-x-6">
                        <div class="w-2/3 flex flex-col space-y-10">
                            <div class="flex space-x-6">
                                @include('admin.components.form.input', [
                                    'label' => 'Property Title',
                                    'placeholder' => 'Enter the name of your property',
                                    'name' => 'name'
                                ])
                                @include('admin.components.form.input', [
                                   'label' => 'Slug',
                                   'placeholder' => 'Enter slug for your property',
                                   'name' => 'slug'
                               ])
                            </div>
                            <div class="flex space-x-6">
                                @include('admin.components.form.select', [
                                   'label' => 'Property Type',
                                   'placeholder' => 'Select property type'
                                ])
                                @include('admin.components.form.select', [
                                    'label' => 'Number of stars the property has',
                                    'placeholder' => 'Select number of stars'
                                ])
                            </div>
                            <div class="flex space-x-6">
                                @include('admin.components.form.input', [
                                    'label' => 'E-Mail',
                                    'placeholder' => 'Enter the contact e-mail of your property',
                                    'name' => 'email',
                                    'type' => 'email'
                                ])
                                @include('admin.components.form.input', [
                                   'label' => 'Phone Number',
                                   'placeholder' => 'Enter the contact phone for your property',
                                   'name' => 'phone'
                               ])
                            </div>
                        </div>
                        <div class="w-1/3 flex space-x-6">
                            <div class="h-full w-full flex items-center justify-center rounded-xl border-dashed border-2">
                                Upload main image
                            </div>
                        </div>
                    </div>
                    <div class="w-full flex space-x-6">
                        <div class="w-5/12">
                            @include('admin.components.form.input', [
                                    'label' => 'Street Address',
                                    'placeholder' => 'Enter the street address of your property',
                                    'name' => 'address'
                                ])
                        </div>
                        <div class="w-3/12">
                            @include('admin.components.form.input', [
                                    'label' => 'City',
                                    'placeholder' => 'Enter the city of your property',
                                    'name' => 'city'
                                ])
                        </div>
                        <div class="w-1/12">
                            @include('admin.components.form.input', [
                                    'label' => 'Zip Code',
                                    'placeholder' => 'Zip Code',
                                    'name' => 'zip'
                                ])
                        </div>
                        <div class="w-3/12">
                            @include('admin.components.form.select', [
                                    'label' => 'Country',
                                    'placeholder' => 'Select country'
                                ])
                        </div>
                    </div>
                    <div class="w-full flex space-x-6">
                        @include('admin.components.form.textarea', [
                            'label' => 'Description',
                            'placeholder' => 'Describe your property',
                            'name' => 'description',
                            'rows' => 6
                        ])
                    </div>
                    <div class="w-full flex space-x-6">
                        <div class="w-1/2">
                            @include('admin.components.form.checkbox', [
                                'label' => 'Payment Methods'
                            ])
                        </div>
                        <div class="w-1/2">
                            @include('admin.components.form.checkbox', [
                                'label' => 'Features in the Property'
                            ])
                        </div>
                    </div>
                    <div class="w-full flex space-x-6">
                        <div class="w-1/2">
                            @include('admin.components.form.textarea', [
                                'label' => 'Rules in the property',
                                'placeholder' => 'Describe your rules',
                                'name' => 'rules',
                                'rows' => 5
                            ])
                        </div>
                        <div class="w-1/2">
                            @include('admin.components.form.textarea', [
                                'label' => 'Cancellation Policy',
                                'placeholder' => 'Describe your cancellation policy',
                                'name' => 'cancellation_policy',
                                'rows' => 5
                            ])
                        </div>
                    </div>
                    <div class="w-full flex space-x-6">
                        <div class="h-52 w-full flex items-center justify-center rounded-xl border-dashed border-2">
                            Upload more images
                        </div>
                    </div>
                    <div class="flex justify-end space-x-4">
                        <button class="py-3 px-6 rounded bg-orange-600 hover:bg-orange-800 transition text-white">Save as Draft</button>
                        <button class="py-3 px-6 rounded bg-blue-600 hover:bg-blue-800 transition text-white">Create Property</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
