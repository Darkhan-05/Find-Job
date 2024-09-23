<?php

namespace App\Livewire;

use Livewire\Attributes\Computed;
use Livewire\Component;

class Sort extends Component
{
    public $sortBy;

    public function setSortBy()
    {
        $this->dispatch('sortUpdated', $this->sortBy);
        $this->dispatch('loading', true);
    }

    public function render()
    {
        return view('livewire.sort');
    }
}
