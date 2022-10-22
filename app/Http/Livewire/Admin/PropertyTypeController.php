<?php

namespace App\Http\Livewire\Admin;

use App\Models\PropertyType;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Str;
use Livewire\Component;

class PropertyTypeController extends Component
{
    public $propertyTypes;
    public $propertyType;
    public $showCreateModal = false;
    public $showEditModal = false;
    public $showDeleteModal = false;
    public $name;
    public $editName;
    public $modalText = '';
    public $search = '';

    public function mount()
    {
        $this->propertyTypes = PropertyType::where('name', 'like', '%' . $this->search . '%')->get();
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
        return view('livewire.admin.property-type-controller');
    }

    public function create()
    {
        if (PropertyType::where('name', Str::slug($this->name))->exists()) {
            $this->addError('name', 'Property Type with this name already exists');
            return;
        }

        $this->validate([
            'name' => 'required|unique:property_types,label'
        ]);

        PropertyType::create([
            'name' => Str::slug($this->name),
            'label' => $this->name
        ]);

        $this->showCreateModal = false;
        $this->name = '';

        Session::flash('success', [
            'action' => 'Success!',
            'message' => "A new Property Type was added"
        ]);

        $this->mount();
    }

    public function editModal($id)
    {
        $this->propertyType = PropertyType::find($id);
        $this->modalText = 'Edit ' . ucwords($this->propertyType->label);
        $this->editName = $this->propertyType->label;
        $this->showEditModal = true;
    }

    public function edit()
    {
        if (PropertyType::where('name', Str::slug($this->name))->exists()) {
            $this->addError('name', 'Property Type with this name already exists');
            return;
        }

        $this->validate([
            'editName' => 'required|unique:property_types,name'
        ]);


        $this->propertyType->label = $this->editName;
        $this->propertyType->name = Str::slug($this->editName);
        $this->propertyType->save();

        $this->showEditModal = false;

        $this->mount();

        Session::flash('success', [
            'action' => 'Success!',
            'message' => "A Property Type was edited"
        ]);
    }

    public function deleteModal($id)
    {
        $this->propertyType = PropertyType::find($id);
        $this->modalText = 'Delete ' . ucwords($this->propertyType->label);
        $this->showDeleteModal = true;
    }

    public function delete()
    {
        $this->propertyType->delete();
        $this->showDeleteModal = false;

        $this->mount();

        Session::flash('success', [
            'action' => 'Success!',
            'message' => "A Property Type was deleted"
        ]);
    }

    public function removeFlash()
    {
        $this->mount();
    }
}
