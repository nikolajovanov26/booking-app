<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\Transaction;
use Illuminate\Support\Facades\Auth;

class TransactionController extends Controller
{
    public function index()
    {
        return view('dashboard.transactions', [
            'transactions' => Transaction::where('owner_id', Auth::user()->id)->get()
        ]);
    }
}
