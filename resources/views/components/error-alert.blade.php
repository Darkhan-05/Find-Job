<div x-data="{ show: false }" @showerror.window="show = true; setTimeout(() => show = false,3000)" role="alert"
    class="rounded border-s-4 border-red-500 bg-red-50 p-4 transform  transition-all duration-500 ease-in-out flex items-center justify-between"
    :class="show ? 'opacity-100 translate-x-0' : 'opacity-0 translate-x-full'">
    <strong class="block font-medium text-red-800"> {{ __('alert.error') }} </strong>
    <button class="text-gray-500 transition hover:text-gray-600 cursor-pointer" @click="show = false">
        <span class="sr-only">Dismiss popup</span>

        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
            stroke="currentColor" class="size-6">
            <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
        </svg>
    </button>
</div>
