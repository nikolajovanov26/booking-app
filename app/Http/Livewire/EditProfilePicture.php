<?php

namespace App\Http\Livewire;

use Livewire\Component;

class EditProfilePicture extends Component implements EditProfileField
{
    public $show = false;
    public $value;

    public function render()
    {
        return view('livewire.profile.edit-profile-picture');
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
