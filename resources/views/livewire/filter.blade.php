<div class="w-64 pr-3 border-r ">
    <div class="mb-2 text-xl font-bold">{{ __('filter.filters') }}</div>
    <div class="mb-3">
        <p class="font-medium">{{ __('filter.country') }}</p>
        @foreach ($this->countries as $country)
            <div class="flex items-center gap-2">
                <input wire:model='selectedCountries' class="rounded-md" type="checkbox" value="{{ $country->id }}">
                <label>{{ $country->name }}</label>
            </div>
        @endforeach
        <p class="mt-3 mb-1 font-medium leading-5">{{ __('filter.employment Type') }}</p>
        @foreach ($this->employmentTypes as $empType)
            <div class="flex items-center gap-2">
                <input wire:model='selectedEmploymentTypes' class="rounded-md" type="checkbox"
                    value="{{ $empType->id }}">
                <label>{{ $empType->name }}</label>
            </div>
        @endforeach
        <p class="mt-3 font-medium leading-5">{{ __('filter.city') }}</p>
        @foreach ($this->cities as $city)
            <div class="flex items-center gap-2">
                <input wire:model='selectedCities' class="rounded-md" type="checkbox" value="{{ $city->id }}">
                <label>{{ $city->name }}</label>
            </div>
        @endforeach
        <div x-data="{ showAll: false }">
            <p class="mt-3 mb-1 font-medium leading-5">{{ __('filter.position') }}</p>
            @foreach ($this->positions as $index => $position)
                <div x-show="{{ $index }} < 5 || showAll" class="flex items-center gap-2 mb-1">
                    <input wire:model='selectedPositions' class="rounded-md" type="checkbox"
                        value="{{ $position->id }}">
                    <label class="mb-1 leading-4 las:mb-0">{{ $position->name }}</label>
                </div>
            @endforeach

            <div x-show="!showAll">
                <button @click="showAll = true" class="text-blueColor opacity-70">{{ __('filter.show All') }}</button>
            </div>
            <div x-show="showAll">
                <button @click="showAll = false" class="opacity-70">{{ __('filter.hide') }}</button>
            </div>
        </div>
        <div>
            <p class="mt-3 mb-1 font-medium leading-5">{{ __('filter.salary') }}</p>
            <div class="flex flex-wrap items-center gap-2">
                <input id="minSalary" wire:model='minSalary' class="w-11/12 rounded-md" type="text" placeholder="min"
                    oninput="formatNumber(this)" onblur="validateNumber(this)">
                <input id="maxSalary" wire:model='maxSalary' class="w-11/12 rounded-md" type="text" placeholder="max"
                    oninput="formatNumber(this)" onblur="validateNumber(this)">
            </div>
        </div>

    </div>

    <button class="w-full px-4 py-2 text-white bg-blueColor rounded-xl active:bg-blue-700 hover:bg-blue-500"
        wire:click='updateFilter'>{{ __('filter.save') }}</button>
</div>

@push('num-formatter-script')
    <script>
        function formatNumber(input) {
            const value = input.value.replace(/\D/g, '');
            const formattedValue = new Intl.NumberFormat('ru-RU').format(value);
            input.value = formattedValue;
        }

        document.getElementById('minSalary').addEventListener('input', function(e) {
            formatNumber(e.target);
        });

        document.getElementById('maxSalary').addEventListener('input', function(e) {
            formatNumber(e.target);
        });

        function formatNumber(input) {
            const value = input.value.replace(/\D/g, '');
            input.value = value.replace(/\B(?=(\d{3})+(?!\d))/g, ' ');
        }

        function validateNumber(input) {
            const value = input.value.replace(/\s/g, '');
            if (isNaN(value)) {
                input.value = '';
            }
        }
    </script>
@endpush
