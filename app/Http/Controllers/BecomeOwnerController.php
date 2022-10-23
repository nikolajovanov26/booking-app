<?php

namespace App\Http\Controllers;

use App\Models\Role;

class BecomeOwnerController extends Controller
{
    public function __invoke()
    {
        Auth()->user()->role_id = Role::firstWhere('name', 'owner')->id;
        Auth()->user()->save();

        return redirect()->route('dashboard.index');
    }
}


