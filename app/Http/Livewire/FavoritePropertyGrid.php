<?php

namespace App\Http\Livewire;

use App\Models\Property;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class FavoritePropertyGrid extends Component
{
    public $properties;
    public $property;
    public $propertyName = '';
    public $showRemoveModal = false;

    public function mount()
    {
        $this->properties = Auth::user()->favorites()->get();
    }

    public function render()
    {
        return view('livewire.favorite-property-grid');
    }

    public function showRemoveModal(Property $property)
    {
        $this->property = $property;
        $this->propertyName = "'" . ucwords($property->name) . "'";
        $this->showRemoveModal = true;
    }

    public function removeFavorite()
    {
        Auth::user()->favorites()->detach($this->property);
        $this->properties = Auth::user()->favorites()->get();
        $this->showRemoveModal = false;
    }
}
