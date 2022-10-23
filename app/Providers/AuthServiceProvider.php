<?php

namespace App\Providers;

// use Illuminate\Support\Facades\Gate;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The model to policy mappings for the application.
     *
     * @var array<class-string, class-string>
     */
    protected $policies = [
        'App\Models\Booking' => 'App\Policies\BookingPolicy',
        'App\Models\Notification' => 'App\Policies\NotificationPolicy',
        'App\Models\Profile' => 'App\Policies\ProfilePolicy',
        'App\Models\Property' => 'App\Policies\PropertyPolicy',
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();

        //
    }
}
