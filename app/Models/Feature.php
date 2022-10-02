<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Feature extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'label',
        'explanation',
        'icon'
    ];

    public function properties()
    {
        return $this->belongsToMany(Property::class);
    }
}
