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

    protected $listeners = [
        'editFlash' => 'editFlash',
        'transactionEdited' => 'clearEditFlash',
    ];

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
        $this->changeStatus = false;

        $this->refresh();
        $this->emit('transactionEdited', ['id' => $this->transaction->id]);
    }

    public function refresh()
    {
        //
    }

    public function editFlash()
    {

        Session::flash('success', [
            'action' => 'Success!',
            'message' => "Transaction's status was changed"
        ]);
    }

    public function clearEditFlash($params)
    {
        if($this->transaction->id == $params['id']) {
            $this->emitSelf('editFlash');
        }
    }

    public function clearDeleteFlash($id)
    {
        if($this->transaction->id == $id) {
            $this->emitSelf('editFlash');
        }
    }
}
