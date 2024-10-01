<section class="max-w-xl mb-20 mt-12 mx-auto px-4 md:px-8">
    <div class="space-y-3 text-center">
        <svg xmlns="http://www.w3.org/2000/svg" class="h-14 w-14 mx-auto text-gray-300" fill="none" viewBox="0 0 24 24" stroke="currentColor">
            <path strokeLinecap="round" strokeLinejoin="round" stroke-width="2" d="M3 19v-8.93a2 2 0 01.89-1.664l7-4.666a2 2 0 012.22 0l7 4.666A2 2 0 0121 10.07V19M3 19a2 2 0 002 2h14a2 2 0 002-2M3 19l6.75-4.5M21 19l-6.75-4.5M3 10l6.75 4.5M21 10l-6.75 4.5m0 0l-1.14.76a2 2 0 01-2.22 0l-1.14-.76"></path>
        </svg>
        <h3 class="text-3xl text-gray-800 font-bold">
            {{ __('newsletter.subscribe') }}
        </h3>
        <p class="text-gray-400 leading-relaxed">
            {{ __('newsletter.description') }}
        </p>
    </div>
    <div class="mt-6">
        <form class="items-center justify-center sm:flex">
            <input
                type="email"
                required
                placeholder="{{ __('newsletter.enter email') }}"
                class="text-gray-500 w-full p-3 rounded-md border outline-none focus:border-blue-500"
            />
            <button
                @click.prevent="showSuccessAlert = true"
                class="w-full mt-3 px-5 py-3 rounded-md text-white bg-blue-600 hover:bg-blue-500 active:bg-blue-700 duration-150 outline-none shadow-md focus:shadow-none focus:ring-2 ring-offset-2 ring-blue-600 sm:mt-0 sm:ml-3 sm:w-auto"
            >
                {{ __('newsletter.subscribe button') }}
            </button>
        </form>
        <p class="mt-3 mx-auto text-center max-w-lg text-[15px] text-gray-400">
            {{ __('newsletter.privacy notice') }}
            <a class="text-blue-600 underline" href="#">{{ __('newsletter.privacy policy') }}</a>
        </p>
    </div>
</section>
