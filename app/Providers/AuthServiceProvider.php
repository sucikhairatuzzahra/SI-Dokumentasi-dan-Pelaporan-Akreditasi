<?php

namespace App\Providers;

use Illuminate\Auth\Access\Response;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Gate;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The model to policy mappings for the application.
     *
     * @var array<class-string, class-string>
     */
    protected $policies = [
        'App\Models\Model' => 'App\Policies\ModelPolicy',
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();

        // Admin = 3
        // Adm Prodi = 2
        // Kaprodi = 1
        // Jurusan = 0

        Gate::define('isAdmin', function ($user) {
            return $user->role == 'admin' ? Response::allow() : Response::deny('You must be an admin');
        });

        Gate::define('isAdmProdi', function ($user) {
            return $user->role == 'admprodi' ? Response::allow() : Response::deny('You must be an "admProdi"');
        });
        Gate::define('isKaprodi', function ($user) {
            return $user->role == 'kaprodi' ? Response::allow() : Response::deny('You must be a "kaprodi"');
        });
        Gate::define('isJurusan', function ($user) {
            return $user->role == 'jurusan' ? Response::allow() : Response::deny('You must be a "Jurusan"');
        });
    }
}
