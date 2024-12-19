<?php

namespace App\Policies;

use App\Models\Delagation;
use App\Models\User;
use Illuminate\Auth\Access\Response;

class DelegationPolicy
{
    /**
     * Determine whether the user can view any models.
     */
    public function viewAny(User $user): bool
    {
        //
    }

    public function view_delegation_index(User $user): bool
    {
        return $user->roles[0]->role == 'Directeur Central';
    }
    /**
     * Determine whether the user can view the model.
     */
    public function view(User $user, Delagation $delagation): bool
    {
        //
    }

    /**
     * Determine whether the user can create models.
     */
    public function create(User $user): bool
    {
        //
    }

    /**
     * Determine whether the user can update the model.
     */
    public function update(User $user, Delagation $delagation): bool
    {
        //
    }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete(User $user, Delagation $delagation): bool
    {
        //
    }

    /**
     * Determine whether the user can restore the model.
     */
    public function restore(User $user, Delagation $delagation): bool
    {
        //
    }

    /**
     * Determine whether the user can permanently delete the model.
     */
    public function forceDelete(User $user, Delagation $delagation): bool
    {
        //
    }
}
