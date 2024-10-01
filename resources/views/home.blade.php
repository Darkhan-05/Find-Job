<x-app-layout title="Home Page">
    <div x-data class="overflow-hidden">

        <div x-data="{ showSuccessAlert: false }"
            @showalert.window="showSuccessAlert = true; setTimeout(() => showSuccessAlert = false, 3000)" role="alert"
            class="rounded-xl border-2 border-gray-300 bg-white fixed p-4 right-4 top-10 max-w-sm transform transition-all duration-500 ease-in-out"
            :class="showSuccessAlert ? 'opacity-100 translate-x-0' : 'opacity-0 translate-x-full'">
            <div class="flex items-start gap-4">
                <span class="text-green-600">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                        stroke="currentColor" class="size-6">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="M9 12.75L11.25 15 15 9.75M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                    </svg>
                </span>

                <div class="flex-1">
                    <strong class="block font-medium text-gray-900">{{ __('home.success') }}</strong>
                </div>

                <button class="text-gray-500 transition hover:text-gray-600 cursor-pointer"
                    @click="showSuccessAlert = false">
                    <span class="sr-only">Dismiss popup</span>

                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                        stroke="currentColor" class="size-6">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>
            </div>
        </div>


        <div class="py-3 md:py-5 px-8 lg:py-6 lg:px-12 lg:mb-12 gp-10 bg-greyIsh rounded-xl">

            <form action="{{ route('vacancy.index') }}" method="get">
                @include('searchbox')
            </form>
        </div>

        {{-- <div class="grid max-w-screen-xl grid-cols-1 gap-3 px-3 mx-auto mb-28 md:gap-6 md:grid-cols-3 lg:grid-cols-4">
            @for ($i = 0; $i < 12; $i++)
                <x-vacancies.vacancy-card />
            @endfor
        </div> --}}

        @include('features')
        @include('newsletter')
</x-app-layout>
