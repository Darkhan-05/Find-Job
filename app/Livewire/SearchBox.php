<?php

namespace App\Livewire;

use Livewire\Attributes\Url;
use Livewire\Component;

class SearchBox extends Component
{

    #[Url]
    public $query = '';

    public function update()
    {
        $this->dispatch('query', query: $this->query);
        $this->dispatch('loading', true);
    }

    public function render()
    {
        return view('livewire.search-box');
    }
}
