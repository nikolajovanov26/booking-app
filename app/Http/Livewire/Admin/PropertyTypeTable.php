<?php

namespace App\Http\Livewire\Admin;

use App\Models\PropertyType;
use Livewire\Component;

class PropertyTypeTable extends Component
{
    public $propertyTypes;

    public function mount()
    {
        $this->propertyTypes = PropertyType::all();
    }

    public function render()
    {
        return view('livewire.admin.property-type-table');
    }
}
