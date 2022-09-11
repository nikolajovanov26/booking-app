<?php

namespace App\Http\Livewire;

interface EditProfileField
{
    public function mount(string $value);
    public function update();
}
