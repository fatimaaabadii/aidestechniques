<?php

namespace App\Policies;

use App\Models\Demand;
use App\Models\User;
use Illuminate\Auth\Access\Response;

class DemandPolicy
{
    /**
     * Determine whether the user can view any models.
     */
    public function viewAny(User $user): bool
    {
        if($user->roles[0]->role == 'Directeur Central' || $user->roles[0]->role == 'Coaph')
        {
            return true;
        }

        else 
        {
            return false;
        }
    }

    public function viewDemand(User $user): bool
    {
        // return $user->roles[0]->role == 'delegue provincial';
        if($user->roles[0]->role == 'Délégué provincial' || $user->roles[0]->role == 'Coordinateur régional')
        {
            return true;
        }

        else 
        {
            return false;
        }
    }
    /**
     * Determine whether the user can view the model.
     */
    public function view(User $user, Demand $demand): bool
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
    public function update(User $user, Demand $demand): bool
    {
        //
    }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete(User $user, Demand $demand): bool
    {
        //
    }

    /**
     * Determine whether the user can restore the model.
     */
    public function restore(User $user, Demand $demand): bool
    {
        //
    }

    /**
     * Determine whether the user can permanently delete the model.
     */
    public function forceDelete(User $user, Demand $demand): bool
    {
        //
    }
}
