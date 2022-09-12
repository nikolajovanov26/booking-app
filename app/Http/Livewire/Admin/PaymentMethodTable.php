<?php

namespace App\Http\Livewire\Admin;

use App\Models\PaymentMethod;
use Livewire\Component;

class PaymentMethodTable extends Component
{
    public $paymentMethods;

    public function mount()
    {
        $this->paymentMethods = PaymentMethod::all();
    }

    public function render()
    {
        return view('livewire.admin.payment-method-table');
    }
}
