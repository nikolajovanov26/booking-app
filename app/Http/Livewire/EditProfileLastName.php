<?php

namespace App\Http\Livewire;

use Livewire\Component;

class EditProfileLastName extends Component implements EditProfileField
{
    public $show = false;
    public $value;

    public function render()
    {
        return view('livewire.profile.edit-profile-last-name');
    }

    public function mount(string $value)
    {
        $this->value = $value;
    }

    public function update()
    {
        // TODO: Implement update() method.
    }
}
