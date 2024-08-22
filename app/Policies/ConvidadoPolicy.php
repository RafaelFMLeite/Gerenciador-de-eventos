<?php

namespace App\Policies;

use App\Models\User;
use App\Models\Convidado;

class ConvidadoPolicy
{
    public function view(User $user, Convidado $convidado): bool 
    {
        return $user->id === $convidado->user_id;
    }

    public function update(User $user, Convidado $convidado): bool
    {
        return $user->id === $convidado->user_id;
    }

    public function delete(User $user, Convidado $convidado): bool
    {
        return $user->id === $convidado->user_id;
    }
    public function __construct()
    {
        //
    }
}
