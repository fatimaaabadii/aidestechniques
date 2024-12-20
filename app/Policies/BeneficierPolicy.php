<?php

namespace App\Policies;

use App\Models\Beneficier;
use App\Models\User;
use Illuminate\Auth\Access\Response;

class BeneficierPolicy
{
    /**
     * Determine whether the user can view any models.
     */
    public function viewAny(User $user): bool
    {
        return $user->roles[0]->role == 'Coaph';
    }
    public function viewMenuBenificier(User $user): bool
    {
        if($user->roles[0]->role == 'Technicien'||  $user->roles[0]->role == 'Coaph' )
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
    public function view(User $user, Beneficier $beneficier): bool
    {
        return $user->roles[0]->role == 'Coaph';
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
    public function update(User $user, Beneficier $beneficier): bool
    {
        //
    }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete(User $user, Beneficier $beneficier): bool
    {
        //
    }

    /**
     * Determine whether the user can restore the model.
     */
    public function restore(User $user, Beneficier $beneficier): bool
    {
        //
    }

    /**
     * Determine whether the user can permanently delete the model.
     */
    public function forceDelete(User $user, Beneficier $beneficier): bool
    {
        //
    }
}
