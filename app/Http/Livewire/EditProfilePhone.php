<?php

namespace App\Http\Livewire;

use Livewire\Component;

class EditProfilePhone extends Component implements EditProfileField
{
    public function render()
    {
        return view('livewire.profile.edit-profile-phone');
    }

    public function update()
    {
        // TODO: Implement update() method.
    }

    public function mount(string $value)
    {
        $this->value = $value;
    }
}
