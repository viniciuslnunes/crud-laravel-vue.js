<?php

namespace App\Policies;

use App\Proposta;
use App\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class PropostaPolicy
{
    use HandlesAuthorization;

    public function viewAny(User $user)
    {
    }

    public function view(User $user, Proposta $proposta)
    {
        return $user->id === $proposta->user_id;
    }

    public function create(User $user)
    {
    }

    public function update(User $user, Proposta $proposta)
    {
        return $user->id === $proposta->user_id;
    }


    public function delete(User $user, Proposta $proposta)
    {
        return $user->id === $proposta->user_id;
    }

    public function restore(User $user, Proposta $proposta)
    {
    }
    public function forceDelete(User $user, Proposta $proposta)
    {
    }
}
