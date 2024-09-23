<header class="flex items-center justify-between h-20 max-w-screen-xl px-3 mx-auto lg:mb-16">
    <div>
        <a wire:navigate href="{{ route('home') }}">
            <h1 class="text-xl">
                <strong>Job</strong>Search
            </h1>
        </a>
    </div>
    <nav class="hidden md:block">
        <ul class="flex gap-8">
            <a wire:navigate href="{{ route('home') }}">
                <li class="text-[f6f6f6] hover:text-blueColor">{{ __('header.home') }}</li>
            </a>
            <a wire:navigate href="{{ route('home') }}">
                <li class="text-[f6f6f6] hover:text-blueColor">{{ __('header.about us') }}</li>
            </a>
            <a wire:navigate href="{{ route('home') }}">
                <li class="text-[f6f6f6] hover:text-blueColor">{{ __('header.document') }}</li>
            </a>
            <a wire:navigate href="{{ route('vacancy.index') }}">
                <li class="text-[f6f6f6] hover:text-blueColor">{{ __('header.vacancies') }}</li>
            </a>

        </ul>
    </nav>
    <div class="flex items-center gap-3">
        <form method="GET" action="{{ route('locale') }}">
            <select
                class="p-0 pl-1 text-gray-700 bg-white border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500"
                name="locale" onchange="this.form.submit()">
                @foreach (config('app.supported_locales') as $locale)
                    <option {{ session('locale') === $locale ? 'selected' : '' }} value="{{ $locale }}">
                        {{ $locale }}
                    </option>
                    {{-- {{app()->getLocale();}} --}}
                @endforeach
            </select>
        </form>
        @auth
            @include('layouts.partials.header-right-auth')
        @else
            @include('layouts.partials.header-right-guest')
        @endauth
    </div>

</header>
