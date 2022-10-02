<?php

namespace App\Http\Livewire;

use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class EditProfilePhone extends Component
{
    public $show = false;
    public $name;

    public function render()
    {
        return view('livewire.profile.edit-profile-phone');
    }

    public function mount()
    {
        $this->name = Auth::user()->profile->phone_number;
    }

    public function update()
    {
        $this->validate([
            'name' => 'string'
        ]);

        Auth::user()->profile->phone_number = $this->name;
        Auth::user()->profile->save();

        $this->show = false;
        $this->mount();
    }
}
