<?php

namespace App\Http\Livewire\Admin;

use App\Models\Feature;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Str;
use Livewire\Component;

class FeatureController extends Component
{
    public $features;
    public $feature;
    public $showCreateModal = false;
    public $showEditModal = false;
    public $showDeleteModal = false;
    public $name;
    public $explanation;
    public $icon;
    public $editName;
    public $editExplanation;
    public $editIcon;
    public $modalText = '';
    public $icons;
    public $editIconDropdown = false;
    public $createIconDropdown = false;
    public $search = '';

    public function mount()
    {
        $path = resource_path('views' . DIRECTORY_SEPARATOR . 'icons');
        $files = File::files($path);
        $icons = array();
        for ($i = 0; $i < count($files); $i++) {
            $icons[$i] = $files[$i]->getBasename('.blade.php');
        }

        $this->features = Feature::where('name', 'like', '%' . $this->search . '%')->get();
        $this->icons = $icons;
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
        return view('livewire.admin.feature-controller');
    }

    public function clickCreateIcon($icon)
    {
        $this->icon = $icon;
        $this->createIconDropdown = false;
    }

    public function create()
    {
        if (Feature::where('name', Str::slug($this->name))->exists()) {
            $this->addError('name', 'Feature with this name already exists');
            return;
        }

        if (! in_array($this->icon, $this->icons)) {
            $this->addError('icon', 'Icon with this name does not exist');
            return;
        }

        $this->validate([
            'name' => 'required|unique:features,label'
        ]);

        Feature::create([
            'name' => Str::slug($this->name),
            'label' => $this->name,
            'explanation' => $this->explanation,
            'icon' => $this->icon
        ]);

        $this->mount();

        $this->showCreateModal = false;
        $this->name = '';
        $this->explanation = '';
        $this->icon = '';

        Session::flash('success', [
            'action' => 'Success!',
            'message' => "A new feature was added"
        ]);
    }

    public function editModal($id)
    {
        $this->feature = Feature::find($id);
        $this->modalText = 'Edit ' . ucwords($this->feature->label);
        $this->editName = $this->feature->label;
        $this->editExplanation = $this->feature->explanation;
        $this->editIcon = $this->feature->icon;
        $this->showEditModal = true;
    }

    public function clickEditIcon($icon)
    {
        $this->editIcon = $icon;
        $this->editIconDropdown = false;
    }

    public function edit()
    {
        if (Feature::where('name', Str::slug($this->name))->exists()) {
            $this->addError('name', 'Feature with this name already exists');
            return;
        }

        if (! in_array($this->editIcon, $this->icons)) {
            $this->addError('editIcon', 'Icon with this name does not exist');
            return;
        }

        $this->validate([
            'editName' => 'required|unique:countries,name'
        ]);


        $this->feature->label = $this->editName;
        $this->feature->name = Str::slug($this->editName);
        $this->feature->explanation = $this->editExplanation ?? null;
        $this->feature->icon = $this->editIcon ?? null;
        $this->feature->save();

        $this->showEditModal = false;

        $this->mount();

        Session::flash('success', [
            'action' => 'Success!',
            'message' => "A feature was edited"
        ]);
    }

    public function deleteModal($id)
    {
        $this->feature = Feature::find($id);
        $this->modalText = 'Delete ' . ucwords($this->feature->label);
        $this->showDeleteModal = true;
    }

    public function delete()
    {
        $this->feature->delete();
        $this->showDeleteModal = false;

        $this->mount();

        Session::flash('success', [
            'action' => 'Success!',
            'message' => "A feature was deleted"
        ]);
    }

    public function removeFlash()
    {
        $this->mount();
    }
}
