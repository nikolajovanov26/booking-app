<?php

namespace App\Repository;

use App\Models\Transaction;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;

class TransactionRepository
{
    public function currentMonthNewTransactions(): int
    {
        return Transaction::where('owner_id', Auth::user()->id)
            ->where('created_at', '>=', Carbon::now()->startOfMonth())
            ->sum('total');
    }

    public function lastMonthNewTransactions(): int
    {
        return Transaction::where('owner_id', Auth::user()->id)
            ->where('created_at', '>=', Carbon::now()->subMonth()->startOfMonth())
            ->where('created_at', '<=', Carbon::now()->subMonth()->endOfMonth())
            ->sum('total');
    }

    public function calculatePercent(): float
    {
        if ($this->lastMonthNewTransactions() == 0 && $this->currentMonthNewTransactions() != 0) {
            return 100.0;
        }

        if($this->lastMonthNewTransactions() != 0 && $this->currentMonthNewTransactions() == 0) {
            return -100.0;
        }

        if ($this->currentMonthNewTransactions() > $this->lastMonthNewTransactions()) {
            $value = $this->currentMonthNewTransactions() - $this->lastMonthNewTransactions();
            return (float)$value / $this->lastMonthNewTransactions() * 100;
        }

        if ($this->currentMonthNewTransactions() < $this->lastMonthNewTransactions()) {
            $value = $this->lastMonthNewTransactions() - $this->currentMonthNewTransactions();
            return (float)$value / $this->lastMonthNewTransactions() * 100;
        }

        return 0.0;
    }
}
