<div>
    <div
        class="flex flex-wrap items-center justify-between px-5 py-5 mb-5 bg-white rounded-lg shadow-lg lg:mb-12 lg:px-12 lg:py-6">
        <div class="flex items-center w-full gap-2 mb-3">
            <svg class="w-6 h-6 icon" data-slot="icon" fill="none" stroke-width="1.5" stroke="currentColor"
                viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
                <path stroke-linecap="round" stroke-linejoin="round"
                    d="m21 21-5.197-5.197m0 0A7.5 7.5 0 1 0 5.196 5.196a7.5 7.5 0 0 0 10.607 10.607Z">
                </path>
            </svg>
            <input name="search" placeholder="{{ __('searchbox.search') }}" class="w-full font-normal border-none rounded-lg"
                type="text" />
            <button
                class="h-full px-6 py-3 md:py-5 md:px-10 text-white cursor-pointer  bg-blueColor rounded-xl active:bg-blue-700 hover:bg-blue-500">
                {{ __('searchbox.search') }}
            </button>
        </div>
    </div>
</div>
