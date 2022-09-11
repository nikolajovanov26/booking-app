<?php

namespace App\Http\Livewire;

use Livewire\Component;

class EditUserEmail extends Component implements EditProfileField
{
    public $show = false;
    public $value;

    public function render()
    {
        return view('livewire.profile.edit-user-email');
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
