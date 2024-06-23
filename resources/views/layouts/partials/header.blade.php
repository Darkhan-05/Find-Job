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
            <a wire:navigate href="{{ route('home') }}"><li class="text-[f6f6f6] hover:text-blueColor">Home</li></a>
            <a wire:navigate href="{{ route('home') }}"><li class="text-[f6f6f6] hover:text-blueColor">About us</li></a>
            <a wire:navigate href="{{ route('home') }}"><li class="text-[f6f6f6] hover:text-blueColor">Document</li></a>
            <a wire:navigate href="{{ route('home') }}"><li class="text-[f6f6f6] hover:text-blueColor">asdf;aksjdf</li></a>
        </ul>
    </nav>
    <div>
        @auth
            @include('layouts.partials.header-right-auth')
        @else
            @include('layouts.partials.header-right-guest')
        @endauth
    </div>

</header>
