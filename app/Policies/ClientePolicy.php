<?php

namespace App\Policies;

use App\Cliente;
use App\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class ClientePolicy
{
    use HandlesAuthorization;

    public function viewAny(User $user)
    {
    }

    public function view(User $user, Cliente $cliente)
    {
        return $user->id === $cliente->user_id;
    }

    public function create(User $user)
    {
    }

    public function update(User $user, Cliente $cliente)
    {
        return $user->id === $cliente->user_id;
    }

    public function delete(User $user, Cliente $cliente)
    {
        return $user->id === $cliente->user_id;
    }

    public function restore(User $user, Cliente $cliente)
    {
    }

    public function forceDelete(User $user, Cliente $cliente)
    {
    }
}
