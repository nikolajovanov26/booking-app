<?php

namespace App\Http\Livewire;

use Illuminate\Database\Eloquent\Collection;
use Livewire\Component;

class FavoritePropertyGrid extends Component
{
    public $properties;

    public function mount(Collection $properties)
    {
        $this->properties = $properties;
    }

    public function render()
    {
        return view('livewire.favorite-property-grid');
    }
}
