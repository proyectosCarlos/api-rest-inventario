<?php

namespace App\Policies;

use App\Models\User;
use Illuminate\Auth\Access\Response;

class UserPolicy
{

    public function create(User $user)
    {
        return $user?->role === 'admin'
            ? Response::allow()
            : Response::deny('no tienes permiso para realizar esta accion.', 401);
    }
}
