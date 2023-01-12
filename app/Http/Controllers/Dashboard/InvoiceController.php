<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class InvoiceController extends Controller
{
    public function index()
    {
        return view('dashboard.invoices', [
            'invoices' => Auth::user()->createOrGetStripeCustomer()->invoices
        ]);
    }
}
