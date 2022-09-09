<?php

namespace App\Http\Livewire;

use Livewire\Component;

class EditProfileLastName extends Component
{
    public $show = false;

    public function render()
    {
        return view('livewire.edit-profile-last-name');
    }
}
