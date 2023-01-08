<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BookingStatus extends Model
{
    const PAID = 'paid';
    const CANCELED = 'canceled';
    const ONHOLD = 'on-hold';
    const RESERVED = 'reserved';
    const PENDING = 'pending';

    use HasFactory;

    public function getColorAttribute()
    {
        switch ($this->name) {
            case $this::PAID: return 'bg-green-800';
            case $this::CANCELED: return 'bg-red-600';
            case $this::ONHOLD: return 'bg-orange-500';
            case $this::RESERVED: return 'bg-green-500';
            case $this::PENDING: return 'bg-yellow-800';
            default: return 'bg-gray-700';
        }
    }

    public function getIsCancellableAttribute()
    {
        if ($this->name == $this::PAID || $this->name == $this::RESERVED || $this->name == $this::CANCELED) {
            return false;
        }

        return true;
    }
}
