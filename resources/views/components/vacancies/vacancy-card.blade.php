@props(['vacancy', 'resumes', 'appliedvacancies'])

@php
    $alreadyApplied = false;
@endphp

@foreach ($appliedvacancies as $appliedVacancy)
    @if ($appliedVacancy->vacancy_id === $vacancy->id)
        @php
            $alreadyApplied = true;
            break;
        @endphp
    @endif
@endforeach




<div
    class="w-full p-5 mb-2 duration-500 bg-white shadow-md grid-item group group/item rounded-xl hover:bg-blueColor shadow-greyIsh-400 hover:shadow-xl">
    <div class="flex items-center justify-between gap-4">
        <h1 class="text-lg font-semibold text-textColor group-hover:text-white">{{ $vacancy->name }}</h1>
        <span class="flex items-center text-md text-textColor group-hover:text-white">
            <svg data-slot="icon" class="w-5 h-5 mr-2" fill="none" stroke-width="1.5" stroke="currentColor"
                viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
                <path stroke-linecap="round" stroke-linejoin="round"
                    d="M12 6v6h4.5m4.5 0a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z"></path>
            </svg>
            {{ $vacancy->created_at->diffForHumans() }}
        </span>
    </div>
    @if (isset($vacancy->salary))
        <p class="text-lg font-semibold text-textColor group-hover:text-white">{{ number_format($vacancy->salary, 2) }}
            ₸
        </p>
    @endif
    <h6 class="text-[#ccc]">{{ $vacancy->country->name }}</h6>
    <p class="text-[#959595] mb-3 group-hover:text-white pt-5 border-t-2 mt-5">{{ $vacancy->responsibility }}</p>
    <a href="company-1" class="flex items-center gap-3 mb-4 group-hover:text-white">
        <h5>{{ $vacancy->company->name }}</h5>
    </a>
    <div x-data="{ showModal: false }">
        @if (Auth::check())
            @if ($alreadyApplied)
                <div class="flex items-center gap-3 mb-4 text-textColor group-hover:text-white">
                    <svg class="w-6 h-6" data-slot="icon" fill="none" stroke-width="1.5" stroke="currentColor"
                        viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="M6.633 10.25c.806 0 1.533-.446 2.031-1.08a9.041 9.041 0 0 1 2.861-2.4c.723-.384 1.35-.956 1.653-1.715a4.498 4.498 0 0 0 .322-1.672V2.75a.75.75 0 0 1 .75-.75 2.25 2.25 0 0 1 2.25 2.25c0 1.152-.26 2.243-.723 3.218-.266.558.107 1.282.725 1.282m0 0h3.126c1.026 0 1.945.694 2.054 1.715.045.422.068.85.068 1.285a11.95 11.95 0 0 1-2.649 7.521c-.388.482-.987.729-1.605.729H13.48c-.483 0-.964-.078-1.423-.23l-3.114-1.04a4.501 4.501 0 0 0-1.423-.23H5.904m10.598-9.75H14.25M5.904 18.5c.083.205.173.405.27.602.197.4-.078.898-.523.898h-.908c-.889 0-1.713-.518-1.972-1.368a12 12 0 0 1-.521-3.507c0-1.553.295-3.036.831-4.398C3.387 9.953 4.167 9.5 5 9.5h1.053c.472 0 .745.556.5.96a8.958 8.958 0 0 0-1.302 4.665c0 1.194.232 2.333.654 3.375Z">
                        </path>
                    </svg>
                    <button>
                        {{ __('vacancies.already Applied') }}
                    </button>
                </div>
            @else
                <a @click="showModal = true"
                    class="px-8 py-3 transition-all duration-200 bg-white border cursor-pointer hover:bg-gray-100 text-textColor rounded-xl active:bg-gray-300">
                    {{ __('vacancies.apply Now') }}
                </a>
            @endif
        @else
            <a href="{{ route('register') }}"
                class="px-8 py-3 transition-all duration-200 bg-white border cursor-pointer hover:bg-gray-100 text-textColor rounded-xl active:bg-gray-300">
                {{ __('vacancies.apply Now') }}
            </a>
        @endif
        <div x-show="showModal" @close-modal.window="showModal = false"
            x-transition.duration.300ms class="w-full h-full fixed inset-0 z-50 flex items-center justify-center"
            style="background: rgba(230, 230, 250, 0.6);" @click.self="showModal = false">
            <div class="px-12 pt-10 pb-8 bg-white rounded-lg shadow-lg relative" @click.stop>
                <button @click="showModal = false"
                    class="a cursor-pointer absolute top-4 right-4 text-gray-500 hover:text-gray-700">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor"
                        class="w-6 h-6">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>
                <div class="text-2xl font-bold text-gray-800">{{ __('vacancies.apply to vacancy') }}: </div>
                <div class="mb-3 text-lg text-gray-600">
                    «{{ $vacancy->name }}»
                </div>
                <h2 class="mb-4 text-xl font-semibold text-gray-800">{{ __('vacancies.resume for the application') }}
                </h2>
                <div class="space-y-3">
                    <input wire:model.defer="selectedVacancy" type="hidden" name="vacancy_id"
                        value="{{ $vacancy->id }}">
                    @if ($resumes)
                        @foreach ($resumes as $resume)
                            <div class="flex items-center gap-3 mb-2">
                                <input wire:model='selectedResume' type="radio" name="resume_id"
                                    value="{{ $resume->id }}" class="hover:opacity-70">
                                <label class="text-gray-700">{{ $resume->first_name }}</label>
                            </div>
                        @endforeach
                    @else
                        <div class="p-6 text-center text-gray-600">
                            <div>{{ __("vacancies.you don't have a resume") }}</div>
                            <div>
                                <a class="text-blueColor hover:text-blue-500"
                                    href="#">{{ __('vacancies.create resume') }}</a>
                            </div>
                        </div>
                    @endif
                    <div class="flex justify-end mt-6">
                        <button wire:click="apply({{ $vacancy->id }})" type="button"
                            class="px-5 py-2 bg-blueColor text-white rounded-lg hover:bg-blue-500 focus:outline-none active:bg-blue-700 focus:ring-2 focus:ring-blue-700">
                            {{ __('vacancies.submit') }}
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>
