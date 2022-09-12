<?php

namespace App\Http\Livewire\Admin;

use App\Models\Country;
use Livewire\Component;

class CountryTable extends Component
{
    public $counties;

    public function mount()
    {
        $this->counties = Country::all();
    }

    public function render()
    {
        return view('livewire.admin.country-table');
    }
}
