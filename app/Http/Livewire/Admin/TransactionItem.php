<?php

namespace App\Http\Livewire\Admin;

use App\Models\Transaction;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Support\Facades\Session;
use Livewire\Component;

class TransactionItem extends Component
{
    public $transaction;
    public $statuses;
    public $status;
    public $dropdown = false;
    public $saveButton = false;
    public $changeStatus = false;

    public function mount(Transaction $transaction, Collection $statuses)
    {
        $this->transaction = $transaction;
        $this->status = $transaction->transactionStatus->label;
        $this->statuses = $statuses;
    }

    public function render()
    {
        return view('livewire.admin.transaction-item');
    }

    public function changeState()
    {
        $this->changeStatus = !$this->changeStatus;
        $this->status = $this->transaction->transactionStatus->label;
        $this->saveButton = false;
    }

    public function changeStatus($status)
    {
        $this->status = $status;
        $this->saveButton = true;
        $this->dropdown = false;
    }

    public function edit()
    {
        $this->transaction->transaction_status_id = $this->statuses->firstWhere('label', $this->status)->id;
        $this->transaction->save();
        $this->saveButton = false;

        Session::flash('success', [
            'action' => 'Success!',
            'message' => "Transaction status was changed"
        ]);

        $this->refresh();
    }

    public function refresh()
    {
        //
    }
}
