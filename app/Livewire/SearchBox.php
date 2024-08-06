<?php

namespace App\Livewire;

use Livewire\Attributes\Url;
use Livewire\Component;

class SearchBox extends Component
{

    #[Url]
    public $search = '';

    public function clearSearch()
    {
        $this->search = '';
    }

    public function update()
    {
        $this->dispatch('search', search: $this->search);
        $this->dispatch('loading', true);
    }

    public function render()
    {
        return view('livewire.search-box');
    }
}
