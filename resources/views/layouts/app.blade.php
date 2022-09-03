@extends('layouts.base')

@section('body')

    <div class="min-h-full">
        <nav
            x-data="{ mobileNav: false }"
            class="bg-gray-800">
            <div class="mx-auto max-w-screen-2xl px-4 sm:px-6 lg:px-8">
                <div class="flex h-16 items-center justify-between">
                    <div class="flex items-center">
                        <div class="flex-shrink-0">
                            <img class="h-8 w-8" src="https://tailwindui.com/img/logos/mark.svg?color=indigo&shade=500"
                                 alt="Your Company">
                        </div>
                        <div class="hidden md:block">
                            <div class="ml-10 flex items-baseline space-x-4">
                                @include('components.navigation.link', ['label' => 'Dashboard', 'route' => 'home'])
                                @include('components.navigation.link', ['label' => 'Team', 'route' => '#'])
                                @include('components.navigation.link', ['label' => 'Projects', 'route' => '#'])
                                @include('components.navigation.link', ['label' => 'Calendar', 'route' => '#'])
                                @include('components.navigation.link', ['label' => 'Reports', 'route' => '#'])
                            </div>
                        </div>
                    </div>
                    <div class="hidden md:block">
                        <div class="ml-4 flex items-center md:ml-6">
                            @auth()
                                <button type="button"
                                        class="rounded-full bg-gray-800 p-1 text-gray-400 hover:text-white focus:outline-none focus:ring-2 focus:ring-white focus:ring-offset-2 focus:ring-offset-gray-800">
                                    <span class="sr-only">View notifications</span>
                                    @include('icons.bell', ['attributes' => 'h-6 w-6'])
                                </button>

                                <!-- Profile dropdown -->
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
                                        x-cloak
                                        x-show="profileDropdown"
                                        class="absolute right-0 z-10 mt-2 w-48 origin-top-right rounded-md bg-white py-1 shadow-lg ring-1 ring-black ring-opacity-5 focus:outline-none"
                                        role="menu" aria-orientation="vertical" aria-labelledby="user-menu-button"
                                        tabindex="-1">
                                        <!-- Active: "bg-gray-100", Not Active: "" -->
                                        @include('components.navigation.dropdown-link', ['label' => 'Your Profile', 'route' => 'home'])
                                        @include('components.navigation.dropdown-link', ['label' => 'Settings', 'route' => '#'])
                                        @include('components.navigation.dropdown-link', ['label' => 'Sign out', 'route' => '#'])
                                    </div>
                                </div>
                            @else
                                <div class="ml-10 flex items-baseline space-x-4">
                                    @if (Route::has('login'))
                                        @include('components.navigation.link', ['label' => 'Log in', 'route' => route('login')])
                                    @endif

                                    @if (Route::has('register'))
                                        @include('components.navigation.link', ['label' => 'Register', 'route' => route('register')])
                                    @endif
                                </div>
                            @endauth
                        </div>
                    </div>
                    <div class="-mr-2 flex md:hidden">
                        <!-- Mobile menu button -->
                        <button

                            type="button"
                            class="inline-flex items-center justify-center rounded-md bg-gray-800 p-2 text-gray-400 hover:bg-gray-700 hover:text-white focus:outline-none focus:ring-2 focus:ring-white focus:ring-offset-2 focus:ring-offset-gray-800"
                            aria-controls="mobile-menu" aria-expanded="false">
                            <span class="sr-only">Open main menu</span>
                            <div
                                x-show="! mobileNav"
                                @click="mobileNav = !mobileNav">
                                @include('icons.burger-menu', ['attributes' => 'h-6 w-6'])
                            </div>
                            <div
                                x-cloak
                                x-show="mobileNav"
                                @click="mobileNav = !mobileNav">
                                @include('icons.x-mark', ['attributes' => 'h-6 w-6'])
                            </div>
                        </button>
                    </div>
                </div>
            </div>

            <!-- Mobile menu, show/hide based on menu state. -->
            <div
                x-show="mobileNav"
                x-cloak
                class="md:hidden" id="mobile-menu">
                <div class="space-y-1 px-2 pt-2 pb-3 sm:px-3">
                    @include('components.navigation.mobile-link', ['label' => 'Dashboard', 'route' => 'home'])
                    @include('components.navigation.mobile-link', ['label' => 'Team', 'route' => '#'])
                    @include('components.navigation.mobile-link', ['label' => 'Projects', 'route' => '#'])
                    @include('components.navigation.mobile-link', ['label' => 'Calendar', 'route' => '#'])
                    @include('components.navigation.mobile-link', ['label' => 'Reports', 'route' => '#'])
                </div>
                <div class="border-t border-gray-700 pt-4 pb-3">
                    @auth()
                        <div class="flex items-center px-5">
                            <div class="flex-shrink-0">
                                <img class="h-10 w-10 rounded-full"
                                     src="https://images.unsplash.com/photo-1472099645785-5658abf4ff4e?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=facearea&facepad=2&w=256&h=256&q=80"
                                     alt="">
                            </div>
                            <div class="ml-3">
                                <div class="text-base font-medium leading-none text-white">Tom Cook</div>
                                <div class="text-sm font-medium leading-none text-gray-400">tom@example.com</div>
                            </div>
                            <button type="button"
                                    class="ml-auto flex-shrink-0 rounded-full bg-gray-800 p-1 text-gray-400 hover:text-white focus:outline-none focus:ring-2 focus:ring-white focus:ring-offset-2 focus:ring-offset-gray-800">
                                <span class="sr-only">View notifications</span>
                                <!-- Heroicon name: outline/bell -->
                                <svg class="h-6 w-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                     stroke-width="1.5" stroke="currentColor" aria-hidden="true">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                          d="M14.857 17.082a23.848 23.848 0 005.454-1.31A8.967 8.967 0 0118 9.75v-.7V9A6 6 0 006 9v.75a8.967 8.967 0 01-2.312 6.022c1.733.64 3.56 1.085 5.455 1.31m5.714 0a24.255 24.255 0 01-5.714 0m5.714 0a3 3 0 11-5.714 0"/>
                                </svg>
                            </button>
                        </div>
                        <div class="mt-3 space-y-1 px-2">
                            @include('components.navigation.dropdown-mobile-link', ['label' => 'Your Profile', 'route' => '#'])
                            @include('components.navigation.dropdown-mobile-link', ['label' => 'Settings', 'route' => '#'])
                            @include('components.navigation.dropdown-mobile-link', ['label' => 'Sign out', 'route' => '#'])
                        </div>
                    @else
                        <div class="space-y-1 px-2 pt-2 pb-3 sm:px-3">
                            @if (Route::has('login'))
                                @include('components.navigation.mobile-link', ['label' => 'Log in', 'route' => route('login')])
                            @endif
                            @if (Route::has('register'))
                                @include('components.navigation.mobile-link', ['label' => 'Register', 'route' => route('register')])
                            @endif
                        </div>
                    @endauth
                </div>
            </div>
        </nav>

        @yield('content')

    @isset($slot)
        {{ $slot }}
    @endisset
@endsection
