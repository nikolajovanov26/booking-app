<?php

namespace App\Http\Livewire;

use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class EditProfileLastName extends Component
{
    public $show = false;
    public $name;

    public function render()
    {
        return view('livewire.profile.edit-profile-last-name');
    }

    public function mount()
    {
        $this->name = Auth::user()->profile->last_name;
    }

    public function update()
    {
        $this->validate([
            'name' => 'string'
        ]);

        Auth::user()->profile->last_name = $this->name;
        Auth::user()->profile->save();

        $this->show = false;
        $this->mount();
    }
}
