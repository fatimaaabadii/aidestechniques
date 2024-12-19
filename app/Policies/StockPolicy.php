<?php

namespace App\Policies;

use App\Models\Stock;
use App\Models\User;
use Illuminate\Auth\Access\Response;

class StockPolicy
{
    /**
     * Determine whether the user can view any models.
     */
    public function viewAny(User $user): bool
    {
        if($user->roles[0]->role == 'Délégué provincial' || $user->roles[0]->role == 'Coordinateur régional')
        {
            return true;
        }

        else
        {
            return false;
        }
    }

    public function viewAnyStock(User $user): bool
    {
        if($user->roles[0]->role == 'Directeur Central' || $user->roles[0]->role == 'Délégué provincial' || $user->roles[0]->role == 'Coaph' || $user->roles[0]->role == 'Coordinateur régional')
        {
            return true;
        }

        else
        {
            return false;
        }
    }


    public function transfert(User $user): bool
    {
        // return $user->roles[0]->role == 'coordinateur';
        if($user->roles[0]->role == 'Coordinateur régional' )
        {
            return true;
        }

        else
        {
            return false;
        }
    }

    public function viewMenu(User $user): bool
    {
        // return $user->roles[0]->role == 'coordinateur';
        if($user->roles[0]->role == 'Coordinateur régional'||  $user->roles[0]->role == 'Directeur Central' || $user->roles[0]->role == 'Délégué provincial' || $user->roles[0]->role == 'Coaph')
        {
            return true;
        }

        else
        {
            return false;
        }
    }
    public function viewMenuDemand(User $user): bool
    {
        // return $user->roles[0]->role == 'coordinateur';
        if($user->roles[0]->role == 'Coaph'||  $user->roles[0]->role == 'Directeur Central' || $user->roles[0]->role == 'Délégué provincial' || $user->roles[0]->role == 'Coordinateur régional')
        {
            return true;
        }

        else
        {
            return false;
        }
    }


    public function directeur_transfer(User $user): bool
    {
        if($user->roles[0]->role == 'Directeur Central')
        {
            return true;
        }
        return false;
    }


    public function view(User $user, Stock $stock): bool
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
    public function update(User $user, Stock $stock): bool
    {
        //
    }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete(User $user, Stock $stock): bool
    {
        //
    }

    /**
     * Determine whether the user can restore the model.
     */
    public function restore(User $user, Stock $stock): bool
    {
        //
    }

    /**
     * Determine whether the user can permanently delete the model.
     */
    public function forceDelete(User $user, Stock $stock): bool
    {
        //
    }
}
