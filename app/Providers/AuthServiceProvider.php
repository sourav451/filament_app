<?php

namespace App\Providers;

use App\Models\Trainingweek;
use App\Models\User;
use App\Policies\TrainingweekPolicy;
use App\Policies\UserPolicy;
use Illuminate\Support\Facades\Gate;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The model to policy mappings for the application.
     *
     * @var array<class-string, class-string>
     */
    protected $policies = [
        // 'App\Models\Model'=>'App\Policies\ModelPolicy',
        User::class=>UserPolicy::class,
        Trainingweek::class=>TrainingweekPolicy::class,

    ];

    /**
     * Register any authentication / authorization services.
     */
    public function boot(): void
    {
        //
        // App\Providers\Passport::loadKeysFrom(__DIR__.'/../secrets/oauth');

        Gate::before(function ($user, $ability) {
            return $user->hasRole('Admin') ? true : null;
        });
    }
}
