<?php

namespace App\Http\Livewire;

use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class EditUserEmail extends Component
{
    public $show = false;
    public $name;

    public function render()
    {
        return view('livewire.profile.edit-user-email');
    }

    public function mount()
    {
        $this->name = Auth::user()->email;
    }

    public function update()
    {
        $this->validate([
            'name' => 'required|email'
        ]);

        Auth::user()->email = $this->name;
        Auth::user()->save();

        $this->show = false;
        $this->mount();
    }
}
