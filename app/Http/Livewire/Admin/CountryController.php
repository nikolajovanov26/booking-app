<?php

namespace App\Http\Livewire\Admin;

use Illuminate\Support\Facades\Session;
use Illuminate\Support\Str;
use App\Models\Country;
use Livewire\Component;

class CountryController extends Component
{
    public $counties;
    public $country;
    public $showCreateModal = false;
    public $showEditModal = false;
    public $showDeleteModal = false;
    public $name;
    public $editName;
    public $modalText = '';

    public function mount()
    {
        $this->counties = Country::all();
    }

    public function render()
    {
        return view('livewire.admin.country-controller');
    }

    public function create()
    {
        if (Country::where('name', Str::slug($this->name))->exists()) {
            $this->addError('name', 'Country with this name already exists');
            return;
        }

        $this->validate([
            'name' => 'required|unique:countries,label'
        ]);

        Country::create([
            'name' => Str::slug($this->name),
            'label' => $this->name
        ]);

        $this->showCreateModal = false;
        $this->name = '';

        Session::flash('success', [
            'action' => 'Success!',
            'message' => "A new country was added"
        ]);

        $this->mount();
    }

    public function editModal($id)
    {
        $this->country = Country::find($id);
        $this->modalText = 'Edit ' . ucwords($this->country->label);
        $this->editName = $this->country->label;
        $this->showEditModal = true;
    }

    public function edit()
    {
        if (Country::where('name', Str::slug($this->name))->exists()) {
            $this->addError('name', 'Country with this name already exists');
            return;
        }

        $this->validate([
            'editName' => 'required|unique:countries,name'
        ]);


        $this->country->label = $this->editName;
        $this->country->name = Str::slug($this->editName);
        $this->country->save();

        $this->showEditModal = false;

        $this->mount();

        Session::flash('success', [
            'action' => 'Success!',
            'message' => "A country was edited"
        ]);
    }

    public function deleteModal($id)
    {
        $this->country = Country::find($id);
        $this->modalText = 'Delete ' . ucwords($this->country->label);
        $this->showDeleteModal = true;
    }

    public function delete()
    {
        $this->country->delete();
        $this->showDeleteModal = false;

        $this->mount();

        Session::flash('success', [
            'action' => 'Success!',
            'message' => "A country was deleted"
        ]);
    }

    public function removeFlash()
    {
        $this->mount();
    }
}
