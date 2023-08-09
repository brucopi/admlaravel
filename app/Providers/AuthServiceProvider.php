<?php

namespace App\Providers;
use App\Models\{
    User,
    Product,
    Permission
};

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
        //
    ];

    /**
     * Register any authentication / authorization services.
     */
    public function boot(): void
    {
        $this->registerPolicies();

        if ($this->app->runningInConsole()) return;

        $permissions = Permission::all();

        foreach ($permissions as $permission) {
            Gate::define($permission->name, function(User $user) use ($permission) {
                return $user->hasPermission($permission->name);
            });
        }

        Gate::define('owner', function(User $user, $object) {
            return $user->id === $object->user_id;
        });

        Gate::before(function (User $user) {
            if ($user->isAdmin()) {
                return true;
            }
        });
    }
}
