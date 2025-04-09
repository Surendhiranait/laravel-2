<?php

namespace App\Policies;

use App\Models\CivilEmployee;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class CivilEmployeePolicy
{
    use HandlesAuthorization;

    public function viewAny(User $user)
    {
        return $user->role === 'admin' || $user->role === 'civil';
    }

    public function view(User $user, CivilEmployee $civilEmployee)
    {
        return $user->role === 'admin' || $user->role === 'civil';
    }

    public function create(User $user)
    {
        return $user->role === 'admin' || $user->role === 'civil';
    }

    public function update(User $user, CivilEmployee $civilEmployee)
    {
        return $user->role === 'admin' || $user->role === 'civil';
    }

    public function delete(User $user, CivilEmployee $civilEmployee)
    {
        return $user->role === 'admin';
    }

    public function restore(User $user, CivilEmployee $civilEmployee)
    {
        return $user->role === 'admin';
    }

    public function forceDelete(User $user, CivilEmployee $civilEmployee)
    {
        return $user->role === 'admin';
    }
}
