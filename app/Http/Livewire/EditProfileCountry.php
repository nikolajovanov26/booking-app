<?php

namespace App\Http\Livewire;

use App\Models\Country;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class EditProfileCountry extends Component
{
    public $show = false;
    public $name;
    public $countries;

    public function render()
    {
        return view('livewire.profile.edit-profile-country');
    }

    public function mount()
    {
        $this->name = Auth::user()->profile->country->label;
        $this->countries = Country::all();
    }

    public function update()
    {
        $this->validate([
            'name' => 'string|exists:countries,name'
        ]);

        Auth::user()->profile->country_id = Country::firstWhere('name', $this->name)->id;
        Auth::user()->profile->save();

        $this->show = false;
        $this->mount();
    }
}
