<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\SearchFilterRequest;
use App\Models\Transaction;
use App\Models\TransactionStatus;

class TransactionController extends Controller
{
    public function index(SearchFilterRequest $request)
    {
        $transactions = Transaction::with('transactionStatus', 'owner', 'customer', 'property');

        if ($request->get('search')) {
            $transactions->whereRelation('property', 'name', 'like', '%' . $request->get('search') . '%');
        }

        return view('admin.transactions', [
            'transactions' => $transactions->get(),
            'statuses' => TransactionStatus::all()
        ]);
    }
}
