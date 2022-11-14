<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="h-full bg-gray-100 scroll-smooth">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <title>Check Out</title>

    <!-- Favicon -->
    <link rel="shortcut icon" href="{{ url(asset('favicon.ico')) }}">

    <!-- Fonts -->
    <link rel="stylesheet" href="https://rsms.me/inter/inter.css">

    @vite(['resources/sass/app.scss', 'resources/js/app.js'])

    <meta name="csrf-token" content="{{ csrf_token() }}">

</head>

<body class="min-h-screen">
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
                                             src="{{
                                Storage::disk('profile_pictures')->url(
                                    Auth::user()->profile->profile_picture
                                    ? Auth::user()->id . DIRECTORY_SEPARATOR . Auth::user()->profile->profile_picture
                                    : 'avatar.png'
                                )}}" alt="">
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

<div class="flex items-center justify-center">
    <div class="w-1/4 flex items-center justify-center bg-white mt-24 px-12 py-8 shadow-2xl">
        <form action="{{route('processStripePayment', [$id])}}" method="POST" id="subscribe-form" class="w-full">
            <label for="card-holder-name">Card Holder Name</label>
            <input id="card-holder-name" type="text" value="" class="border-gray-200 rounded ml-3">
            @csrf
            <div class="form-row">
                <label for="card-element" class="block my-4">Credit or debit card</label>
                <div id="card-element" class="form-control"></div>
                <div id="card-errors" class="w-full" role="alert"></div>
            </div>
            <div class="stripe-errors"></div>
            @if (count($errors) > 0)
                <div class="alert alert-danger">
                    @foreach ($errors->all() as $error)
                        {{ $error }}<br>
                    @endforeach
                </div>
            @endif
            <div class="form-group text-center mt-6 block">
                <button data-secret="{{ $intent->client_secret }}" id="card-button"
                        type="button"
                        class="h-12 w-full bg-gray-800 text-lg font-semibold text-white hover:bg-blue-grad-dark">Submit
                </button>
            </div>
        </form>
    </div>
</div>

<script src="https://js.stripe.com/v3/"></script>
<script>
    var stripe = Stripe('{{ env('STRIPE_KEY') }}');
    var elements = stripe.elements();
    var style = {
        base: {
            color: '#32325d',
            fontFamily: '"Helvetica Neue", Helvetica, sans-serif',
            fontSmoothing: 'antialiased',
            fontSize: '16px',
            '::placeholder': {
                color: '#aab7c4'
            }
        },
        invalid: {
            color: '#fa755a',
            iconColor: '#fa755a'
        }
    };
    var card = elements.create('card', {hidePostalCode: true, style: style});
    card.mount('#card-element');
    console.log(document.getElementById('card-element'));
    card.addEventListener('change', function (event) {
        var displayError = document.getElementById('card-errors');
        if (event.error) {
            displayError.textContent = event.error.message;
        } else {
            displayError.textContent = '';
        }
    });
    const cardHolderName = document.getElementById('card-holder-name');
    const cardButton = document.getElementById('card-button');
    const clientSecret = cardButton.dataset.secret;
    cardButton.addEventListener('click', async (e) => {
        console.log("attempting");
        const {setupIntent, error} = await stripe.confirmCardSetup(
            clientSecret, {
                payment_method: {
                    card: card,
                    billing_details: {name: cardHolderName.value}
                }
            }
        );
        if (error) {
            var errorElement = document.getElementById('card-errors');
            errorElement.textContent = error.message;
        } else {
            paymentMethodHandler(setupIntent.payment_method);
        }
    });

    function paymentMethodHandler(payment_method) {
        var form = document.getElementById('subscribe-form');
        var hiddenInput = document.createElement('input');
        hiddenInput.setAttribute('type', 'hidden');
        hiddenInput.setAttribute('name', 'payment_method');
        hiddenInput.setAttribute('value', payment_method);
        form.appendChild(hiddenInput);
        form.submit();
    }
</script>
</body>
</html>
