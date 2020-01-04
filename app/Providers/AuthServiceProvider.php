<?php

namespace App\Providers;

use Illuminate\Support\Facades\Gate;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array
     */
    protected $policies = [
        'App\Koor'          => 'App\Policies\KoorPolicy',
        'App\Saksi'         => 'App\Policies\SaksiPolicy',
        'App\Pengumuman'    => 'App\Policies\PengumumanPolicy',
        'App\User'          => 'App\Policies\UserPolicy',
        'App\Partai'        => 'App\Policies\PartaiPolicy',
        'App\C1'            => 'App\Policies\C1Policy',
        'App\Target'        => 'App\Policies\TargetPolicy',
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
