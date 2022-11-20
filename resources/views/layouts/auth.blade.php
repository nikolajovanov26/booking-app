@extends('layouts.base')

@section('body')
    <div class="flex items-stretch w-full h-full min-h-screen">
        <div class="relative w-1/5 bg-gradient-to-r from-blue-grad-dark to-blue-grad-light pl-8 pr-4 py-16">
            <div class=" sticky top-16">
                <img class="h-14 w-14 pl-3" src="https://tailwindui.com/img/logos/mark.svg?color=white"
                     alt="Your Company">
                <div class="flex flex-col space-y-2 mt-6">
                    @if(isAdmin())
                        @include('admin.components.navigation.navigation-link', [
                            'route' => 'admin.dashboard',
                            'icon' => 'dashboard',
                            'label' => 'Dashboard'])
                        @include('admin.components.navigation.navigation-link', [
                            'route' => 'admin.bookings',
                            'icon' => 'booking',
                            'label' => 'Bookings'])
                        @include('admin.components.navigation.navigation-link', [
                            'route' => 'admin.countries',
                            'icon' => 'globe',
                            'label' => 'Countries'])
                        @include('admin.components.navigation.navigation-link', [
                            'route' => 'admin.features',
                            'icon' => 'features',
                            'label' => 'Features'])
                        @include('admin.components.navigation.navigation-link', [
                            'route' => 'admin.paymentMethods',
                            'icon' => 'cash',
                            'label' => 'Payment Methods'])

                        @include('admin.components.navigation.navigation-link', [
                            'route' => 'admin.properties.index',
                            'icon' => 'house',
                            'label' => 'Properties'])
                        @include('admin.components.navigation.navigation-link', [
                            'route' => 'admin.propertyTypes',
                            'icon' => 'features',
                            'label' => 'Property Types'])
                        @include('admin.components.navigation.navigation-link', [
                            'route' => 'admin.roomTypes',
                            'icon' => 'hotel',
                            'label' => 'Room Types'])
                        @include('admin.components.navigation.navigation-link', [
                            'route' => 'admin.roomViews',
                            'icon' => 'stars',
                            'label' => 'Room Views'])
                        @include('admin.components.navigation.navigation-link', [
                            'route' => 'admin.transactions',
                            'icon' => 'document',
                            'label' => 'Transactions'])
                        @include('admin.components.navigation.navigation-link', [
                            'route' => 'admin.users',
                            'icon' => 'users',
                            'label' => 'Users'])
                    @endif

                    @if(isOwner())
                        @include('dashboard.components.navigation.navigation-link', [
                            'route' => 'dashboard.index',
                            'icon' => 'dashboard',
                            'label' => 'Dashboard'])
                        @include('dashboard.components.navigation.navigation-link', [
                            'route' => 'dashboard.properties.index',
                            'icon' => 'house',
                            'label' => 'Properties'])
                        @include('dashboard.components.navigation.navigation-link', [
                            'route' => 'dashboard.transactions',
                            'icon' => 'document',
                            'label' => 'Transactions'])
                        @include('dashboard.components.navigation.navigation-link', [
                            'route' => 'dashboard.invoices.index',
                            'icon' => 'invoice',
                            'label' => 'Invoices'])
                        @include('dashboard.components.navigation.navigation-link', [
                            'route' => 'dashboard.notifications.index',
                            'icon' => 'bell',
                            'label' => 'Notifications'])
                    @endif
                </div>
                <div class="h-1 rounded w-10/12 bg-white bg-opacity-40 my-6"></div>
                <div class="flex flex-col space-y-2 mt-6">
                    @if(isAdmin())
                        @include('admin.components.navigation.navigation-link', [
                             'route' => 'admin.settings',
                             'icon' => 'settings',
                             'label' => 'Settings'])
                    @endif
                    @if(isOwner())
                        @include('dashboard.components.navigation.navigation-link', [
                            'route' => 'dashboard.settings',
                            'icon' => 'settings',
                            'label' => 'Settings'])
                    @endif
                    <a href="{{ route('home') }}"
                       class="py-2 px-3 flex items-center text-sm space-x-2 text-white opacity-70 hover:opacity-100 hover:-translate-x-2 transition">
                        <span>@include('icons.arrow-left-long', ['attributes' => 'w-6 h-6'])</span>
                        <span>Back Home</span>
                    </a>
                </div>
            </div>
        </div>
        <div class="w-4/5 bg-gray-100  min-h-screen">
            <nav class="bg-white shadow-lg sticky top-0 z-10">
                <div class="mx-auto px-8">
                    <div class="flex h-16 items-center justify-end">
                        <div class="block ml-4 flex items-center md:ml-6">
                            @if(isOwner())
                                <a href="{{ route('dashboard.invoices.index') }}" class="rounded px-3 py-1.5 border-green-800 border-2 bg-green-100 font-semibold hover:bg-green-800 hover:text-white transition cursor-pointer">Balance:
                                    @php
                                        Auth()->user()->createOrGetStripeCustomer();
                                        echo (Auth()->user()->balance())
                                    @endphp &euro;</a>
                            @endif
                            <div
                                x-data="{ profileDropdown: false }"
                                @click.outside="profileDropdown = false"
                                class="relative ml-3">
                                <div class="flex items-center space-x-4">
                                    <p>{{ Auth()->user()->profile->fullName() }}</p>
                                    <button
                                        @click="profileDropdown = !profileDropdown"
                                        type="button"
                                        class="flex max-w-xs items-center rounded-full bg-blue-800 text-sm focus:outline-none focus:ring-2 focus:ring-white focus:ring-offset-2 focus:ring-offset-blue-grad-dark"
                                        id="user-menu-button" aria-expanded="false" aria-haspopup="true">
                                        <span class="sr-only">Open user menu</span>
                                        <img class="h-8 w-8 rounded-full"
                                             src="{{
                                Storage::disk('profile_pictures')->url(
                                    Auth::user()->profile->profile_picture
                                    ? Auth::user()->id . DIRECTORY_SEPARATOR . Auth::user()->profile->profile_picture
                                    : 'avatar.png'
                                )}}" alt="">
                                    </button>
                                </div>

                                <div
                                    x-transition
                                    x-cloak
                                    x-show="profileDropdown"
                                    class="absolute right-0 z-10 mt-2 w-48 origin-top-right rounded-md bg-white py-1 shadow-lg ring-1 ring-black ring-opacity-5 focus:outline-none"
                                    role="menu" aria-orientation="vertical" aria-labelledby="user-menu-button"
                                    tabindex="-1">
                                    @include('components.navigation.dropdown-link', ['label' => 'Sign out', 'route' => 'logout'])
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </nav>

            <div class="p-10">
                @yield('content')

                @isset($slot)
                    {{ $slot }}
                @endisset
            </div>
        </div>
    </div>
@endsection
