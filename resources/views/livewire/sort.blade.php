<div class="w-40 mb-4">
    <label class="block mb-2 text-lg font-medium text-gray-700">{{ __('sort.choose Filter') }}</label>
    <select wire:model.live="sortBy" wire:change="setSortBy"
        class="block p-2 border border-gray-300 rounded-md shadow-sm focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
        <option style="color: #4a5568; background-color: #ffffff;"  value="new">{{ __('sort.newest') }}</option>
        <option style="color: #4a5568; background-color: #ffffff;"  value="old">{{ __('sort.oldest') }}</option>
    </select>
</div>
