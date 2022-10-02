<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Transaction;
use App\Models\TransactionStatus;

class TransactionController extends Controller
{
    public function index()
    {
        return view('admin.transactions', [
            'transactions' => Transaction::with('transactionStatus', 'owner', 'customer', 'property')->get(),
            'statuses' => TransactionStatus::all()
        ]);
    }
}
