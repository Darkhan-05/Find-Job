<x-app-layout title="Home Page">
    <div class="overflow-hidden">
        <div class="py-6 lg:p-12 lg:mb-12 gp-10 bg-greyIsh rounded-xl">
            {{-- <livewire:search-box :link='true' /> --}}

            <form action="{{ route('vacancy.index') }}" method="get">
                @include('searchbox')
            </form>
        </div>

        {{-- <div class="grid max-w-screen-xl grid-cols-1 gap-3 px-3 mx-auto mb-28 md:gap-6 md:grid-cols-3 lg:grid-cols-4">
            @for ($i = 0; $i < 12; $i++)
                <x-vacancies.vacancy-card />
            @endfor
        </div> --}}

        <div class="px-2 mx-auto mb-8 md:mb-20 lg:mb-28 max-w-screen-2xl">
            <h1 class="w-[400px] mb-8 text-xl font-bold text-textColor">
                {{ __('home.the value that holds us true and to account') }}
            </h1>
            <div class="grid items-center grid-cols-1 mb-4 lg:grid-cols-3 md:gap-40 md:grid-cols-2">
                @for ($i = 0; $i < 3; $i++)
                    <x-company-card />
                @endfor
            </div>
        </div>
</x-app-layout>
