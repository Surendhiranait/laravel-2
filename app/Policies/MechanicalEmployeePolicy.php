<?php

namespace App\Policies;

use App\Models\MechanicalEmployee;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class MechanicalEmployeePolicy
{
    use HandlesAuthorization;

    public function viewAny(User $user)
    {
        return $user->role === 'admin' || $user->role === 'mechanical';
    }

    public function view(User $user, MechanicalEmployee $mechanicalEmployee)
    {
        return $user->role === 'admin' || $user->role === 'mechanical';
    }

    public function create(User $user)
    {
        return $user->role === 'admin' || $user->role === 'mechanical';
    }

    public function update(User $user, MechanicalEmployee $mechanicalEmployee)
    {
        return $user->role === 'admin' || $user->role === 'mechanical';
    }

    public function delete(User $user, MechanicalEmployee $mechanicalEmployee)
    {
        return $user->role === 'admin';
    }

    public function restore(User $user, MechanicalEmployee $mechanicalEmployee)
    {
        return $user->role === 'admin';
    }

    public function forceDelete(User $user, MechanicalEmployee $mechanicalEmployee)
    {
        return $user->role === 'admin';
    }
}
