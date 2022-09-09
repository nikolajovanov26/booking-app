<?php

namespace App\Http\Livewire;

use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class EditProfileFirstName extends Component implements EditProfileField
{
    public $show = false;
    public $value;

    public function render()
    {
        return view('livewire.edit-profile-first-name');
    }

    public function update()
    {
        // TODO: Implement update() method.
    }

    public function mount()
    {
        $this->value = Auth::user()->name;
    }
}
