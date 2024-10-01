{{-- <header class="flex items-center justify-between h-20 max-w-screen-xl px-3 mx-auto lg:mb-16">
    <div>
        <a wire:navigate href="{{ route('home') }}">
            <h1 class="text-lg md:text-xl">
                <strong>Job</strong>Search
            </h1>
        </a>
    </div>

    <div class="flex items-center gap-3">
        <form method="GET" action="{{ route('locale') }}">
            <select
                class="p-0 pl-1 text-gray-700 bg-white border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500"
                name="locale" onchange="this.form.submit()">
                @foreach (config('app.supported_locales') as $locale)
                    <option {{ session('locale') === $locale ? 'selected' : '' }} value="{{ $locale }}">
                        {{ $locale }}
                    </option>
                    {{app()->getLocale();}}
                @endforeach
            </select>
        </form>
        @auth
            @include('layouts.partials.header-right-auth')
        @else
            @include('layouts.partials.header-right-guest')
        @endauth
    </div>

</header> --}}


<!-- component -->

<header x-data="{ showBurger: false }">
    <nav class="relative flex items-center justify-between h-20 max-w-screen-xl px-3 mx-auto lg:mb-16">
        <a wire:navigate href="{{ route('home') }}" class="text-lg md:text-xl">
            <strong>Job</strong>Search
        </a>
        <nav class="hidden md:block">
            <ul class="flex gap-8">
                <a wire:navigate href="{{ route('home') }}">
                    <li class="text-[f6f6f6] line hover:text-blueColor">{{ __('header.home') }}</li>
                </a>
                <a wire:navigate href="{{ route('home') }}">
                    <li class="text-[f6f6f6] line hover:text-blueColor">{{ __('header.about us') }}</li>
                </a>
                <a wire:navigate href="{{ route('home') }}">
                    <li class="text-[f6f6f6] line hover:text-blueColor">{{ __('header.document') }}</li>
                </a>
                <a wire:navigate href="{{ route('vacancy.index') }}">
                    <li class="text-[f6f6f6] line hover:text-blueColor">{{ __('header.vacancies') }}</li>
                </a>
            </ul>
        </nav>
        <div class="flex items-center gap-3">
            <form class="block md:hidden" method="GET" action="{{ route('locale') }}">
                <select
                    class="p-0 pl-1 text-gray-700 bg-white border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500"
                    name="locale" onchange="this.form.submit()">
                    @foreach (config('app.supported_locales') as $locale)
                        <option {{ session('locale') === $locale ? 'selected' : '' }} value="{{ $locale }}">
                            {{ $locale }}
                        </option>
                        {{ app()->getLocale() }}
                    @endforeach
                </select>
            </form>
            <div @click="showBurger = true" class="md:hidden">
                <button class="flex items-center text-blue-600 p-3">
                    <svg class="block h-4 w-4 fill-current" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                        <title>Mobile menu</title>
                        <path d="M0 3h20v2H0V3zm0 6h20v2H0V9zm0 6h20v2H0v-2z"></path>
                    </svg>
                </button>
            </div>
        </div>

        <div class="hidden md:flex md:items-center md:gap-3">
            <form method="GET" action="{{ route('locale') }}">
                <select
                    class="p-0 pl-1 text-gray-700 bg-white border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500"
                    name="locale" onchange="this.form.submit()">
                    @foreach (config('app.supported_locales') as $locale)
                        <option {{ session('locale') === $locale ? 'selected' : '' }} value="{{ $locale }}">
                            {{ $locale }}
                        </option>
                        {{ app()->getLocale() }}
                    @endforeach
                </select>
            </form>
            @auth
                @include('layouts.partials.header-right-auth')
            @else
                @include('layouts.partials.header-right-guest')
            @endauth
        </div>
    </nav>
    <div :class="showBurger ? 'block' : 'hidden'" class="relative z-40">
        <div @click.self="showBurger = false" class=" fixed inset-0 bg-gray-800 opacity-25"></div>
        <nav
            class="fixed top-0 right-0 bottom-0 flex flex-col w-5/6 max-w-sm py-6 px-6 bg-white border-r overflow-y-auto">
            <div class="flex items-center mb-8">
                @auth
                    <div class="relative flex ml-8 mr-auto space-x-4 z-50">
                        {{-- @can('view-admin', App\Models\User::class)
                        <x-nav-link :navigate='false' href="{{ route('filament.admin.auth.login') }}" :active="request()->routeIs('filament.admin.auth.login')">
                            {{ __('header.admin') }}
                        </x-nav-link>
                    @endcan --}}
                        <x-dropdown align="right" width="32">
                            <x-slot name="trigger">
                                @if (Laravel\Jetstream\Jetstream::managesProfilePhotos())
                                    <button
                                        class="flex text-sm transition border-2 border-transparent rounded-full focus:outline-none focus:border-gray-300">
                                        <img class="object-cover w-12 h-12 rounded-full"
                                            src="{{ Auth::user()->profile_photo_url }}" alt="{{ Auth::user()->name }}" />
                                    </button>
                                @else
                                    <span class="inline-flex rounded-md">
                                        <button type="button"
                                            class="inline-flex items-center px-3 py-2 text-sm font-medium leading-4 text-gray-500 transition duration-150 ease-in-out bg-white border border-transparent rounded-md hover:text-gray-700 focus:outline-none focus:bg-gray-50 active:bg-gray-50">
                                            {{ Auth::user()->name }}

                                            <svg class="ml-2 -mr-0.5 h-4 w-4" xmlns="http://www.w3.org/2000/svg"
                                                fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round"
                                                    d="M19.5 8.25l-7.5 7.5-7.5-7.5" />
                                            </svg>
                                        </button>
                                    </span>
                                @endif
                            </x-slot>

                            <x-slot name="content">
                                <!-- Account Management -->
                                <div class="text-end px-2 py-1 text-xs text-gray-400">
                                    {{ __('header.edit') }}
                                </div>

                                <x-dropdown-link wire:navigate href="{{ route('profile.show') }}">
                                    {{ __('header.profile') }}
                                </x-dropdown-link>

                                <div class="border-t border-gray-200"></div>
                                <!-- Authentication -->
                                <form method="POST" action="{{ route('logout') }}" x-data>
                                    @csrf

                                    <x-dropdown-link href="{{ route('logout') }}" @click.prevent="$root.submit();">
                                        {{ __('header.logout') }}
                                    </x-dropdown-link>
                                </form>
                            </x-slot>
                        </x-dropdown>
                    </div>
                @else
                    <a class="mr-auto text-xl font-bold leading-none" href="{{ route('home') }}">
                        <strong>Job</strong>Search
                    </a>
                @endauth
                <button @click="showBurger = false">
                    <svg class="h-6 w-6 text-gray-400 cursor-pointer hover:text-gray-500"
                        xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12">
                        </path>
                    </svg>
                </button>
            </div>
            <div>
                <ul>
                    <li class="mb-1 line">
                        <a class="block p-4 text-sm font-semibold text-gray-400 hover:bg-blue-50 hover:text-blue-600 rounded"
                            href="#">Home</a>
                    </li>
                    <li class="mb-1 line">
                        <a class="block p-4 text-sm font-semibold text-gray-400 hover:bg-blue-50 hover:text-blue-600 rounded"
                            href="#">About Us</a>
                    </li>
                    <li class="mb-1 line">
                        <a class="block p-4 text-sm font-semibold text-gray-400 hover:bg-blue-50 hover:text-blue-600 rounded"
                            href="#">Services</a>
                    </li>
                    <li class="mb-1 line">
                        <a class="block p-4 text-sm font-semibold text-gray-400 hover:bg-blue-50 hover:text-blue-600 rounded"
                            href="#">Pricing</a>
                    </li>
                    <li class="mb-1 line">
                        <a class="block p-4 text-sm font-semibold text-gray-400 hover:bg-blue-50 hover:text-blue-600 rounded"
                            href="#">Contact</a>
                    </li>
                </ul>
            </div>
            @guest
                <div class="mt-auto">
                    <div class="pt-6">
                        <a class="block px-4 py-3 mb-3 leading-loose text-xs text-center font-semibold bg-gray-50 hover:bg-gray-100 rounded-xl"
                            href="#">{{ __('header.login') }}</a>
                        <a class="block px-4 py-3 mb-2 leading-loose text-xs text-center text-white font-semibold bg-blue-600 hover:bg-blue-700  rounded-xl"
                            href="#">{{ __('header.register') }}</a>
                    </div>
                </div>
            @endguest

        </nav>
    </div>
</header>
