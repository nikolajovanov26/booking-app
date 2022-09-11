<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Transaction;

class TransactionController extends Controller
{
    public function index()
    {
        return view('admin.transactions', [
            'transactions' => Transaction::all()
        ]);
    }
}
