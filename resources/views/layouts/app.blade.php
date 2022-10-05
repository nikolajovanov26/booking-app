@extends('layouts.base')

@section('body')
    <div class="min-h-full">
        <nav class="bg-gray-800">
            <div class="mx-auto max-w-screen-2xl px-8">
                <div class="flex h-16 items-center justify-between">
                    <div class="flex items-center">
                        <div class="flex-shrink-0">
                            <img class="h-8 w-8" src="https://tailwindui.com/img/logos/mark.svg?color=indigo&shade=500"
                                 alt="Your Company">
                        </div>
                        <div class="hidden md:block">
                            <div class="ml-10 flex items-baseline space-x-4">
                                @if(isAdmin())
                                    @include('components.navigation.link', ['label' => 'Dashboard', 'route' => 'admin.dashboard'])
                                @elseif(isOwner())
                                    @include('components.navigation.link', ['label' => 'Dashboard', 'route' => 'dashboard.index'])
                                @endif
                                @include('components.navigation.link', ['label' => 'Home', 'route' => 'home'])
                                @include('components.navigation.link', ['label' => 'Trending', 'route' => 'properties.trending'])
                                @auth
                                    @include('components.navigation.link', ['label' => 'Favorite Properties', 'route' => 'favorite'])
                                    @include('components.navigation.link', ['label' => 'My Bookings', 'route' => 'bookings.index'])
                                @endauth
                            </div>
                        </div>
                    </div>
                    <div class="hidden md:block">
                        <div class="ml-4 flex items-center md:ml-6" x-data="{ profileDropdown: false, notificationsDropdown: false }">
                            @auth()
                                @if(isUser())
                                    @include('components.navigation.link', ['label' => 'Become a Property Owner', 'route' => 'becomeOwner'])
                                @endif
                                <div class="relative" @click.outside="notificationsDropdown = false">

                                    <button @click="notificationsDropdown = !notificationsDropdown"
                                            type="button"
                                            class="rounded-full bg-gray-800 p-1 text-gray-400 hover:text-white focus:outline-none focus:ring-2 focus:ring-white focus:ring-offset-2 focus:ring-offset-gray-800">
                                        @include('icons.bell', ['attributes' => 'h-6 w-6'])
                                    </button>

                                    <div>
                                        <div
                                            x-cloak
                                            x-transition.origin.top
                                            x-show="notificationsDropdown"
                                            class="z-10 flex flex-col absolute bg-white overflow-hidden -left-80 top-10 w-96 shadow-lg rounded-lg">
                                            @foreach(Auth::user()->unreadNotifications()->take(3)->get() as $notification)
                                                <div class="px-3 py-3 border-b-2 border-gray-100 hover:bg-blue-100 transition cursor-default">
                                                    <h3 class="font-semibold">{{ $notification->heading }}</h3>
                                                    <p class="line-clamp-2 text-sm">{{ $notification->content }}</p>
                                                </div>
                                            @endforeach
                                            @if(isUser())
                                                <a href="{{ route('notifications.index') }}"
                                                   class="px-3 py-2 text-center w-full bg-blue-700 hover:bg-blue-900 transition text-white"
                                                >View more</a>
                                            @else
                                                <a href="{{ route('dashboard.notifications.index') }}"
                                                   class="px-3 py-2 text-center w-full bg-blue-700 hover:bg-blue-900 transition text-white"
                                                >View more</a>
                                            @endif
                                        </div>
                                    </div>

                                </div>

                                <div

                                    @click.outside="profileDropdown = false"
                                    class="relative ml-3">
                                    <div>
                                        <button
                                            @click="profileDropdown = !profileDropdown"
                                            type="button"
                                            class="flex max-w-xs items-center rounded-full bg-gray-800 text-sm focus:outline-none focus:ring-2 focus:ring-white focus:ring-offset-2 focus:ring-offset-gray-800"
                                            id="user-menu-button" aria-expanded="false" aria-haspopup="true">
                                            <img class="h-8 w-8 rounded-full"
                                                 src="https://images.unsplash.com/photo-1472099645785-5658abf4ff4e?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=facearea&facepad=2&w=256&h=256&q=80"
                                                 alt="">
                                        </button>
                                    </div>

                                    <div
                                        x-cloak
                                        x-show="profileDropdown"
                                        x-transition
                                        class="absolute right-0 z-10 mt-2 w-48 origin-top-right rounded-md bg-white py-1 shadow-lg ring-1 ring-black ring-opacity-5 focus:outline-none"
                                        role="menu" aria-orientation="vertical" aria-labelledby="user-menu-button"
                                        tabindex="-1">
                                        @if(isAdmin())
                                            @include('components.navigation.dropdown-link', ['label' => 'Dashboard', 'route' => 'admin.dashboard'])
                                            @include('components.navigation.dropdown-link', ['label' => 'Settings', 'route' => 'admin.settings'])
                                        @elseif(isOwner())
                                            @include('components.navigation.dropdown-link', ['label' => 'Dashboard', 'route' => 'dashboard.index'])
                                            @include('components.navigation.dropdown-link', ['label' => 'Settings', 'route' => 'dashboard.settings'])
                                        @endif
                                        @include('components.navigation.dropdown-link', ['label' => 'Sign out', 'route' => 'logout'])
                                    </div>
                                </div>
                            @else
                                <div class="ml-10 flex items-baseline space-x-4">
                                    @if (Route::has('login'))
                                        @include('components.navigation.link', ['label' => 'Log in', 'route' => 'login'])
                                    @endif

                                    @if (Route::has('register'))
                                        @include('components.navigation.link', ['label' => 'Register', 'route' => 'register'])
                                    @endif
                                </div>
                            @endauth
                        </div>
                    </div>
                </div>
            </div>
        </nav>

    @yield('content')

    @isset($slot)
        {{ $slot }}
    @endisset
@endsection
