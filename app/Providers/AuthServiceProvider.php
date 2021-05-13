<?php

namespace App\Providers;

use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Gate;

class AuthServiceProvider extends ServiceProvider
{

    protected $policies = [
        //'App\Cliente' => 'App\Policies\ClientePolicy',
        //'App\Model' => 'App\Policies\ModelPolicy',
        Cliente::class => ClientePolicy::class,
        Proposta::class => PropostaPolicy::class,
    ];


    public function boot()
    {
        $this->registerPolicies();
    }
}
