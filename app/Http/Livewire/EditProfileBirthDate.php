<?php

namespace App\Http\Livewire;

use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class EditProfileBirthDate extends Component
{
    public $show = false;
    public $name;

    public function render()
    {
        return view('livewire.profile.edit-profile-birth-date');
    }

    public function mount()
    {
        $this->name = Auth::user()->profile->birth_date;
    }

    public function update()
    {
        $this->validate([
            'name' => 'date'
        ]);

        Auth::user()->profile->birth_date = $this->name;
        Auth::user()->profile->save();

        $this->show = false;
        $this->mount();
    }
}
