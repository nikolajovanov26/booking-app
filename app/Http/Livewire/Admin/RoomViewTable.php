<?php

namespace App\Http\Livewire\Admin;

use App\Models\RoomView;
use Livewire\Component;

class RoomViewTable extends Component
{
    public $roomViews;

    public function mount()
    {
        $this->roomViews = RoomView::all();
    }

    public function render()
    {
        return view('livewire.admin.room-view-table');
    }
}
