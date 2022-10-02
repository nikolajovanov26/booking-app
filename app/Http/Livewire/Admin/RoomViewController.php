<?php

namespace App\Http\Livewire\Admin;

use App\Models\RoomView;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Str;
use Livewire\Component;

class RoomViewController extends Component
{

    public $roomViews;
    public $roomView;
    public $showCreateModal = false;
    public $showEditModal = false;
    public $showDeleteModal = false;
    public $name;
    public $editName;
    public $modalText = '';

    public function mount()
    {
        $this->roomViews = RoomView::all();
    }

    public function render()
    {
        return view('livewire.admin.room-view-controller');
    }

    public function create()
    {
        if (RoomView::where('name', Str::slug($this->name))->exists()) {
            $this->addError('name', 'Room View with this name already exists');
            return;
        }

        $this->validate([
            'name' => 'required|unique:room_views,label'
        ]);

        RoomView::create([
            'name' => Str::slug($this->name),
            'label' => $this->name
        ]);

        $this->showCreateModal = false;
        $this->name = '';

        Session::flash('success', [
            'action' => 'Success!',
            'message' => "A new Room View was added"
        ]);

        $this->mount();
    }

    public function editModal($id)
    {
        $this->roomView = RoomView::find($id);
        $this->modalText = 'Edit ' . ucwords($this->roomView->label);
        $this->editName = $this->roomView->label;
        $this->showEditModal = true;
    }

    public function edit()
    {
        if (RoomView::where('name', Str::slug($this->name))->exists()) {
            $this->addError('name', 'Room View with this name already exists');
            return;
        }

        $this->validate([
            'editName' => 'required|unique:room_views,name'
        ]);


        $this->roomView->label = $this->editName;
        $this->roomView->name = Str::slug($this->editName);
        $this->roomView->save();

        $this->showEditModal = false;

        $this->mount();

        Session::flash('success', [
            'action' => 'Success!',
            'message' => "A Room View was edited"
        ]);
    }

    public function deleteModal($id)
    {
        $this->roomView = RoomView::find($id);
        $this->modalText = 'Delete ' . ucwords($this->roomView->label);
        $this->showDeleteModal = true;
    }

    public function delete()
    {
        $this->roomView->delete();
        $this->showDeleteModal = false;

        $this->mount();

        Session::flash('success', [
            'action' => 'Success!',
            'message' => "A Room View was deleted"
        ]);
    }

    public function removeFlash()
    {
        $this->mount();
    }
}
