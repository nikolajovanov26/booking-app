<?php

namespace App\Http\Livewire;

use Livewire\Component;

class EditProfilePicture extends Component
{
    public $show = false;
    public $value;

    public function render()
    {
        return view('livewire.profile.edit-profile-picture');
    }

    public function mount()
    {
        // TODO: Implement mount() method.
    }

    public function update()
    {
        // TODO: Implement update() method.
    }


}
