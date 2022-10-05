<?php

namespace App\Repository\Admin;

use App\Models\User;
use Carbon\Carbon;

class UserRepository
{
    public function currentMonthNewUsers(): int
    {
        return User::where('created_at', '>=', Carbon::now()->startOfMonth())->count();
    }

    public function lastMonthNewUsers(): int
    {
        return User::where('created_at', '>=', Carbon::now()->subMonth()->startOfMonth())
            ->where('created_at', '<=', Carbon::now()->subMonth()->endOfMonth())
            ->count();
    }

    public function calculatePercent(): float
    {
        if ($this->lastMonthNewUsers() == 0 && $this->currentMonthNewUsers() != 0) {
            return 100.0;
        }

        if ($this->lastMonthNewUsers() != 0 && $this->currentMonthNewUsers() == 0) {
            return -100.0;
        }

        if ($this->currentMonthNewUsers() > $this->lastMonthNewUsers()) {
            $value = $this->currentMonthNewUsers() - $this->lastMonthNewUsers();
            return (float)$value / $this->lastMonthNewUsers() * 100;
        }

        if ($this->currentMonthNewUsers() < $this->lastMonthNewUsers()) {
            $value = $this->lastMonthNewUsers() - $this->currentMonthNewUsers();
            return -1 * (float)$value / $this->lastMonthNewUsers() * 100;
        }

        return 0.0;
    }
}
