<?php

namespace App\Http\Livewire\Admin;

use App\Models\PaymentMethod;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Str;
use Livewire\Component;

class PaymentMethodController extends Component
{
    public $paymentMethods;
    public $paymentMethod;
    public $showCreateModal = false;
    public $showEditModal = false;
    public $showDeleteModal = false;
    public $name;
    public $editName;
    public $modalText = '';
    public $search = '';

    public function mount()
    {
        $this->paymentMethods = PaymentMethod::where('name', 'like', '%' . $this->search . '%')->get();
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
        return view('livewire.admin.payment-method-controller');
    }

    public function create()
    {
        if (PaymentMethod::where('name', Str::slug($this->name))->exists()) {
            $this->addError('name', 'Payment Method with this name already exists');
            return;
        }

        $this->validate([
            'name' => 'required|unique:payment_methods,label'
        ]);

        PaymentMethod::create([
            'name' => Str::slug($this->name),
            'label' => $this->name
        ]);

        $this->showCreateModal = false;
        $this->name = '';

        Session::flash('success', [
            'action' => 'Success!',
            'message' => "A new Payment Method was added"
        ]);

        $this->mount();
    }

    public function editModal($id)
    {
        $this->paymentMethod = PaymentMethod::find($id);
        $this->modalText = 'Edit ' . ucwords($this->paymentMethod->label);
        $this->editName = $this->paymentMethod->label;
        $this->showEditModal = true;
    }

    public function edit()
    {
        if (PaymentMethod::where('name', Str::slug($this->name))->exists()) {
            $this->addError('name', 'Payment Method with this name already exists');
            return;
        }

        $this->validate([
            'editName' => 'required|unique:payment_methods,name'
        ]);


        $this->paymentMethod->label = $this->editName;
        $this->paymentMethod->name = Str::slug($this->editName);
        $this->paymentMethod->save();

        $this->showEditModal = false;

        $this->mount();

        Session::flash('success', [
            'action' => 'Success!',
            'message' => "A Payment Method was edited"
        ]);
    }

    public function deleteModal($id)
    {
        $this->paymentMethod = PaymentMethod::find($id);
        $this->modalText = 'Delete ' . ucwords($this->paymentMethod->label);
        $this->showDeleteModal = true;
    }

    public function delete()
    {
        $this->paymentMethod->delete();
        $this->showDeleteModal = false;

        $this->mount();

        Session::flash('success', [
            'action' => 'Success!',
            'message' => "A Payment Method was deleted"
        ]);
    }

    public function removeFlash()
    {
        $this->mount();
    }
}


