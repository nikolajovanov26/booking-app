<?php

namespace App\Http\Livewire\Admin;

use App\Models\Feature;
use Livewire\Component;

class FeatureTable extends Component
{
    public $features;

    public function mount()
    {
        $this->features = Feature::all();
    }

    public function render()
    {
        return view('livewire.admin.feature-table');
    }
}
