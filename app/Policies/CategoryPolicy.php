<?php

namespace App\Policies;

use App\Models\Category;
use App\Models\User;
use Illuminate\Auth\Access\Response;

class CategoryPolicy
{

    public function create(User $user)
    {
        return $user->role === 'admin'
            ? Response::allow()
            : Response::deny('no tienes permiso para realizar esta accion.', 401);
    }

    public function update(User $user)
    {
        return $user->role === 'admin'
            ? Response::allow()
            : Response::deny('no tienes permiso para realizar esta accion.', 401);
    }

    public function delete(User $user)
    {
        return $user->role === 'admin'
            ? Response::allow()
            : Response::deny('no tienes permiso para realizar esta accion.', 401);
    }
}
