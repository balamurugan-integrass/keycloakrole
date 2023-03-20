<?php

namespace Bala\KeycloakRolesPermission;

use Illuminate\Support\ServiceProvider;

class KeycloakRolesPermissionProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        include __DIR__.'/Middleware/KeycloakRoleMiddleware.php';
    }
}
