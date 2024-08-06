<div class="flex items-center gap-6">
    <a wire:navigate href="{{ route('login') }}"
        class="text-[f6f6f6] cursor-pointer hover:text-blueColor">{{ __('header.login') }}</a>
    <a wire:navigate href="{{ route('register') }}"
        class="px-8 py-4 text-white cursor-pointer rounded-xl bg-blueColor">{{ __('header.register') }}</a>
</div>
