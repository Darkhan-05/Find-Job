<?php

namespace App\Livewire;

use App\Models\City;
use App\Models\Country;
use App\Models\EmploymentType;
use App\Models\Position;
use Livewire\Attributes\Computed;
use Livewire\Component;

class Filter extends Component
{
    public $countries, $employmentTypes, $positions, $cities, $minSalary, $maxSalary;
    public $selectedCountries = [];
    public $selectedEmploymentTypes = [];
    public $selectedPositions = [];
    public $selectedCities = [];

    public function mount()
    {
        $this->countries = Country::all();
        $this->employmentTypes = EmploymentType::all();
        $this->positions = Position::all();
        $this->cities = City::all();
    }

    public function updateFilter()
    {
        $this->dispatch('filterUpdated', $this->selectedCountries, $this->selectedEmploymentTypes, $this->selectedPositions, $this->selectedCities, $this->minSalary, $this->maxSalary);
        $this->dispatch('loading', true);
    }

    public function render()
    {
        return view('livewire.filter');
    }
}
