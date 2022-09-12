<?php

namespace App\Http\Livewire\Admin;

use App\Models\RoomType;
use Livewire\Component;

class RoomTypeTable extends Component
{
    public $roomTypes;

    public function mount()
    {
        $this->roomTypes = RoomType::all();
    }

    public function render()
    {
        return view('livewire.admin.room-type-table');
    }
}
