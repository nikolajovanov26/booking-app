<?php

namespace App\Http\Livewire\Admin;

use App\Models\RoomType;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Str;
use Livewire\Component;

class RoomTypeController extends Component
{
    public $roomTypes;
    public $roomType;
    public $showCreateModal = false;
    public $showEditModal = false;
    public $showDeleteModal = false;
    public $name;
    public $editName;
    public $modalText = '';
    public $search = '';

    public function mount()
    {
        $this->roomTypes = RoomType::where('name', 'like', '%' . $this->search . '%')->get();
    }

    public function filter()
    {
        $this->mount();
    }

    public function resetSearch()
    {
        $this->search = '';
        $this->mount();
    }

    public function render()
    {
        return view('livewire.admin.room-type-controller');
    }

    public function create()
    {
        if (RoomType::where('name', Str::slug($this->name))->exists()) {
            $this->addError('name', 'Room Type with this name already exists');
            return;
        }

        $this->validate([
            'name' => 'required|unique:room_types,label'
        ]);

        RoomType::create([
            'name' => Str::slug($this->name),
            'label' => $this->name
        ]);

        $this->showCreateModal = false;
        $this->name = '';

        Session::flash('success', [
            'action' => 'Success!',
            'message' => "A new Room Type was added"
        ]);

        $this->mount();
    }

    public function editModal($id)
    {
        $this->roomType = RoomType::find($id);
        $this->modalText = 'Edit ' . ucwords($this->roomType->label);
        $this->editName = $this->roomType->label;
        $this->showEditModal = true;
    }

    public function edit()
    {
        if (RoomType::where('name', Str::slug($this->name))->exists()) {
            $this->addError('name', 'Room Type with this name already exists');
            return;
        }

        $this->validate([
            'editName' => 'required|unique:room_types,name'
        ]);


        $this->roomType->label = $this->editName;
        $this->roomType->name = Str::slug($this->editName);
        $this->roomType->save();

        $this->showEditModal = false;

        $this->mount();

        Session::flash('success', [
            'action' => 'Success!',
            'message' => "A Room Type was edited"
        ]);
    }

    public function deleteModal($id)
    {
        $this->roomType = RoomType::find($id);
        $this->modalText = 'Delete ' . ucwords($this->roomType->label);
        $this->showDeleteModal = true;
    }

    public function delete()
    {
        $this->roomType->delete();
        $this->showDeleteModal = false;

        $this->mount();

        Session::flash('success', [
            'action' => 'Success!',
            'message' => "A Room Type was deleted"
        ]);
    }

    public function removeFlash()
    {
        $this->mount();
    }
}
