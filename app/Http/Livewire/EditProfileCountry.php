<?php

namespace App\Http\Livewire;

use App\Models\Country;
use Livewire\Component;

class EditProfileCountry extends Component implements EditProfileField
{
    public $show = false;
    public $value;
    public $countries;

    public function render()
    {
        return view('livewire.profile.edit-profile-country');
    }

    public function update()
    {
        // TODO: Implement update() method.
    }

    public function mount(string $value)
    {
        $this->value = $value;
        $this->countries = Country::all();
    }
}
