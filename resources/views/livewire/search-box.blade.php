<div x-data
    class="flex flex-wrap items-center justify-between px-5 py-5 mb-5 bg-white rounded-lg shadow-lg lg:mb-12 lg:px-12 lg:py-6">
    <div class="flex items-center w-full gap-2 mb-3">
        <svg class="w-6 h-6 icon" data-slot="icon" fill="none" stroke-width="1.5" stroke="currentColor" viewBox="0 0 24 24"
            xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
            <path stroke-linecap="round" stroke-linejoin="round"
                d="m21 21-5.197-5.197m0 0A7.5 7.5 0 1 0 5.196 5.196a7.5 7.5 0 0 0 10.607 10.607Z">
            </path>
        </svg>
        <input placeholder="{{ __('searchbox.search') }}" class="w-full font-normal border-none rounded-lg"
            wire:model="search" type="text" @keydown.enter="$wire.update()" />
        <div wire:click="clearSearch">
            <svg class="w-6 mr-3 text-[#ccc] hover:text-[#c1c1c1] active:text-[#9a9a9a] icon" data-slot="icon"
                fill="none" stroke-width="1.5" stroke="currentColor" viewBox="0 0 24 24"
                xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
                <path stroke-linecap="round" stroke-linejoin="round"
                    d="m9.75 9.75 4.5 4.5m0-4.5-4.5 4.5M21 12a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z"></path>
            </svg>
        </div>
        <button wire:click="update"
            class="h-full px-6 py-3 text-white cursor-pointer md:py-5 md:px-10 bg-blueColor rounded-xl active:bg-blue-700 hover:bg-blue-500">
            {{ __('searchbox.search') }}
        </button>
    </div>
</div>
