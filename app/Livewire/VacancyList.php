<?php

namespace App\Livewire;

use App\Models\Vacancy;
use Illuminate\Support\Facades\Auth;
use Livewire\Attributes\Computed;
use Livewire\Attributes\On;
use Livewire\Attributes\Url;
use Livewire\Component;
use Livewire\WithPagination;


class VacancyList extends Component
{
    use WithPagination;


    public $selectedEmploymentTypes, $selectedPositions, $selectedCountries, $selectedCities = [];
    #[Url]
    public $minSalary, $maxSalary;

    public $selectedResume = [];
    public $selectedVacancy;


    public $isLoading = false;
    public $sortBy;

    #[Url]
    public $search = '';

    public function placeholder()
    {
        return view('vacancy-placeholder');
    }

    #[On('filterUpdated')]
    public function filterUpdated($countries, $employmentTypes, $positions, $cities, $minSalary, $maxSalary)
    {
        $this->selectedCountries = $countries;
        $this->selectedEmploymentTypes = $employmentTypes;
        $this->selectedPositions = $positions;
        $this->selectedCities = $cities;
        $this->minSalary = $minSalary;
        $this->maxSalary = $maxSalary;
    }

    #[On('search')]
    public function searchUpdated($search)
    {
        $this->search = $search;
    }

    #[On('loading')]
    public function isLoading()
    {
        $this->isLoading = true;
    }

    public function userAppliedVacancies()
    {
        $user = auth()->user();
        return $user ? $user->vacancies : [];
    }

    #[On('sortUpdated')]
    public function sortUpdated($sortBy)
    {
        $this->sortBy = $sortBy;
    }

    #[Computed]
    public function vacancies()
    {
        return Vacancy::query()
            ->isPublished()
            ->where('name', 'like', "%{$this->search}%")
            ->when($this->selectedCountries, function ($query) {
                $query->whereIn('country_id', $this->selectedCountries);
            })
            ->when($this->selectedEmploymentTypes, function ($query) {
                $query->whereIn('employment_type_id', $this->selectedEmploymentTypes);
            })
            ->when($this->selectedPositions, function ($query) {
                $query->whereIn('position_id', $this->selectedPositions);
            })
            ->when($this->minSalary, function ($query) {
                $query->where('salary', '>=', $this->minSalary);
            })
            ->when($this->maxSalary, function ($query) {
                $query->where('salary', '<=', $this->maxSalary);
            })
            ->when($this->selectedCities, function ($query) {
                $query->whereIn('city_id', $this->selectedCities);
            })
            ->when($this->sortBy, function ($query) {
                if ($this->sortBy == 'new') {
                    $query->orderBy('created_at', 'desc');
                } else {
                    $query->orderBy('created_at', 'asc');
                }
            })
            ->paginate(8);
    }

    public function resumes()
    {
        $user = auth()->user();
        if ($user && $user->resumes()->exists()) {
            return $user->resumes;
        }
        return false;
    }

    public function apply($vacancyId)
    {

        $this->selectedVacancy = $vacancyId;

        $user = auth()->user();
        if (!$user) {
            return redirect()->route('login');
        }

        if (!$this->selectedResume || !$this->selectedVacancy) {
            return $this->dispatch('showerror');
        }

        $user->vacancies()->create([
            'resume_id' => $this->selectedResume,
            'vacancy_id' => $this->selectedVacancy,
            'status' => 'sented',
        ]);

        $this->selectedResume = [];
        $this->selectedVacancy = null;
        $this->dispatch('showalert');
        return redirect()->back();
    }

    public function render()
    {
        $userAppliedVacancies = $this->userAppliedVacancies();
        $resumes = $this->resumes();
        $vacancies = $this->vacancies();

        return view('livewire.vacancy-list', [
            'vacancies' => $vacancies,
            'resumes'=> $resumes,
            'userAppliedVacancies'=> $userAppliedVacancies,
        ]);
    }
}
