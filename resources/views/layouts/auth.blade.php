@extends('layouts.base')

@section('body')
    <div class="flex w-full">
        <div class="w-1/5 bg-gradient-to-r from-blue-grad-dark to-blue-grad-light pl-8 pr-4 py-16">
            <img class="h-14 w-14 pl-3" src="https://tailwindui.com/img/logos/mark.svg?color=white"
                 alt="Your Company">
            <div class="flex flex-col space-y-2 mt-6">
                @include('admin.components.navigation.navigation-link', [
                    'route' => 'admin.dashboard.index',
                    'icon' => 'dashboard',
                    'label' => 'Dashboard'])
                @include('admin.components.navigation.navigation-link', [
                    'route' => '',
                    'icon' => 'house',
                    'label' => 'Properties'])
                @include('admin.components.navigation.navigation-link', [
                    'route' => '',
                    'icon' => 'calendar',
                    'label' => 'Calendar'])
                @include('admin.components.navigation.navigation-link', [
                    'route' => '',
                    'icon' => 'document',
                    'label' => 'Reports'])
                @include('admin.components.navigation.navigation-link', [
                    'route' => '',
                    'icon' => 'bell',
                    'label' => 'Notifications'])
            </div>
            <div class="h-1 rounded w-10/12 bg-white bg-opacity-40 my-6"></div>
            <div class="flex flex-col space-y-2 mt-6">
                <a href=""
                   class="flex items-center space-x-3 text-white text-xl w-full py-2 px-3 rounded hover:bg-white hover:bg-opacity-20 transition">
                    @include('icons.settings', ['attributes' => 'w-6 h-6'])
                    <span>Settings</span>
                </a>
                <a href=""
                   class="flex items-center space-x-3 text-white text-xl w-full py-2 px-3 rounded hover:bg-white hover:bg-opacity-20 transition">
                    @include('icons.heart', ['attributes' => 'w-6 h-6'])
                    <span>Favorites</span>
                </a>
                <a href="{{ route('home') }}"
                   class="py-2 px-3 flex items-center text-sm space-x-2 text-white opacity-70 hover:opacity-100 hover:-translate-x-2 transition">
                    <span>@include('icons.arrow-left-long', ['attributes' => 'w-6 h-6'])</span>
                    <span>Back to Home</span>
                </a>
            </div>
        </div>
        <div class="w-4/5 min-h-screen bg-gray-100">
            <nav class="bg-white shadow-lg">
                <div class="mx-auto px-8">
                    <div class="flex h-16 items-center justify-between">
                        <div></div>
                        <div class="block ml-4 flex items-center md:ml-6">
                            <div
                                x-data="{ profileDropdown: false }"
                                @click.outside="profileDropdown = false"
                                class="relative ml-3">
                                <div>
                                    <button
                                        @click="profileDropdown = !profileDropdown"
                                        type="button"
                                        class="flex max-w-xs items-center rounded-full bg-gray-800 text-sm focus:outline-none focus:ring-2 focus:ring-white focus:ring-offset-2 focus:ring-offset-gray-800"
                                        id="user-menu-button" aria-expanded="false" aria-haspopup="true">
                                        <span class="sr-only">Open user menu</span>
                                        <img class="h-8 w-8 rounded-full"
                                             src="https://images.unsplash.com/photo-1472099645785-5658abf4ff4e?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=facearea&facepad=2&w=256&h=256&q=80"
                                             alt="">
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
