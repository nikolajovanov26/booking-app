<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Http\Requests\DashboardTransactionFilterRequest;
use App\Models\Transaction;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;

class TransactionController extends Controller
{
    public function index(DashboardTransactionFilterRequest $request)
    {
        $transacations = Transaction::where('owner_id', Auth::user()->id)
            ->with('customer', 'property', 'room.roomType', 'transactionStatus');

        if ($request->get('search')) {
            $transacations->whereRelation('property', 'name', 'like', '%' . $request->get('search') . '%');
        }

        if ($request->get('date_from')) {
            $transacations->where('created_at', '>=', Carbon::createFromFormat('Y-m-d', $request->get('date_from'))->startOfDay())
                ->where('created_at', '<=', Carbon::createFromFormat('Y-m-d', $request->get('date_to'))->endOfDay());
        }

        return view('dashboard.transactions', [
            'transactions' => $transacations->paginate(10)
        ]);
    }
}
