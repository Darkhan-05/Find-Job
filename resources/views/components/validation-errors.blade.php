@if ($errors->any())
    <div {{ $attributes }}>
        <div class="font-medium text-red-600">{{ __('Whoops! Something went wrong.') }}</div>

        <div class="mt-3 text-sm text-red-600 list-disc list-inside">
            @foreach ($errors->all() as $error)
                <span>{{ $error }}</span>
            @endforeach
        </div>
    </div>
@endif
